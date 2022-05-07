<?php
namespace app\admin\controller;
use app\admin\model\BannerModel;
use app\admin\controller\Upload;
use think\Db;

class Banner extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('index','wap_banner');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

    /**
     * PC banner管理
     */
    public function index(){
        $bannerModel = new BannerModel();
        $param = input('param.');
        $map['banner_type'] = 0;
        $map['status'] = 1;
        if(isset($param['id']) && $param['id'] > 0){
            $banner = $bannerModel->getOneCate($param['id']);
        }else{
            $banner = Db::name('banner_cate')->where($map)->order('sortnum asc, id asc')->find();
        }
        if(!$banner){
            $this->error('暂无Banner分类');
        }
        $this->assign('banner',$banner);
        $this->assign('banner_list',$bannerModel->getCateByWhere($map));
        $this->assign('imageList',$bannerModel->getAllImage(['bannerId'=>$banner['id']]));
        return $this->fetch();
    }

    /**
     * 手机站 banner管理
     */
    public function wap_banner(){
        $bannerModel = new BannerModel();
        $param = input('param.');
        $map['banner_type'] = 1;
        $map['status'] = 1;
        if(isset($param['id']) && $param['id'] > 0){
            $banner = $bannerModel->getOneCate($param['id']);
        }else{
            $banner = Db::name('banner_cate')->where($map)->order('sortnum asc, id asc')->find();
        }
        if(!$banner){
            $this->error('暂无Banner分类');
        }
        $this->assign('banner',$banner);
        $this->assign('banner_list',$bannerModel->getCateByWhere($map));
        $this->assign('imageList',$bannerModel->getAllImage(['bannerId'=>$banner['id']]));
        return $this->fetch();
    }

    /**
     * 手机站 banner管理
     */
    public function applet_banner(){
        $bannerModel = new BannerModel();
        $param = input('param.');
        $map['banner_type'] = 2;
        $map['status'] = 1;
        if(isset($param['id']) && $param['id'] > 0){
            $banner = $bannerModel->getOneCate($param['id']);
        }else{
            $banner = Db::name('banner_cate')->where($map)->order('sortnum asc, id asc')->find();
        }
        if(!$banner){
            $this->error('暂无Banner分类');
        }
        $this->assign('banner',$banner);
        $this->assign('banner_list',$bannerModel->getCateByWhere($map));
        $this->assign('imageList',$bannerModel->getAllImage(['bannerId'=>$banner['id']]));
        return $this->fetch();
    }

    public function save_banner(){
        if(request()->isAjax()){
            $this->TestAuth();
            $bannerModel = new BannerModel();
            $param = input('post.');

            $param['switch'] = isset($param['switch'])? $param['switch']: 0;
            $param['auto'] = isset($param['auto'])? $param['auto']: 0;
            $param['aside_btn'] = isset($param['aside_btn'])? $param['aside_btn']: 0;
            $param['circle_btn'] = isset($param['circle_btn'])? $param['circle_btn']: 0;

            $flag = $bannerModel->editCate($param);
            if($flag['code']>0){
                if(isset($param['img_src']) && count($param['img_src']) > 0){
                    $i = 1;
                    foreach($param['img_src'] as $k => $arr){
                        $data[$k]['sortnum'] = $i;
                        $data[$k]['bannerId'] = $param['id'];
                        $data[$k]['photo'] = $arr;
                        $data[$k]['title'] = $param['img_name'][$k];
                        $data[$k]['url'] = $param['img_url'][$k];
                        $data[$k]['state'] = isset($param['state'][$k])? $param['state'][$k] : 0;
                        if(isset($param['img_id'][$k]) && $param['img_id'][$k] > 0){
                            $data[$k]['id'] = $param['img_id'][$k];
                            $bannerModel->updateImage($data[$k]);
                        }else{
                            $bannerModel->insertImage($data[$k]);
                        }
                        $i+=1;
                    }
                }
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
    }

    /**
     * [删除banner图片]
     */
    public function del_banner_img()
    {
        $this->TestAuth();
        $img_id = input('param.img_id');
        $img_src = input('param.img_src');
        if($img_id) {
            $bannerModel = new BannerModel();
            if ($bannerModel->delImage(['id'=>$img_id])) {
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


    //*********************************************分类管理*********************************************//

    public function index_cate(){

        $bannerModel = new BannerModel();
        $list = $bannerModel->getAllCate();
        $this->assign('cate',$list);
        return $this->fetch();
    }

    /**
     * [add_cate 添加分类]
     * @return [type] [description]
     */
    public function add_cate()
    {
        $bannerModel = new BannerModel();
        if (request()->isAjax()) {
            $param = input('post.');

            $param['status'] = isset($param['status']) ? $param['status'] : 0;

            $flag = $bannerModel->insertCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $sortnum = Db::name('banner_cate')->max('sortnum') + 10;
        $this->assign('sortnum', $sortnum);

        return $this->fetch();
    }

    /**
     * [edit_cate 编辑分类]
     * @return [type] [description]
     */
    public function edit_cate()
    {
        $bannerModel = new BannerModel();
        if(request()->isAjax()){
            $param = input('post.');

            $param['status'] = isset($param['status'])? $param['status']: 0;

            $flag = $bannerModel->editCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $cate_info = $bannerModel->getOneCate($id);
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
        $bannerModel = new BannerModel();

        $a_count = Db::name('banner_image')->where('bannerId',$id)->count();
        if($a_count > 0){
            return json(['code' => 0, 'data' => "", 'msg' => '分类下有图片，请先删除图片！']);
        }else{
            $flag = $bannerModel->delCate($id);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

    }
}