<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$
use think\Route;
use com\GlobalConfig;

$isMobileDomain = GlobalConfig::getInstance()->checkMobileDomain();

Route::rule([
    'index$'=>'home/index/index',
    'login$'=>'home/member/login',
    'register$'=>'home/member/register',
    'sitemap$'=>'home/sitemap/sitemap',
    'search$'=>'home/search/index',
    'category/:id$'=>'home/category/index',
    'category/detail/:id$'=>'home/category/detail',
]);

$allRoutes = [];
$route_path = ROOT_PATH . "data/route/route.php";
if (file_exists($route_path)) {
    $allRoutes = include $route_path;
    Route::rule($allRoutes['home']);
}

$mobile_pre = $isMobileDomain? '':'mobile/';
$default_mobile_route = [
    $mobile_pre.'index$'=>'mobile/index/index',
    $mobile_pre.'login$'=>'mobile/member/login',
    $mobile_pre.'register$'=>'mobile/member/register',
    $mobile_pre.'category/:id$'=>'mobile/category/index',
    $mobile_pre.'category/detail/:id$'=>'mobile/category/detail',
    $mobile_pre.'message/index$'=>'mobile/message/index',
];
if($isMobileDomain){
    Route::bind('mobile');
}
if($allRoutes){
    if($isMobileDomain){
        $mobile_route =  $allRoutes['mobile'];
    }else{
        $mobile_route = [];
        foreach($allRoutes['mobile'] as $key => $val){
            $mobile_route[$mobile_pre.$key] = $val;
        }
    }
    $default_mobile_route = array_merge($default_mobile_route, $mobile_route);
}
return $default_mobile_route;