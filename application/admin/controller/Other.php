<?php
namespace app\admin\controller;
use app\admin\model\OtherModel;
use app\admin\model\OtherCateModel;
use app\admin\model\ArticleCateModel;
use app\admin\controller\Upload;
use think\Db;

class Other extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('hot_search','friend_link','cate_icon','applet_icon');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }
    /**
     * 热门搜索
     */
    public function hot_search(){
        $this->redirect('other/index',['otherId'=>1]);
    }

    /**
     * 友情链接
     */
    public function friend_link(){
        $this->redirect('other/index',['otherId'=>2]);
    }

    /**
     * 手机站首页分类图标
     */
    public function cate_icon(){
        $this->redirect('other/index',['otherId'=>3]);
    }

    /**
     * 小程序首页分类图标
     */
    public function applet_icon(){
        $this->redirect('other/index',['otherId'=>21]);
    }


    /**
     * 附加列表
     */
    public function index(){
        $otherModel = new otherModel();
        $cateModel = new OtherCateModel();
        $otherId = input('otherId');
        $cate = $cateModel->getOneCate($otherId);
        if(empty($otherId) || !$cate){
            $this->success('分类不存在');
        }

        $map['otherId'] = $otherId;
        $Nowpage = input('get.page') ? input('get.page'):1;
        $cur_page = input('param.cur_page') ? input('param.cur_page'):1;
        $limits = config('list_rows');// 每页显示页数
        $count = $otherModel->getOtherCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));
        $lists = $otherModel->getOtherByWhere($map, $Nowpage, $limits);
        $articleCateModel = new ArticleCateModel();
        foreach($lists as $k => $v){
            if($v['cateId']){
                $articleCate = $articleCateModel->getOneCate($v['cateId']);
                $v['cate_name'] = $articleCate['name'];
            }else{
                $v['cate_name'] = '';
            }
            $lists[$k] = $v;
        }
        if($cur_page > $allpage) $cur_page = $allpage;
        $this->assign('cur_page', $cur_page); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count', $count);
        $this->assign('cate', $cate);

        if(input('get.page')){
            return json($lists);
        }
        return $this->fetch();
    }

    /**
     * 新增
     */
    public function add_other(){
        $otherModel = new otherModel();
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file  = request()->file('photo');
            if($file){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
            }

            $flag = $otherModel->insertOther($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $otherId = input('otherId');
        $cateModel = new OtherCateModel();
        $cate = $cateModel->getOneCate($otherId);
        if(empty($otherId) || !$cate){
            $this->success('分类不存在');
        }
        $sortnum = Db::name('other_list')->where(['otherId'=>$otherId])->max('sortnum') + 10;
        $backUrl = url('index',['otherId'=>$otherId]);

        if($cate['rules']){
            $rules_arr = explode(',',$cate['rules']);
            if(in_array(3, $rules_arr)){
                $tree = new \org\Leftnav;
                $articleCateModel = new ArticleCateModel();
                $articleCate = $articleCateModel->getAllCate();
                $arr = $tree::get_cate_tree($articleCate);
                $this->assign('article_cate',$arr);
            }
        }

        $this->assign('backUrl',$backUrl);
        $this->assign('sortnum', $sortnum);
        $this->assign('cate', $cate);
        return $this->fetch();
    }

    /**
     * 编辑
     */
    public function edit_other(){
        $otherModel = new otherModel();
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file  = request()->file('photo');
            if($file || (isset($param['delPhoto']) && $param['delPhoto'] == 1)){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
                $photo = Db::name('other_list')->where('id',$param['id'])->value('photo');
            }else{
                unset($param['photo']);
            }

            $flag = $otherModel->editOther($param);
            if($flag['code']>0) {
                if (!empty($photo)) deleteFile($photo, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $other = $otherModel->getOneOther($id);
        if(empty($id) || !$other){
            $this->success('信息不存在');
        }
        $cateModel = new OtherCateModel();
        $cate = $cateModel->getOneCate($other['otherId']);
        $backUrl = url('index',['otherId'=>$other['otherId'],'cur_page'=>input('param.cur_page')]);

        if($cate['rules']){
            $rules_arr = explode(',',$cate['rules']);
            if(in_array(3, $rules_arr)){
                $tree = new \org\Leftnav;
                $articleCateModel = new ArticleCateModel();
                $articleCate = $articleCateModel->getAllCate();
                $arr = $tree::get_cate_tree($articleCate);
                $this->assign('article_cate',$arr);
            }
        }

        $this->assign('backUrl',$backUrl);
        $this->assign('other', $other);
        $this->assign('cate', $cate);
        return $this->fetch();
    }

    /**
     * [删除]
     */
    public function del_other()
    {
        $this->TestAuth();
        $id = input('param.id');
        $otherModel = new otherModel();
        $other = $otherModel->getOneOther($id);
        if ($otherModel->delOther(['id'=>$id])) {
            if(!empty($other['photo'])) deleteFile($other['photo'], config('upload_img.path'));
            return json(['code' => 1, 'msg' => '删除成功']);
        } else {
            return json(['code' => 0, 'msg' => '删除失败']);
        }
    }

    //批量删除
    public function all_delete()
    {
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('param.');
            $otherModel = new otherModel();

            $map['id']  = ['in', ''.$param['ids'].''];
            $photo_arr = $otherModel->getImageSrc($map);

            $flag = $otherModel->delOther($map);
            if($flag > 0){
                if(count($photo_arr) > 0){
                    deleteFiles($photo_arr, config('upload_img.path'));
                }
                return json(['code' => 1, 'msg' => '删除成功']);
            }else{
                return json(['code' => 0, 'msg' => '删除失败']);
            }
        }
    }

    //*********************************************分类管理*********************************************//

    /**
     * [附加分类]
     */
    public function index_cate(){

        $cateModel = new OtherCateModel();
        $list = $cateModel->getAllCate();
        $this->assign('cate',$list);
        return $this->fetch();
    }

    /**
     * [add_cate 添加分类]
     */
    public function add_cate()
    {
        $cateModel = new OtherCateModel();
        if (request()->isAjax()) {
            $param = input('post.');

            $param['status'] = isset($param['status']) ? $param['status'] : 0;
            if($param['rules']){
                $param['rules'] = implode(',', $param['rules']);
            }

            $flag = $cateModel->insertCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $sortnum = Db::name('other_cate')->max('sortnum') + 10;
        $this->assign('sortnum', $sortnum);

        return $this->fetch();
    }

    /**
     * [edit_cate 编辑分类]
     * @return [type] [description]
     */
    public function edit_cate()
    {
        $cateModel = new OtherCateModel();
        if(request()->isAjax()){
            $param = input('post.');

            $param['status'] = isset($param['status'])? $param['status']: 0;
            if($param['rules']){
                $param['rules'] = implode(',', $param['rules']);
            }

            $flag = $cateModel->editCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $cate_info = $cateModel->getOneCate($id);
        $this->assign('cate',$cate_info);
        return $this->fetch();
    }


    /**
     * [del_cate 删除分类]
     * @return [type] [description]
     */
    public function del_cate()
    {
        $id = input('param.id');
        $cateModel = new OtherCateModel();

        $a_count = Db::name('other_list')->where('otherId',$id)->count();
        if($a_count > 0){
            return json(['code' => 0, 'data' => "", 'msg' => '分类下有内容，请先删除内容！']);
        }else{
            $flag = $cateModel->delCate($id);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

    }
}