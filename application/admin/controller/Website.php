<?php
namespace app\admin\controller;
use app\admin\model\WebsiteModel;
use app\admin\model\InsideModel;
use app\admin\model\MemberGroupModel;
use app\admin\controller\Upload;
use think\Db;

class Website extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('config', 'inside');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

    /**
     * 获取网站配置参数
     */
    public function config() {
        $configModel = new WebsiteModel();
        $list = $configModel->getAllConfig();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        $this->assign('config',$config);
        $groupModel = new MemberGroupModel();
        $this->assign('member_group',$groupModel->getGroup());
        return $this->fetch();
    }

    /**
     * 保存网站配置
     */
    public function save(){
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $config = $param['config'];
            $configModel = new WebsiteModel();
            $upload = new Upload();

            $file  = request()->file('web_site_logo');
            if($file || (isset($param['delLogo']) && $param['delLogo'] == 1)){
                $config['web_site_logo'] = $upload->uploadImage($file);
                $logo = Db::name('config')->where('name','web_site_logo')->value('value');
            }

            $file_code  = request()->file('web_site_qrcode');
            if($file_code || (isset($param['delQrcode']) && $param['delQrcode'] == 1)){
                $config['web_site_qrcode'] = $upload->uploadImage($file_code);
                $qrcode = Db::name('config')->where('name','web_site_qrcode')->value('value');
            }

            $file_ico  = request()->file('web_site_ico');
            if($file_ico || (isset($param['delIco']) && $param['delIco'] == 1)){
                $config['web_site_ico'] = $upload->uploadImage($file_ico);
                $ico = Db::name('config')->where('name','web_site_ico')->value('value');
            }

            $config['web_rightbutton'] = isset($config['web_rightbutton'])? $config['web_rightbutton']: 0;
            $config['web_site_search'] = isset($config['web_site_search'])? $config['web_site_search']: 0;
            $config['web_subnav'] = isset($config['web_subnav'])? $config['web_subnav']: 0;
            $config['web_site_member'] = isset($config['web_site_member'])? $config['web_site_member']: 0;
            $config['web_member_reg'] = isset($config['web_member_reg'])? $config['web_member_reg']: 0;
            $config['web_wap'] = isset($config['web_wap'])? $config['web_wap']: 0;
            
            if($config && is_array($config)){
                foreach ($config as $name => $value) {
                    $map = array('name' => $name);
                    $configModel->SaveConfig($map,$value);
                }

                if(!empty($logo)) deleteFile($logo, config('upload_img.path'));
                if(!empty($qrcode)) deleteFile($qrcode, config('upload_img.path'));
                if(!empty($ico)) deleteFile($ico, config('upload_img.path'));

                return json(['code' => 1, 'msg' =>'保存成功！']);
            }else{
                return json(['code' => 0, 'msg' =>'保存失败！']);
            }
        }
    }

    /**
     * 获取内页配置
     */
    public function inside() {
        $configModel = new InsideModel();
        $list = $configModel->getAllConfig();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        $this->assign('config',$config);
        $this->assign('nav_menu','inside');
        return $this->fetch();
    }

    /**
     * 保存配置
     */
    public function inside_save(){
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $config = $param['config'];
            $configModel = new InsideModel();

            $config['cate_sidebar_style'] = isset($config['cate_sidebar_style'])? $config['cate_sidebar_style']: 0;
            $config['detail_sidebar_style'] = isset($config['detail_sidebar_style'])? $config['detail_sidebar_style']: 0;

            if($config && is_array($config)){
                foreach ($config as $name => $value) {
                    $map = array('name' => $name);
                    $configModel->SaveConfig($map,$value);
                }

                return json(['code' => 1, 'msg' =>'保存成功！']);
            }else{
                return json(['code' => 0, 'msg' =>'保存失败！']);
            }
        }
    }

}