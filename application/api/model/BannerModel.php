<?php

namespace app\api\model;
use think\Model;
use think\Db;

class BannerModel extends Model
{
    protected $name = 'banner_cate';

    /**
     * [getOneCate 根据分类id获取一条信息]
     */
    public function getOneCate($id)
    {
        return $this->where('id', $id)->find();
    }

    //获取banner图片
    public function getBannerImage($map, $switch)
    {
        if($switch == 1){
            return Db::name('banner_image')->where($map)->order('sortnum asc')->select();
        }else{
            return Db::name('banner_image')->where($map)->order('sortnum asc')->find();
        }
    }

}