<?php

namespace app\admin\controller;
use app\admin\controller\Upload;
use app\admin\model\SidebarModel;
use app\admin\model\ArticleCateModel;
use think\Db;

class Sidebar extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('index');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
        $moduleModel= new SidebarModel();
        $list = $moduleModel->getAllModule();
        $this->assign('module_list', $list);
        $this->assign('module_id','');
        $this->assign('nav_menu','sidebar');
    }

    public function index()
    {
        if (request()->isAjax()) {
            $this->TestAuth();
            $moduleModel= new SidebarModel();
            $param = input('post.');
            $param['status'] = isset($param['status']) ? $param['status'] : 0;

            $module_style = $param['module_style'];
            if($module_style == 4){
                $param['module_content'] = $param['styleParam'][$module_style];
            }else{
                $param['module_param'] = '';
                for ($i = 0; $i <= $param['paramCnt'][$module_style]; $i++) {
                    if(!isset($param['styleParam'][$module_style][$i])) $param['styleParam'][$module_style][$i] = 0;
                    $single_par = $param['styleParam'][$module_style][$i];
                    $single_par = $i > 0 ? '|' . $single_par : $single_par;
                    $param['module_param'] .= $single_par;
                }
            }
            $param['sortnum'] = Db::name('web_sidebar')->max('sortnum')+1;
            $flag = $moduleModel->addModule($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);

        $module_style_param = config('sidebar_module_param');
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
        $moduleModel= new SidebarModel();

        if (request()->isAjax()) {
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status']) ? $param['status'] : 0;

            $module_style = $param['module_style'];
            if($module_style == 4){
                $param['module_content'] = $param['styleParam'][$module_style];
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
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        if(empty($id) || $id < 1){
            $this->error('参数错误');
        }
        $module = $moduleModel->getOneModule($id);
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);

        $module_style_param = config('sidebar_module_param');
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
        $moduleModel= new SidebarModel();
        $flag = $moduleModel->delModule($id);
        return json(['code' => $flag['code'], 'data' => '', 'msg' => $flag['msg']]);
    }

    public function state_module(){
        if(request()->isAjax()){
            $this->TestAuth();
            $id = input('param.id');
            $moduleModel= new SidebarModel();
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
                $moduleModel= new SidebarModel();
                foreach($param['mo_id'] as $key => $val){
                    $data['id'] = $val;
                    $data['sortnum'] = $key+1;
                    $moduleModel->updateModule($data);
                }
            }
            return json(['code' => 1, 'msg' => '更新排序成功']);
        }
    }

}