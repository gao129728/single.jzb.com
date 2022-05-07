<?php

namespace app\admin\controller;
use app\admin\controller\Upload;
use app\admin\model\ArticleModel;
use app\admin\model\ArticleCateModel;
use app\admin\model\ArticleImageModel;
use think\Db;

class Article extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('index', 'index_cate', 'article_recycle');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

    /*
     * [index 文章列表]
     */
    public function index(){
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

        if(input('get.page')){
            return json($lists);
        }
      
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);
     
        $this->assign('cate',$arr);
        return $this->fetch();
    }

    /**
     * [add_article 添加文章]
     * @return [type] [description]
     */
    public function add_article()
    {
        if(request()->isAjax()){
            $this->TestAuth();

            $param = input('post.');

            $param['isTop'] = isset($param['isTop'])? $param['isTop']: 0;
            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file  = request()->file('photo');
            if($file){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
            }

            $param['create_time'] = strtotime($param['create_time']);
            $article = new ArticleModel();
            $flag = $article->insertArticle($param);
            if($flag['code'] > 0 && isset($param['img_src']) && count($param['img_src']) > 0){
                $articleImage = new ArticleImageModel();
                $i = 1;
                foreach($param['img_src'] as $k => $arr){
                    $list[$k]['sortnum'] = $i;
                    $list[$k]['articleId'] = $flag['data'];
                    $list[$k]['photo'] = $arr;
                    $list[$k]['title'] = $param['img_name'][$k];
                    $list[$k]['url'] = $param['img_url'][$k];
                    $articleImage->insertImage($list[$k]);
                    $i+=1;
                }
            }

            return json(['code' => $flag['code'], 'msg' => $flag['msg']]);
        }
        $cate_id = input('param.cate_id');
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cateList = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cateList);
        $map['status'] = ['>=', 0];
        if($cate_id){
            $cate = $cateModel->getOneCate($cate_id);
            $isMultiple = $cate['infoStyle'] == 1? 1:0;
            $map['cate_id'] = $cate_id;
        }else{
            $isMultiple = 0;
        }
        $sortnum = Db::name('article')->where($map)->max('sortnum') + 10;
        $backUrl = url('index',['cate_id'=>input('param.cate_id'),'key'=>input('param.key')]);
        $this->assign('cateList',$arr);
        $this->assign('backUrl',$backUrl);
        $this->assign('sortnum', $sortnum);
        $this->assign('cate_id', $cate_id);
        $this->assign('isMultiple', $isMultiple);
        $this->assign('create_time', date('Y-m-d H:i:s'));

        return $this->fetch();
    }

    /**
     * [edit_article 编辑文章]
     * @return [type] [description]
     */
    public function edit_article()
    {
        $articleModel = new ArticleModel();
        $articleImage = new ArticleImageModel();
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');

            $param['isTop'] = isset($param['isTop'])? $param['isTop']: 0;
            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file  = request()->file('photo');
            if($file || (isset($param['delPhoto']) && $param['delPhoto'] == 1)){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
                $photo = Db::name('article')->where('id',$param['id'])->value('photo');
            }else{
                unset($param['photo']);
            }

            $param['create_time'] = strtotime($param['create_time']);
            $flag = $articleModel->updateArticle($param);
            if($flag['code'] > 0){
                if(!empty($photo)) deleteFile($photo, config('upload_img.path'));
                if(isset($param['img_src']) && count($param['img_src']) > 0){
                    $i = 1;
                    foreach($param['img_src'] as $k => $arr){
                        $list[$k]['sortnum'] = $i;
                        $list[$k]['articleId'] = $param['id'];
                        $list[$k]['photo'] = $arr;
                        $list[$k]['title'] = $param['img_name'][$k];
                        $list[$k]['url'] = $param['img_url'][$k];
                        if(isset($param['img_id'][$k]) && $param['img_id'][$k] > 0){
                            $list[$k]['id'] = $param['img_id'][$k];
                            $articleImage->updateImage($list[$k]);
                        }else{
                            $articleImage->insertImage($list[$k]);
                        }
                        $i+=1;
                    }
                }
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cateList = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cateList);
        $this->assign('cateList',$arr);
        $article = $articleModel->getOneArticle($id);
        $cate = $cateModel->getOneCate($article['cate_id']);
        $article['isMultiple'] = $cate['infoStyle'] == 1? 1:0;
        $backUrl = url('index',['cate_id'=>input('param.cate_id'),'key'=>input('param.key'),'cur_page'=>input('param.cur_page')]);
        $this->assign('article',$article);
        $this->assign('backUrl',$backUrl);
        $this->assign('imageList',$articleImage->getAllImage(['articleId'=>$id]));
        return $this->fetch();
    }

    /**
     * [del_article 删除文章至回收站]
     */
    public function del_article()
    {
        $this->TestAuth();
        $param['id'] = input('param.id');
        $param['status'] = -1;
        $cate = new ArticleModel();
        $flag = $cate->updateArticle($param);
        if($flag['code'] > 0){
            return json(['code' => 1, 'msg' => '删除成功']);
        }else{
            return json(['code' => 0, 'msg' => $flag['msg']]);
        }
    }

    /**
     * [批量删除至回收站]
     * @return [type] [description]
     */
    public function all_delete()
    {
        if(request()->isAjax()){
            $this->TestAuth();
            $ids = input('param.ids');
            $param['status'] = -1;
            $map['id'] = ['in', ''.$ids.''];
            $flag = Db::name('article')->where($map)->update($param);
            if($flag > 0){
                return json(['code' => 1, 'msg' => '批量删除成功']);
            }else{
                return json(['code' => 0, 'msg' => '批量删除失败']);
            }
        }
    }

    /**
     * [删除多图]
     */
    public function del_article_img()
    {
        $this->TestAuth();
        $img_id = input('param.img_id');
        $img_src = input('param.img_src');
        if($img_id) {
            $articleImage = new ArticleImageModel();
            if ($articleImage->delImage(['id'=>$img_id])) {
                deleteFile($img_src, config('upload_img.path'));
                return json(['code' => 1, 'msg' => '删除成功']);
            } else {
                return json(['code' => 0, 'msg' => '删除失败']);
            }
        }else{
            deleteFile($img_src, config('upload_img.path'));
            return json(['code' => 1, 'msg' => '删除成功']);
        }
    }

    /**
     * [回收站]
     */
    public function article_recycle(){
        $key = input('key');
        $cate_id = (int)input('cate_id');
        $map['a.status'] = ['<', 0];
        if($key&&$key!==""){
            $map['title'] = ['like',"%" . $key . "%"];
        }
        if($cate_id > 0){
            $map['cate_id'] = $cate_id;
        }

        $Nowpage = input('get.page') ? input('get.page'):1;
        $cur_page = input('param.cur_page') ? input('param.cur_page'):1;
        $limits = config('list_rows');// 获取总条数
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

        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);
        $this->assign('cate',$arr);
        if(input('get.page')){
            return json($lists);
        }
        return $this->fetch();
    }

    /**
     * [回收站删除]
     */
    public function del_recycle()
    {
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('param.');
            $articleModel = new ArticleModel();

            $map['status'] = -1;
            if(!empty($param['id'])){
                $map['id'] = $map_img['articleId'] = $param['id'];
            }else if(!empty($param['ids'])){
                $map['id'] = $map_img['articleId'] = ['in', ''.$param['ids'].''];
            }else{
                $article_id_arr = Db::name('article')->where($map)->column('id');
                $article_id_str = implode(',', $article_id_arr);
                $map_img['articleId'] = ['in', ''.$article_id_str.''];
            }

            $photo_arr = Db::name('article')->where($map)->column('photo');

            $flag = $articleModel->delArticle($map);
            if($flag['code'] > 0){
                if(count($photo_arr) > 0){
                    deleteFiles($photo_arr, config('upload_img.path'));
                }
                $articleImage = new ArticleImageModel();
                $image_photo_arr = $articleImage->getImageSrc($map_img);
                if($articleImage->delImage($map_img)){
                    deleteFiles($image_photo_arr, config('upload_img.path'));
                }
                return json(['code' => 1, 'msg' => '删除成功']);
            }else{
                return json(['code' => 0, 'msg' => $flag['msg']]);
            }
        }
    }

    /**
     * [回收站恢复]
     */
    public function regain_recycle()
    {
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('param.');
            $map['status'] = -1;
            if(!empty($param['id'])){
                $map['id'] = $param['id'];
            }else if(!empty($param['ids'])){
                $map['id'] = ['in', ''.$param['ids'].''];
            }
            $flag = Db::name('article')->where($map)->update(['status'=>1]);
            if($flag > 0){
                return json(['code' => 1, 'msg' => '恢复成功']);
            }else{
                return json(['code' => 0, 'msg' => '恢复失败']);
            }
        }
    }

    //*********************************************分类管理*********************************************//

    /**
     * [index_cate 分类列表]
     * @return [type] [description]
     */
    public function index_cate(){

        $cateModel = new ArticleCateModel();
        $list = $cateModel->getAllCate();
        $homeRoutes   = []; //PC路由规则
        $mobileRoutes   = []; //手机路由规则
        foreach($list as $key=>$val){
            $cnt = $cateModel->getCateCount(['parent_id'=>$val['id']]);
            $val['cateStyle_name'] =config('cate_style')[$val['cateStyle']]['style'];
            $val['hasChild'] = $cnt > 0? 1 : 0;
            $list[$key] = $val;
            if(!empty(htmlspecialchars(trim($val['catedir'])))){
                $homeRoutes[$val['catedir'].'$'] = ['home/category/index?id='.$val['id'], [],['id'=>'\d+']];
                $homeRoutes[$val['catedir'].'/:id$'] = ['home/category/detail', [],['id'=>'\d+']];
                $mobileRoutes[$val['catedir'].'$'] = ['mobile/category/index?id='.$val['id'], [],['id'=>'\d+']];
                $mobileRoutes[$val['catedir'].'/:id$'] = ['mobile/category/detail', [],['id'=>'\d+']];
            }
        }

        /*获取栏目目录 写入路由规则*/
        if (!empty($homeRoutes) && is_array($homeRoutes)) {
            $jzb_website_info = config('jzb_website_info');
            $route_dir = ROOT_PATH . "data/route/";
            if (!file_exists($route_dir)) {
                mkdir($route_dir, 0755, true);
            }
            $allRoutes['home'] = $homeRoutes;
            $allRoutes['mobile'] = $mobileRoutes;
            $route_file = $route_dir . "route.php";
            file_put_contents($route_file, "<?php\treturn " . stripslashes(var_export($allRoutes, true)) . ";");
        }

        $tree = new \org\Leftnav;
        $arr = $tree::get_cate_tree($list,'','4');
        $this->assign('cate_tree',$arr);
        return $this->fetch();
    }

    /**
     * [add_cate 添加分类]
     * @return [type] [description]
     */
    public function add_cate()
    {
        $cate = new ArticleCateModel();
        if (request()->isAjax()) {
            $this->TestAuth();
            $param = input('post.');

            $param['catedir'] = trim($param['catedir']);
            $param['isTarget'] = isset($param['isTarget']) ? $param['isTarget'] : 0;
            $param['isNav'] = isset($param['isNav']) ? $param['isNav'] : 0;
            $param['status'] = isset($param['status']) ? $param['status'] : 0;
            if($param['catedir'] == 'mobile')  return json(['code' =>0, 'msg' => '栏目目录不能为mobile']);

            $file = request()->file('photo');
            if ($file) {
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
            }
            $cateStyle = $param['cateStyle'];
            $param['cateParam'] = '';
            if(isset($param['paramCnt'][$cateStyle])){
                for ($i = 0; $i <= $param['paramCnt'][$cateStyle]; $i++) {
                    if(!isset($param['styleParam'][$cateStyle][$i])) $param['styleParam'][$cateStyle][$i] = 0;
                    $param_str = $param['styleParam'][$cateStyle][$i];
                    $param_str = $i > 0 ? '|' . $param_str : $param_str;
                    $param['cateParam'] .= $param_str;
                }
            }

            $infoStyle = $param['infoStyle'];
            $param['infoParam'] = '';
            if(isset($param['infoParamCnt'][$infoStyle])){
                for ($i = 0; $i <= $param['infoParamCnt'][$infoStyle]; $i++) {
                    if(!isset($param['setParam'][$infoStyle][$i])) $param['setParam'][$infoStyle][$i] = 0;
                    $param_str = $param['setParam'][$infoStyle][$i];
                    $param_str = $i > 0 ? '|' . $param_str : $param_str;
                    $param['infoParam'] .= $param_str;
                }
            }

            $flag = $cate->insertCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $cate_style = config('cate_style');
        $info_style = config('info_style');
        if ($id > 0) {
            $map['parent_id'] = $id;
            $cateInfo = $cate->getOneCate($id);
            $cateStyle = $cateInfo['cateStyle'];
            $infoStyle = $cateInfo['infoStyle'];
            $cate_style[$cateStyle]['param'] = $cateInfo['cateParam'];
            $info_style[$infoStyle]['param'] = $cateInfo['infoParam'];
        } else {
            $map['parent_id'] = 0;
            $cateStyle = 0;
            $infoStyle = 0;
        }

        $cateParam = [];
        foreach($cate_style as $key=>$val){
            $param_arr = [];
            if(!empty($val['param'])){
                $param_arr = explode('|',$val['param']);
            }
            $cateParam[$key] = $param_arr;
        }

        $infoParam = [];
        foreach($info_style as $key=>$val1){
            $param_arr = [];
            if(!empty($val1['param'])){
                $param_arr = explode('|',$val1['param']);
            }
            $infoParam[$key] = $param_arr;
        }

        $orderby = Db::name('article_cate')->where($map)->max('orderby') + 10;
        $tree = new \org\Leftnav;
        $cate = $cate->getAllCate();
        $arr = $tree::get_cate_tree($cate);
        $this->assign('cate_tree', $arr);
        $this->assign('cate_id', $id);
        $this->assign('orderby', $orderby);
        $this->assign('cateParam', $cateParam);
        $this->assign('infoParam', $infoParam);
        $this->assign('form_list', config('form_style'));
        $this->assign('cateStyle', $cateStyle);
        $this->assign('infoStyle', $infoStyle);
        return $this->fetch();
    }

    /**
     * [edit_cate 编辑分类]
     * @return [type] [description]
     */
    public function edit_cate()
    {
        $cateModel = new ArticleCateModel();
        $tree = new \org\Leftnav;
        $cate = $cateModel->getAllCate();
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');

            if($param['parent_id'] == $param['id']){
                return json(['code' => 0, 'data' =>'', 'msg' => '所属父级不能为当前分类']);
            }
            $child_arr = $tree::get_cate_id($cate, $param['id']);
            if(in_array($param['parent_id'], $child_arr)){
                return json(['code' => 0, 'data' => '', 'msg' => '所属父级不能为当前分类的下级']);
            }

            $param['catedir'] = trim($param['catedir']);
            $param['isTarget'] = isset($param['isTarget'])? $param['isTarget']: 0;
            $param['isNav'] = isset($param['isNav'])? $param['isNav']: 0;
            $param['status'] = isset($param['status'])? $param['status']: 0;
            if($param['catedir'] == 'mobile')  return json(['code' =>0, 'msg' => '栏目目录不能为mobile']);

            $file  = request()->file('photo');
            if($file || (isset($param['delPhoto']) && $param['delPhoto'] == 1)){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
                $photo = Db::name('article_cate')->where('id',$param['id'])->value('photo');
            }else{
                unset($param['photo']);
            }

            $cateStyle = $param['cateStyle'];
            $param['cateParam'] = '';
            if(isset($param['paramCnt'][$cateStyle])){
                for ($i = 0; $i <= $param['paramCnt'][$cateStyle]; $i++) {
                    if(!isset($param['styleParam'][$cateStyle][$i])) $param['styleParam'][$cateStyle][$i] = 0;
                    $param_str = $param['styleParam'][$cateStyle][$i];
                    $param_str = $i > 0 ? '|' . $param_str : $param_str;
                    $param['cateParam'] .= $param_str;
                }
            }

            $infoStyle = $param['infoStyle'];
            $param['infoParam'] = '';
            if(isset($param['infoParamCnt'][$infoStyle])){
                for ($i = 0; $i <= $param['infoParamCnt'][$infoStyle]; $i++) {
                    if(!isset($param['setParam'][$infoStyle][$i])) $param['setParam'][$infoStyle][$i] = 0;
                    $param_str = $param['setParam'][$infoStyle][$i];
                    $param_str = $i > 0 ? '|' . $param_str : $param_str;
                    $param['infoParam'] .= $param_str;
                }
            }

            $flag = $cateModel->editCate($param);
            if($flag['code'] > 0 && !empty($photo)){
                deleteFile($photo, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $arr = $tree::get_cate_tree($cate);
        $cate_info = $cateModel->getOneCate($id);

        $cate_style = config('cate_style');
        $info_style = config('info_style');

        $cateStyle = $cate_info['cateStyle'];
        $infoStyle = $cate_info['infoStyle'];
        $cate_style[$cateStyle]['param'] = $cate_info['cateParam'];
        $info_style[$infoStyle]['param'] = $cate_info['infoParam'];

        $cateParam = [];
        foreach($cate_style as $key=>$val){
            $param_arr = [];
            if(!empty($val['param'])){
                $param_arr = explode('|',$val['param']);
            }
            $cateParam[$key] = $param_arr;
        }

        $infoParam = [];
        foreach($info_style as $key=>$val1){
            $param_arr = [];
            if(!empty($val1['param'])){
                $param_arr = explode('|',$val1['param']);
            }
            $infoParam[$key] = $param_arr;
        }

        $this->assign('cate_tree',$arr);
        $this->assign('cate',$cate_info);
        $this->assign('cateParam',$cateParam);
        $this->assign('infoParam',$infoParam);
        $this->assign('form_list',config('form_style'));
        return $this->fetch();
    }

    /**
     * [del_cate 删除分类]
     * @return [type] [description]
     */
    public function del_cate()
    {
        $this->TestAuth();
        $id = input('param.id');
        $cate = new ArticleCateModel();

        $c_count = $cate->getCateCount(['parent_id'=>$id]);
        $a_count = Db::name('article')->where('cate_id',$id)->count(); //判断分类下是否有文章
        if($c_count > 0){
            return json(['code' => 0, 'data' => "", 'msg' => '分类下有子类，请先删除子类！']);
        }else if($a_count > 0){
            return json(['code' => 0, 'data' => "", 'msg' => '分类下有文章，请先删除分类下的文章！']);
        }else{
            $photo = Db::name('article_cate')->where('id',$id)->value('photo');
            $flag = $cate->delCate($id);
            if($flag['code']>0){
                if(!empty($photo)) deleteFile($photo, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

    }

}