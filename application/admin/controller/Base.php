<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\ConfigModel;
use app\admin\model\Node;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {

        if((!session('uid') && session('uid') != 0) ||!session('username')){
            $this->redirect(('login/index'),302);
        }
        
        $node = new Node();
        $this->assign([
            'uid' => session('uid'),
            'username' => session('username'),
            'portrait' => session('portrait'),
            'rolename' => session('rolename'),
            'login_time' => session('login_time'),
            'menu' => $node->getMenu(session('rule'))
        ]);

        $configModel = new ConfigModel();
        $config = $configModel->getAllConfig();
        config($config);

        if(config('web_site_close') == 0 && session('uid') !=0 && session('uid') !=1 ){
            $this->error('站点已经关闭，请稍后访问~');
        }

        if(config('admin_allow_ip') && session('uid') !=0 && session('uid') !=1 ){
            if(in_array(request()->ip(),explode('#',config('admin_allow_ip')))){
                $this->error('403:禁止访问');
            }
        }
    }

    public function CheckAuth(){
        $auth  =  new Auth();
        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;

        //权限检测
        if(session('uid') != 0){
            if(session('uid') !=1 && !$auth->check($url,session('uid'))){
                $this->error('抱歉，您没有操作权限');
            }
        }
    }

    public function TestAuth(){
    }
}