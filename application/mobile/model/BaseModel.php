<?php

namespace app\mobile\model;
use think\Model;
use think\Db;

class BaseModel extends Model
{
    /*
    * [getWebConfig 获取PC网站配置]
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
    * [获取手机网站配置]
    */
    public function getWapConfig()
    {
        $list = Db::name('wap_config')->select();
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
     * [获取导航栏目]
     */
    public function getWapNav($map)
    {
        $table = config('database.prefix').'article_cate';
        return Db::name('wap_nav')->alias('a')->field('a.*,b.catedir')->join($table.' b', 'a.cateId = b.id', 'LEFT')->where($map)->order('a.sortnum asc, a.id asc')->select();
    }

}