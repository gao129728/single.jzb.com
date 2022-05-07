<?php

namespace app\mobile\model;
use think\Model;
use think\Db;

class IndexModel extends Model
{
    /**
     * [ 获取模块列表]
     */
    public function getModuleList()
    {
        return Db::name('wap_module')->where('status=1')->order('sortnum asc')->select();
    }


    /**
     * [获取信息列表]
     */
    public function getArticleList($map, $limits=null, $type=0)
    {
        $table = config('database.prefix').'article_cate';
        if($type == 1){
            $result = Db::name('article')->alias('a')->field('a.*,b.catedir')->join($table.' b', 'a.cate_id = b.id', 'LEFT')->where($map)->where('a.status',1)->order('a.isTop desc, a.sortnum desc, a.id desc')->find();
            $result['url'] = wapCateUrl($result['cate_id'],$result['website'],$result['catedir']);
        }else{
            $result = Db::name('article')->alias('a')->field('a.*,b.catedir')->join($table.' b', 'a.cate_id = b.id', 'LEFT')->where($map)->where('a.status',1)->limit($limits)->order('a.isTop desc, a.sortnum desc, a.id desc')->select();
            if($result){
                foreach($result as $key => $val){
                    $result[$key]['url'] = wapDetailUrl($val['id'],$val['website'],$val['catedir']);
                }
            }
        }
        return $result;
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