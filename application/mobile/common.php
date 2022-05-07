<?php
use think\Db;
/**
 * 分类地址
 */
function wapCateUrl($id, $website,$cate_dir = null){
    if(!empty($website)){
        $url = $website;
    }else if(!empty($cate_dir)){
        $mobile_pre = '/mobile';
        $url = $mobile_pre.'/'.trim($cate_dir).'.html';
    }else{
        $url = url('mobile/category/index',['id'=>$id]);
    }
    return $url;
}

/**
 * 信息地址
 */
function wapDetailUrl($id, $website,$cate_dir = null){
    if(!empty($website)){
        $url = $website;
    }else if(!empty($cate_dir)) {
        $mobile_pre = '/mobile';
        $url = $mobile_pre.'/' . trim($cate_dir) .'/'.$id.'.html';
    }else{
        $url = url('mobile/category/detail',['id'=>$id]);
    }
    return $url;
}






