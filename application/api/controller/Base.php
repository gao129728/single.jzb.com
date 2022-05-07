<?php

namespace app\api\controller;
use think\Controller;
use think\Db;

class Base extends Controller
{
    public function _initialize()
    {
        $web_domain = request()->domain();
        $upload_path = '/uploads/images/';

        $this->imgPath =  $web_domain.$upload_path;
    }

    /*
    * [getConfig 获取小程序配置]
    */
    public function getConfig()
    {
        $list = Db::name('applet_config')->select();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        return $config;
    }
}