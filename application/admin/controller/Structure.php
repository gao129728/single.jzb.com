<?php

namespace app\admin\controller;
use app\admin\controller\Upload;
use app\admin\model\StructureModel;
use app\admin\model\ModuleModel;
use app\admin\model\ArticleCateModel;
use think\Db;

class Structure extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('index');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
        $structureModel= new StructureModel();
        $moduleModel= new ModuleModel();
        $list = $structureModel->getAllStructure();
        foreach($list as $key => $val){
            $val['module'] = $moduleModel->getModuleByWhere(['module_class'=>$val['id']]);
            $list[$key] = $val;
        }
        $this->assign('structure_list', $list);
        $this->assign('structure_id','');
        $this->assign('module_id','');
    }

    public function index()
    {
        $structureModel= new StructureModel();
        if (request()->isAjax()) {
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status']) ? $param['status'] : 0;
            $param['sortnum'] = Db::name('structure')->max('sortnum')+1;

            $file = request()->file('photo');
            if ($file) {
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
            }

            $flag = $structureModel->insertStructure($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        return $this->fetch();
    }

    public function edit_structure()
    {
        $structureModel= new StructureModel();
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file  = request()->file('photo');
            if($file || (isset($param['delPhoto']) && $param['delPhoto'] == 1)){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
                $photo = Db::name('structure')->where('id',$param['id'])->value('photo');
            }else{
                unset($param['photo']);
            }

            $flag = $structureModel->editStructure($param);
            if($flag['code'] > 0){
                if (!empty($photo)) deleteFile($photo, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        if(empty($id) || $id < 1){
            $this->error('参数错误');
        }
        $structure = $structureModel->getOneStructure($id);
        $this->assign('structure',$structure);
        $this->assign('structure_id',$id);
        $this->assign('module_id','');
        return $this->fetch();
    }

    public function del_structure()
    {
        $this->TestAuth();
        $id = input('param.id');
        $structureModel= new StructureModel();
        $moduleModel= new ModuleModel();
        $count = $moduleModel->getModuleCnt(['module_class'=>$id]);
        if($count > 0){
            return json(['code' => 0, 'data' => "", 'msg' => '模块下有子板块，请先删除子板块！']);
        }else{
            $photo = Db::name('structure')->where('id',$id)->value('photo');
            $flag = $structureModel->delStructure($id);
            if($flag['code']>0){
                if(!empty($photo)) deleteFile($photo, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
    }

    public function state_structure(){
        if(request()->isAjax()){
            $this->TestAuth();
            $id = input('param.id');
            $structureModel= new StructureModel();
            $structure = $structureModel->getOneStructure($id);
            $data['id'] = $id;
            if($structure['status'] == 1){
                $data['status'] = 0;
                $code = 1;
            }else{
                $data['status'] = 1;
                $code = 2;
            }
            if($structureModel->updateStructure($data)){
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
            if(isset($param['st_id']) && count($param['st_id']) > 0){
                $structureModel= new StructureModel();
                $moduleModel= new ModuleModel();
                foreach($param['st_id'] as $key => $val){
                    $data['id'] = $val;
                    $data['sortnum'] = $key+1;
                    $structureModel->updateStructure($data);
                    if(isset($param['mo_id'][$val]) && count($param['mo_id'][$val]) > 0){
                        foreach($param['mo_id'][$val] as $k => $v) {
                            $mo_data['id'] = $v;
                            $mo_data['sortnum'] = $k+1;
                            $moduleModel->updateModule($mo_data);
                        }
                    }
                }
            }
            return json(['code' => 1, 'msg' => '更新排序成功']);
        }
    }

    public function add_module()
    {
        if (request()->isAjax()) {
            $this->TestAuth();
            $moduleModel= new ModuleModel();
            $param = input('post.');
            $param['isMore'] = isset($param['isMore']) ? $param['isMore'] : 0;
            $param['state'] = isset($param['state']) ? $param['state'] : 0;

            $file = request()->file('titPic');
            if ($file) {
                $upload = new Upload();
                $param['titPic'] = $upload->uploadImage($file);
            }
            if($param['titleStyle'] == 3 && isset($param['attr_name'])){
                $param['title_source'] = '';
                foreach($param['attr_name'] as $k => $attr){
                    $attr_str = $attr.'&'.$param['attr_cate'][$k];
                    $title_source = $k>0? '|'.$attr_str:$attr_str;
                    $param['title_source'] .= $title_source;
                }
            }
            $module_style = $param['module_style'];
            if($module_style == 4){
                $param['module_content'] = $param['styleParam'][$module_style];
            }else{
                $param['module_param'] = '';
                for ($i = 0; $i <= $param['paramCnt'][$module_style]; $i++) {
                    if(!isset($param['styleParam'][$module_style][$i])) $param['styleParam'][$module_style][$i] = 0;
                    if($module_style == 5 && is_array($param['styleParam'][$module_style][$i])){
                        $single_par = implode(',', $param['styleParam'][$module_style][$i]);
                    }else{
                        $single_par = $param['styleParam'][$module_style][$i];
                    }
                    $single_par = $i > 0 ? '|' . $single_par : $single_par;
                    $param['module_param'] .= $single_par;
                }
            }
            $map['module_class'] = $param['module_class'];
            $param['sortnum'] = Db::name('structure_module')->where($map)->max('sortnum')+1;
            $flag = $moduleModel->addModule($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $st_id = input('param.st_id');
        if(empty($st_id) || $st_id < 1){
            $this->error('参数错误');
        }
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);
        $structureModel= new StructureModel();
        $structure = $structureModel->getOneStructure($st_id);

        $module_style_param = config('module_style_param');
        $styleParam = [];
        foreach($module_style_param as $key=>$val){
            $param_arr = [];
            if(!empty($val['param'])){
                $param_arr = explode('|',$val['param']);
            }
            $styleParam[$key] = $param_arr;
        }
        $this->assign('cate',$arr);
        $this->assign('structure_name',$structure['name']);
        $this->assign('structure_id',$st_id);
        $this->assign('module_style_param',$module_style_param);
        $this->assign('styleParam',$styleParam);
        return $this->fetch();
    }

    public function edit_module()
    {
        $moduleModel= new ModuleModel();
        if (request()->isAjax()) {
            $this->TestAuth();
            $param = input('post.');
            $param['isMore'] = isset($param['isMore']) ? $param['isMore'] : 0;
            $param['state'] = isset($param['state']) ? $param['state'] : 0;

            $file  = request()->file('titPic');
            if($file || (isset($param['deltitPic']) && $param['deltitPic'] == 1)){
                $upload = new Upload();
                $param['titPic'] = $upload->uploadImage($file);
                $titPic = Db::name('structure_module')->where('id',$param['id'])->value('titPic');
            }else{
                unset($param['titPic']);
            }
            if($param['titleStyle'] == 3 && isset($param['attr_name'])){
                $param['title_source'] = '';
                foreach($param['attr_name'] as $k => $attr){
                    $attr_str = $attr.'&'.$param['attr_cate'][$k];
                    $title_source = $k>0? '|'.$attr_str:$attr_str;
                    $param['title_source'] .= $title_source;
                }
            }
            $module_style = $param['module_style'];
            if($module_style == 4){
                $param['module_content'] = $param['styleParam'][$module_style];
            }else{
                $param['module_param'] = '';
                for ($i = 0; $i <= $param['paramCnt'][$module_style]; $i++) {
                    if(!isset($param['styleParam'][$module_style][$i])) $param['styleParam'][$module_style][$i] = 0;
                    if($module_style == 5 && is_array($param['styleParam'][$module_style][$i])){
                        $single_par = implode(',', $param['styleParam'][$module_style][$i]);
                    }else{
                        $single_par = $param['styleParam'][$module_style][$i];
                    }
                    $single_par = $i > 0 ? '|' . $single_par : $single_par;
                    $param['module_param'] .= $single_par;
                }
            }
            $flag = $moduleModel->editModule($param);
            if($flag['code'] > 0){
                if (!empty($titPic)) deleteFile($titPic, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        if(empty($id) || $id < 1){
            $this->error('参数错误');
        }
        $module = $moduleModel->getOneModule($id);
        if($module['title_source']){
            $title_attr = explode('|',$module['title_source']);
            $title_source = [];
            foreach($title_attr as $k => $v){
                $tit_arr = explode('&',$v);
                $title_source[$k]['name'] = $tit_arr[0];
                $title_source[$k]['cate'] = $tit_arr[1];
            }
            $module['title_source'] = $title_source;
        }
        $tree = new \org\Leftnav;
        $cateModel = new ArticleCateModel();
        $cate = $cateModel->getAllCate();
        $arr = $tree::get_cate_tree($cate);
        $structureModel= new StructureModel();
        $structure = $structureModel->getOneStructure($module['module_class']);

        $module_style_param = config('module_style_param');
        $styleParam = [];
        foreach($module_style_param as $key=>$val){
            $param_arr = [];
            if($key == $module['module_style']) $val['param'] = $module['module_param'];
            if(!empty($val['param'])){
                $param_arr = explode('|',$val['param']);
            }
            $styleParam[$key] = $param_arr;
        }
        if($module['module_style'] == 5 && $styleParam[5][1]){
            $styleParam[5][1] = explode(',',$styleParam[5][1]);
        }
        $this->assign('module_id',$id);
        $this->assign('module',$module);
        $this->assign('cate',$arr);
        $this->assign('structure_name',$structure['name']);
        $this->assign('structure_id',$structure['id']);
        $this->assign('module_style_param',$module_style_param);
        $this->assign('styleParam',$styleParam);
        return $this->fetch();
    }

    public function del_module()
    {
        $this->TestAuth();
        $id = input('param.id');
        $moduleModel= new ModuleModel();
        $module = $moduleModel->getOneModule($id);
        $flag = $moduleModel->delModule($id);
        if($flag['code']>0){
            if(!empty($module['titPic'])) deleteFile($module['titPic'], config('upload_img.path'));
        }
        return json(['code' => $flag['code'], 'data' => $module['module_class'], 'msg' => $flag['msg']]);
    }

    public function state_module(){
        if(request()->isAjax()){
            $this->TestAuth();
            $id = input('param.id');
            $moduleModel= new ModuleModel();
            $module = $moduleModel->getOneModule($id);
            $data['id'] =$id;
            if($module['state'] == 1){
                $data['state'] = 0;
                $code = 1;
            }else{
                $data['state'] = 1;
                $code = 2;
            }
            if($moduleModel->updateModule($data)){
                return json(['code' => $code, 'msg' => '设置成功']);
            }else{
                return json(['code' =>0, 'msg' => '设置失败']);
            }
        }
    }
}