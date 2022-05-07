<?php
namespace app\admin\controller;
use app\admin\model\AppletModel;
use app\admin\model\AppletNavModel;
use app\admin\model\ArticleCateModel;
use app\admin\controller\Upload;
use think\Db;

class Applet extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('config','nav_index');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

    /**
     * 获取配置参数
     */
    public function config() {
        $configModel = new AppletModel();
        $list = $configModel->getAllConfig();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        $newsParam = explode('|',$config['newsParam']);
        $picParam = explode('|',$config['picParam']);
        $picTxtParam = explode('|',$config['picTxtParam']);
        $this->assign('newsParam',$newsParam);
        $this->assign('picParam',$picParam);
        $this->assign('picTxtParam',$picTxtParam);
        $this->assign('config',$config);
        return $this->fetch();
    }

    /**
     * 批量保存配置
     *
     */
    public function save_config(){
        if(request()->isAjax()){
            $this->TestAuth();

            $param = input('post.');
            $config = $param['config'];
            $configModel = new AppletModel();
            $upload = new Upload();

            $file  = request()->file('applet_logo');
            if($file || (isset($param['delLogo']) && $param['delLogo'] == 1)){
                $config['applet_logo'] = $upload->uploadImage($file);
                $logo = Db::name('applet_config')->where('name','applet_logo')->value('value');
            }

            $config['newsParam'] = '';
            for ($i = 0; $i <= $param['newsCnt']; $i++) {
                if(!isset($param['newsParam'][$i])) $param['styleParam'][$i] = 0;
                $param['newsParam'][$i] = $i > 0 ? '|' . $param['newsParam'][$i] : $param['newsParam'][$i];
                $config['newsParam'] .= $param['newsParam'][$i];
            }

            $config['picParam'] = '';
            for ($i = 0; $i <= $param['picCnt']; $i++) {
                if(!isset($param['picParam'][$i])) $param['picParam'][$i] = 0;
                $param['picParam'][$i] = $i > 0 ? '|' . $param['picParam'][$i] : $param['picParam'][$i];
                $config['picParam'] .= $param['picParam'][$i];
            }

            $config['picTxtParam'] = '';
            for ($i = 0; $i <= $param['picTxtCnt']; $i++) {
                if(!isset($param['picTxtParam'][$i])) $param['picTxtParam'][$i] = 0;
                $param['picTxtParam'][$i] = $i > 0 ? '|' . $param['picTxtParam'][$i] : $param['picTxtParam'][$i];
                $config['picTxtParam'] .= $param['picTxtParam'][$i];
            }

            if($config && is_array($config)){
                foreach ($config as $name => $value) {
                    $map = array('name' => $name);
                    $configModel->SaveConfig($map,$value);
                }
                if(!empty($logo)) deleteFile($logo, config('upload_img.path'));

                return json(['code' => 1, 'msg' =>'保存成功！']);
            }else{
                return json(['code' => 0, 'msg' =>'保存失败！']);
            }
        }
    }

    /**
     * 小程序导航列表
     */
    public function nav_index(){
        $navModel = new AppletNavModel();
        $list = $navModel->getAllNav();
        $cateModel = new ArticleCateModel();
        foreach($list as $key=>$val){
            $cate = $cateModel->getOneCate($val['cateId']);
            $val['cate_name'] = $cate['name'];
            $val['cateStyle_name'] =config('cate_style')[$cate['cateStyle']]['style'];
            $list[$key] = $val;
        }
        $this->assign('applet_nav',$list);
        return $this->fetch();
    }

    /**
     * [增加导航]
     */
    public function add_nav()
    {
        $navModel = new AppletNavModel();
        if(request()->isAjax()){
            $this->TestAuth();

            $param = input('post.');

            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file = request()->file('photo');
            if ($file) {
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
            }

            $flag = $navModel->insertNav($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $sortnum = Db::name('applet_nav')->max('sortnum') + 10;
        $cateModel = new ArticleCateModel();
        $map['parent_id'] = 0;
        $cate_list = $cateModel->getCateList($map);
        $this->assign('cate_list',$cate_list);
        $this->assign('sortnum',$sortnum);
        return $this->fetch();
    }

    /**
     * [编辑导航]
     */
    public function edit_nav()
    {
        $navModel = new AppletNavModel();
        if(request()->isAjax()){
            $this->TestAuth();

            $param = input('post.');

            $param['status'] = isset($param['status'])? $param['status']: 0;

            $file  = request()->file('photo');
            if($file || (isset($param['delPhoto']) && $param['delPhoto'] == 1)){
                $upload = new Upload();
                $param['photo'] = $upload->uploadImage($file);
                $photo = Db::name('applet_nav')->where('id',$param['id'])->value('photo');
            }else{
                unset($param['photo']);
            }

            $flag = $navModel->editNav($param);
            if($flag['code'] > 0 && !empty($photo)){
                deleteFile($photo, config('upload_img.path'));
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $nav = $navModel->getOneNav($id);
        $cateModel = new ArticleCateModel();
        $map['parent_id'] = 0;
        $cate_list = $cateModel->getCateList($map);
        $this->assign('cate_list',$cate_list);
        $this->assign('nav',$nav);
        return $this->fetch();
    }

    /**
     * [删除导航]
     */
    public function del_nav()
    {
        $this->TestAuth();
        $id = input('param.id');
        $navModel = new AppletNavModel();

        $photo = Db::name('applet_nav')->where('id',$id)->value('photo');
        $flag = $navModel->delNav($id);
        if($flag['code']>0){
            if(!empty($photo)) deleteFile($photo, config('upload_img.path'));
        }
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
}