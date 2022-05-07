<?php

namespace app\admin\controller;
use app\admin\model\ConfigModel;
use think\Db;

class Config extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('index');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

    /**
     * 获取配置参数
     */
    public function index() {
        $configModel = new ConfigModel();
        $list = $configModel->getAllConfig();
        $this->assign('config',$list);
        return $this->fetch();
    }

    /**
     * 批量保存配置
     *
     */
    public function save(){
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $config = $param['config'];
            $configModel = new ConfigModel();

            $config['web_site_close'] = isset($config['web_site_close'])? $config['web_site_close']: 0;

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