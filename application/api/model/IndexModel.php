<?php

namespace app\api\model;
use think\Model;
use think\Db;

class IndexModel extends Model
{
    /**
     * [ 获取模块列表]
     */
    public function getModuleList()
    {
        return Db::name('applet_module')->where('status=1')->order('sortnum asc')->select();
    }


    /**
     * [获取信息列表]
     */
    public function getArticleList($map, $limits=null)
    {
        return Db::name('article')->field('id,cate_id,title,photo,content,create_time')->where($map)->where('status',1)->limit($limits)->order('isTop desc, sortnum desc, id desc')->select();

    }

    /**
     * [获取单条信息]
     */
    public function getOneArticle($map)
    {
        return Db::name('article')->field('id,cate_id,title,photo,content,create_time')->where($map)->where('status',1)->order('isTop desc, sortnum desc, id desc')->find();
    }

    /**
     * [根据分类id获取分类信息]
     */
    public function getOneCate($id)
    {
        return Db::name('article_cate')->where('id',$id)->order('orderby asc, id asc')->find();
    }

    /**
     * [获取分类ID]
     */
    public function getCateId($map)
    {
        return Db::name('article_cate')->where($map)->column('id');
    }

}