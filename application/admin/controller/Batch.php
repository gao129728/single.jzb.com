<?php

namespace app\admin\controller;
use app\admin\model\ArticleModel;
use app\admin\model\ArticleCateModel;
use app\admin\model\ArticleImageModel;
use org\ImageAction;
use think\Controller;
use think\File;
use think\Db;

class Batch extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('move', 'replace', 'watermark', 'batchupload');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

	//批量转移
    public function move(){
        $key = input('key');
        $cate_id = (int)input('cate_id');
        $map['a.status'] = ['>=', 0];
        if($key&&$key!==""){
            $map['title'] = ['like',"%" . $key . "%"];
        }
        if($cate_id > 0){
            $map['cate_id'] = $cate_id;
        }

        $Nowpage = input('get.page') ? input('get.page'):1;
        $cur_page = input('param.cur_page') ? input('param.cur_page'):1;
        $limits = config('list_rows');// 每页显示页数
        $article = new ArticleModel();
        $count = $article->getArticleCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $article->getArticleByWhere($map, $Nowpage, $limits);
        foreach($lists as $k => $v){
            $v['create_time'] = date('Y-m-d', $v['create_time']);
            $v['page'] = $Nowpage;
            $lists[$k] = $v;
        }
        if($cur_page > $allpage) $cur_page = $allpage;
        $this->assign('cur_page', $cur_page); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count', $count);
        $this->assign('val', $key);
        $this->assign('cate_id', $cate_id);
        $this->assign('goal_cate', input('goal_cate'));
        $this->assign('cate',$this->getCateTree());
        if(input('get.page')){
            return json($lists);
        }
        return $this->fetch();
    }

    //处理批量转移
    public function handle_move(){
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('param.');

            if((int)$param['goal_cate'] < 1 || empty($param['ids'])){
                return json(['code' => 0, 'msg' => '参数错误']);
            }

            $map['id'] = ['in', ''.$param['ids'].''];
            $data['cate_id'] = $param['goal_cate'];

            $flag = Db::name('article')->where($map)->update($data);
            return json(['code' => 1, 'msg' => '批量转移成功，共转移'.$flag.'条信息']);
        }
    }

    //批量替换
    public function replace(){
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('param.');

            if(!isset($param['classes']) || (empty($param['oldtext']) && empty($param['newtext']))){
                return json(['code' => 0, 'msg' => '参数错误']);
            }
            $map['status'] = ['>=', 0];
            if($param['cate_id']){
                $map['cate_id'] = $param['cate_id'];
            }
            $field = '';
            $data = [];
            foreach($param['classes'] as $key=>$val){
                $field .= '|'.$key;
                if(empty($param['oldtext'])){
                    $data[$key] = $param['newtext'];
                }else{
                    $data[$key] = ["exp","replace(".$key.", '".$param['oldtext']."', '".$param['newtext']."')"];
                }
            }

            $flag = Db::name('article')->where($map)->update($data);
            return json(['code' => 1, 'msg' => '批量替换成功，共替换'.$flag.'条信息']);
        }

        $this->assign('cate',$this->getCateTree());
        return $this->fetch();
    }

    //批量水印
    public function watermark(){
        $list = Db::name('watermark')->select();
        $wm = [];
        foreach ($list as $k => $v) {
            $wm[trim($v['name'])] = $v['value'];
        }

        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('param.');
            $map['status'] = ['>=', 0];
            if($param['cate_id'] > 0){
                $map['cate_id'] = $param['cate_id'];
            }
            $articleModel = new ArticleModel();
            $ImageModel = new ArticleImageModel();
            $article_list = $articleModel->getArticleList($map);
            foreach($article_list as $key => $val){
                if(isset($param['photo']) && $param['photo'] == 1){
                    $img = ROOT_PATH . 'public' . DS . config('upload_img.path').$val['photo'];
                    $this->wm_action($img, $wm);
                }

                if(isset($param['content']) && $param['content'] == 1){
                    $pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/i";
                    preg_match_all($pattern,$val["content"], $picsPath);
                    if(count($picsPath[1]) > 0)
                    {
                        foreach ($picsPath[1] as $pic) {
                            $img = ROOT_PATH . 'public' . $pic;
                            $this->wm_action($img, $wm);
                        }
                    }
                }

                if(isset($param['images']) && $param['images'] == 1){
                    $images = $ImageModel->getAllImage(['articleId'=>$val['id']]);
                    if($images){
                        foreach($images as $v){
                            $img = ROOT_PATH . 'public' . DS . config('upload_img.path').$v['photo'];
                            $this->wm_action($img, $wm);
                        }
                    }
                }
            }
            return json(['code' => 1, 'msg' => '水印批量添加成功']);
        }

        $this->assign('wm',$wm);
        $this->assign('cate',$this->getCateTree());
        return $this->fetch();
    }
    //设置水印参数
    public function setWmPrarm(){
        if(request()->isAjax()){
            $this->TestAuth();
            $wm = input('post.');

            $file  = request()->file('wm_image');
            if($file || (isset($wm['delImage']) && $wm['delImage'] == 1)){
                $upload = new Upload();
                $wm['wm_image'] = $upload->uploadImage($file);
                $wm_image = Db::name('watermark')->where('name','wm_image')->value('value');
            }else{
                unset($wm['wm_image']);
            }
            if(isset($param['delImage'])) unset($wm['delImage']);
            if($wm && is_array($wm)){
                foreach ($wm as $name => $value) {
                    $map = array('name' => $name);
                    Db::name('watermark')->where($map)->setField('value', $value);
                }
                if(!empty($wm_image)) deleteFile($wm_image, config('upload_img.path'));
                return json(['code' => 1, 'msg' =>'保存成功！']);
            }else{
                return json(['code' => 0, 'msg' =>'保存失败！']);
            }
        }
    }

    //批量上传
    public function batchupload(){
        $this->assign('cate',$this->getCateTree());
        return $this->fetch();
    }

    public function multiupload(){
        $param = input('param.');
        if(empty($param['cate_id'])){
            $this->error('请选择栏目分类');
        }

        if($param['photo_style'] > 0 && ((int)$param['small_img_width'] < 1 || (int)$param['small_img_height'] < 1)){
            $this->error('缩略图尺寸填写不正确');
        }

        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getOneCate($param['cate_id']);

        $this->assign('cate_name',$cate['name']);
        $this->assign('cate_id',$param['cate_id']);
        $this->assign('title',$param['title']);
        $this->assign('upload_sort',$param['upload_sort']);
        $this->assign('photo_style',$param['photo_style']);
        $this->assign('small_img_width',$param['small_img_width']);
        $this->assign('small_img_height',$param['small_img_height']);
        return $this->fetch();
    }

    //处理批量上传
    public function handle_multiupload(){
        $this->TestAuth();
        @set_time_limit(5 * 60);
        $param = input('param.');

        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . config('upload_img.path'));
        if($info){
            $fileName = $info->getSaveName();

            $data['title'] = $param['title'];
            if($data['title'] == ""){
                $title_arr = explode('.', $_REQUEST["name"]);
                $data['title']     = $title_arr[0];
            }
            $data['sortnum'] =  Db::name('article')->where('cate_id', $param['cateId'])->max('sortnum') + 10;
            $data['cate_id'] =  $param['cateId'];
            $data['views']   = 0;
            $data['status']  = 1;
            $data['create_time'] = time();
            $data['update_time'] = time();

            $uploadDir = config('upload_img.path');  //上传图片路径
            $upload_img_path = $uploadDir.$fileName;
            $imageAction = new ImageAction();
            if($param['upload_sort'] == 0) //上传内容
            {
                if($param['photo_style'] != 0) // 生成缩略图
                {
                    $small_img_name = date('Ymd') .'/'.getTmpName(). "." . strToLower(getFileExt($fileName)); //生成缩略图名称
                    $small_img_path = $uploadDir . $small_img_name; //生成缩略图路径
                    $imageAction->makeSmallImage($upload_img_path, $small_img_path, $param['small_img_width'], $param['small_img_height'], $param['photo_style']);
                    $data['photo'] =$small_img_name;
                }
                else
                {
                    $data['photo'] = "";
                }

                $data['content']= '<p style="text-align:center"><img src="/'. $upload_img_path .'" alt="" /><p>';
            }
            else  //上传缩略图
            {
                if($param['photo_style'] != 0)
                {
                    $imageAction->makeSmallImage($upload_img_path, $upload_img_path, $param['small_img_width'], $param['small_img_height'], $param['photo_style']);
                }
                $data['photo']     = $fileName;
                $data['content'] = "";
            }
            $flag = Db::name('article')->insert($data);
            if ($flag > 0)
            {
                return json(['code' => 1, 'msg' => '上传成功']);
            }else{
                @unlink($upload_img_path); // 信息添加失败清除上传文件
                if(!empty($small_img_path) && file_exists($small_img_path)) @unlink($small_img_path);
                return json(['code' => 0, 'msg' => '信息添加到数据库失败！']);
            }
        }else{
            return json(['code' => 0, 'msg' => $file->getError()]);
        }
    }

    public function getCateTree(){
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        return $tree::get_cate_tree($cate);
    }

    public function wm_action($img, $param){
        if(file_exists($img) && is_array($param)){
            $imageAction = new ImageAction();
            if($param['wm_type'] == 1){
                $wm_image = ROOT_PATH . 'public' . DS . config('upload_img.path').$param['wm_image'];
                $imageAction->imageWaterMark($img, $wm_image, $param['wm_alpha'], $param['wm_imgquality'], $param['wm_position']);
            }else{
                $fontfamily = EXTEND_PATH.'org/fonts/mysh.ttf';
                $imageAction->textWaterMark($img, $param['wm_text'], $param['wm_fontsize'], $fontfamily, $param['wm_color'], $param['wm_textquality'], $param['wm_position']);
            }
        }
    }
}