<?php

namespace app\admin\controller;
use app\admin\controller\Upload;
use app\admin\model\AppletModuleModel;
use app\admin\model\ArticleCateModel;
use think\Db;

class Appletmodule extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('index');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
        $moduleModel= new AppletModuleModel();
        $list = $moduleModel->getAllModule();
        $this->assign('module_list', $list);
        $this->assign('module_id','');
    }

    public function index()
    {
        if (request()->isAjax()) {
            $this->TestAuth();

            $moduleModel= new AppletModuleModel();
            $upload = new Upload();
            $param = input('post.');
            $param['status'] = isset($param['status']) ? $param['status'] : 0;

            $file = request()->file('titPic');
            if ($file) {
                $param['titPic'] = $upload->uploadImage($file);
            }

            $file_bg  = request()->file('bgphoto');
            if($file_bg){
                $param['bgphoto'] = $upload->uploadImage($file_bg);
            }

            $module_style = $param['module_style'];
            if($module_style == 4){
                if(isset($param['img_src']) && count($param['img_src']) > 0){
                    $param['module_content'] = implode(',',$param['img_src']);
                }
            }else{
                $param['module_param'] = '';
                for ($i = 0; $i <= $param['paramCnt'][$module_style]; $i++) {
                    if(!isset($param['styleParam'][$module_style][$i])) $param['styleParam'][$module_style][$i] = 0;
                    $single_par = $param['styleParam'][$module_style][$i];
                    $single_par = $i > 0 ? '|' . $single_par : $single_par;
                    $param['module_param'] .= $single_par;
                }
            }
            $map['module_class'] = $param['module_class'];
            $param['sortnum'] = Db::name('wap_module')->max('sortnum')+1;
            $flag = $moduleModel->addModule($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);

        $module_style_param = config('applet_module_param');
        $styleParam = [];
        foreach($module_style_param as $key=>$val){
            $param_arr = [];
            if(!empty($val['param'])){
                $param_arr = explode('|',$val['param']);
            }
            $styleParam[$key] = $param_arr;
        }
        $this->assign('cate',$arr);
        $this->assign('module_style_param',$module_style_param);
        $this->assign('styleParam',$styleParam);
        return $this->fetch();
    }

    public function edit_module()
    {
        $moduleModel= new AppletModuleModel();
        $upload = new Upload();

        if (request()->isAjax()) {
            $this->TestAuth();

            $param = input('post.');
            $param['status'] = isset($param['status']) ? $param['status'] : 0;

            $file  = request()->file('titPic');
            if($file || (isset($param['deltitPic']) && $param['deltitPic'] == 1)){
                $param['titPic'] = $upload->uploadImage($file);
                $titPic = Db::name('wap_module')->where('id',$param['id'])->value('titPic');
            }else{
                unset($param['titPic']);
            }

            $file_bg  = request()->file('bgphoto');
            if($file_bg || (isset($param['delbgphoto']) && $param['delbgphoto'] == 1)){
                $param['bgphoto'] = $upload->uploadImage($file_bg);
                $bgphoto = Db::name('wap_module')->where('id',$param['id'])->value('bgphoto');
            }else{
                unset($param['bgphoto']);
            }

            $module_style = $param['module_style'];
            if($module_style == 4){
                if(isset($param['img_src']) && count($param['img_src']) > 0){
                    $param['module_content'] = implode(',',$param['img_src']);
                }
            }else{
                $param['module_param'] = '';
                for ($i = 0; $i <= $param['paramCnt'][$module_style]; $i++) {
                    if(!isset($param['styleParam'][$module_style][$i])) $param['styleParam'][$module_style][$i] = 0;
                    $single_par = $param['styleParam'][$module_style][$i];
                    $single_par = $i > 0 ? '|' . $single_par : $single_par;
                    $param['module_param'] .= $single_par;
                }
            }

            $flag = $moduleModel->editModule($param);
            if($flag['code'] > 0){
                if (!empty($titPic)) deleteFile($titPic, config('upload_img.path'));
                if (!empty($bgphoto)) deleteFile($bgphoto, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        if(empty($id) || $id < 1){
            $this->error('参数错误');
        }
        $module = $moduleModel->getOneModule($id);

        if(!empty($module['module_content'])) $module['module_content'] = explode(',',$module['module_content']);
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);

        $module_style_param = config('applet_module_param');
        $styleParam = [];
        foreach($module_style_param as $key=>$val){
            $param_arr = [];
            if($key == $module['module_style']) $val['param'] = $module['module_param'];
            if(!empty($val['param'])){
                $param_arr = explode('|',$val['param']);
            }
            $styleParam[$key] = $param_arr;
        }
        $this->assign('module_id',$id);
        $this->assign('module',$module);
        $this->assign('cate',$arr);
        $this->assign('module_style_param',$module_style_param);
        $this->assign('styleParam',$styleParam);
        return $this->fetch();
    }

    public function del_module()
    {
        $this->TestAuth();
        $id = input('param.id');
        $moduleModel= new AppletModuleModel();
        $module = $moduleModel->getOneModule($id);
        $flag = $moduleModel->delModule($id);
        if($flag['code']>0){
            if(!empty($module['titPic'])) deleteFile($module['titPic'], config('upload_img.path'));
            if(!empty($module['bgphoto'])) deleteFile($module['bgphoto'], config('upload_img.path'));
            if(!empty($module['module_content'])) deleteFiles($module['module_content'], config('upload_img.path'));
        }
        return json(['code' => $flag['code'], 'data' => '', 'msg' => $flag['msg']]);
    }

    public function state_module(){
        if(request()->isAjax()){
            $this->TestAuth();
            $id = input('param.id');
            $moduleModel= new AppletModuleModel();
            $module = $moduleModel->getOneModule($id);
            $data['id'] =$id;
            if($module['status'] == 1){
                $data['status'] = 0;
                $code = 1;
            }else{
                $data['status'] = 1;
                $code = 2;
            }
            if($moduleModel->updateModule($data)){
                return json(['code' => $code, 'msg' => '设置成功']);
            }else{
                return json(['code' =>0, 'msg' => '设置失败']);
            }
        }
    }

    public function update_order(){
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            if(isset($param['mo_id']) && count($param['mo_id']) > 0){
                $moduleModel= new AppletModuleModel();
                foreach($param['mo_id'] as $key => $val){
                    $data['id'] = $val;
                    $data['sortnum'] = $key+1;
                    $moduleModel->updateModule($data);
                }
            }
            return json(['code' => 1, 'msg' => '更新排序成功']);
        }
    }

    /**
     * [删除模块图片]
     */
    public function del_module_img()
    {
        $this->TestAuth();
        $id = input('param.id');
        $img_src = input('param.img_src');
        if($id) {
            $moduleModel= new AppletModuleModel();
            $module = $moduleModel->getOneModule($id);
            $img_arr = explode(',', $module['module_content']);
            $key = array_keys($img_arr,$img_src,true);
            unset($img_arr[$key[0]]);
            $module_content = implode(',', $img_arr);
            $flag = $moduleModel->editModule(['id'=>$id, 'module_content'=>$module_content]);
            if ($flag['code'] > 0) {
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

}