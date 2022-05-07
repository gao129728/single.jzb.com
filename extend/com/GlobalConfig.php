<?php
namespace com;

use think\Db;

class GlobalConfig{

    private $domain;
    private static $instance;

    private function __construct() {
        //$this->domain = str_replace(':'.$_SERVER["SERVER_PORT"],'',$_SERVER['HTTP_HOST']); // 获取当前域名,不包含端口
      $this->domain = $_SERVER['HTTP_HOST']; 
    }

    private function __clone(){}

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance =new self();
        }
        return self::$instance;
    }

    public function checkMobileDomain(){
      	$mobile_domain = config('mobile_domain');
      	if($mobile_domain && is_array($mobile_domain) && in_array($this->domain, $mobile_domain)){
          	$isMobileDomain = true;
        }else{
          	$isMobileDomain = false;
        }
        return $isMobileDomain;
    }
}

