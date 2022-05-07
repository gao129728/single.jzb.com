<?php

namespace app\mobile\controller;
use app\mobile\model\BaseModel;
use think\Controller;
use think\Db;

class Base extends Controller
{
    public function _initialize()
    {
    	$model = new BaseModel();
        $web_config = $model->getWebConfig();
        $config = $model->getWapConfig();
        $config['service_line'] = $web_config['web_service_line'];
        if(empty($config['wap_site_title'])) $config['wap_site_title'] = $web_config['web_site_title'];
        if(empty($config['wap_site_description'])) $config['wap_site_description'] = $web_config['web_site_description'];
        if(empty($config['wap_site_keyword'])) $config['wap_site_keyword'] = $web_config['wap_site_keyword'];
        if(empty($config['wap_site_copy'])) $config['wap_site_copy'] = $web_config['web_site_copy'];
        $this->web_config = $web_config;
        $this->config = $config;
        $map['a.status'] = 1;
        $navCate = $model->getWapNav($map);
        foreach($navCate as $key => $val){
            $val['url'] = wapCateUrl($val['cateId'], $val['website'], $val['catedir']);
            $navCate[$key] = $val;
        }
        $this->assign('nav_cate',$navCate);
        $this->assign('config',$config);
        $this->assign('web_site_style',$web_config['web_site_style']);

        //访问统计
        $web_user_counter = cookieCrypt('web_user_counter');
        if(empty($web_user_counter))
        {
            cookieCrypt('web_user_counter', 'value', 3600);
            if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!= '')
            {
                $data['source'] = $_SERVER['HTTP_REFERER']; //有来源
            }else{
                $data['source'] = "浏览器输入网址访问"; //直接输入网址访问
            }
            $data['id'] = Db::name('counter')->max('id') + 1;
            $data['client'] = 2;
            $data['ip']	 =	get_client_ip();
            $data['create_time']  =	time();
            $data['state'] = 0;
            Db::name('counter')->insert($data);
        }
        $this->assign('web_site_member',$web_config['web_site_member']);
        //网站会员
        if($web_config['web_site_member'] == 1){
            $member_login = $this->isLogin();
            if($member_login){
                $isLogin = true;
                $this->assign('member',$member_login);
            }else{
                $isLogin = false;
            }
            $this->assign('isLogin',$isLogin);
        }
    }

    /*
   * [获取banner配置]
   */
    public function getBannerConfig($id)
    {
        return Db::name('banner_cate')->where('id',$id)->find();
    }

    /*
   * [获取banner图片]
   */
    public function getBannerImage($map, $switch)
    {
        if($switch == 1){
            return Db::name('banner_image')->where($map)->order('sortnum asc')->select();
        }else{
            return Db::name('banner_image')->where($map)->order('sortnum asc')->find();
        }
    }

    /*
     * [判断用户是否登录]
     */
    public function isLogin()
    {
        if(cookieCrypt('web_userId')){
            $userId    = (int)cookieCrypt('web_userId');
            $baseModel = new BaseModel();
            $member  = $baseModel->getMemberInfo($userId);
            if($member){
                if($member['status'] == 0|| $member['group_status'] == 0){
                    cookie('web_userId', null);
                    return false;
                }
                return $member;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
}

