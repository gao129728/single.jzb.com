<?php

namespace app\admin\controller;
use think\Db;

class Connector extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $action = strtolower(request()->action());
        $auth_action =array('seo','sitemap');
        if(in_array($action,$auth_action)){
            $this->CheckAuth();
        }
    }

    public function seo(){
        return $this->fetch();
    }

    public function sitemap()
    {
        return $this->fetch();
    }

    public function after_sale()
    {
        return $this->fetch();
    }

}