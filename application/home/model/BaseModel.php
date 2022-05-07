<?php

namespace app\home\model;
use think\Model;
use think\Db;

class BaseModel extends Model
{
    /*
    * [getWebConfig 获取网站配置]
    */
    public function getWebConfig()
    {
        $list = Db::name('web_config')->select();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        return $config;
    }

    /*
    * [getWebConfig 获取网站配置]
    */
    public function getInsideConfig()
    {
        $list = Db::name('web_inside_config')->select();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        return $config;
    }

    /*
     * [获取会员]
     */
    public function getMemberInfo($id)
    {
        $table = config('database.prefix').'member_group';
        return Db::name('member')->alias('a')->field('a.*,b.group_name,b.status as group_status')->join($table.' b', 'a.group_id = b.id', 'LEFT')->where('a.id', $id)->find();
    }

    /*
    * [获取在线客服配置]
    */
    public function getOnlineConfig()
    {
        $list = Db::name('online_config')->select();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }
        return $config;
    }

    /*
     * [获取客服列表]
     */
    public function getOnlineList()
    {
        return Db::name('online_list')->where('state',1)->order('sortnum asc')->select();
    }

    /*
     * [获取栏目分类]
     */
    public function getNavCate($map, $limit=null)
    {
        return Db::name('article_cate')->where($map)->limit($limit)->order('orderby asc, id asc')->select();
    }


    /*
     * [获取附加信息]
     */
    public function getOtherList($map)
    {
        return Db::name('other_list')->where($map)->order('sortnum asc, id asc')->select();
    }

    /*
     * [获取广告列表]
     */
    public function getAdverList($map)
    {
        $date = strtotime(date('Y-m-d'));
        return Db::name('ad')->where($map)
            ->where(function($query) use($date){
                $query->where("start_date = 0 and end_date =0")->whereOr("start_date > 0 and end_date >0 and start_date <= ".$date." and end_date>=".$date);
            })
            ->order('orderby asc, id asc')
            ->select();
    }
}