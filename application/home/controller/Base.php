<?php

namespace app\home\controller;
use app\home\model\BaseModel;
use think\Controller;
use think\Db;

class Base extends Controller
{
    public function _initialize()
    {
        $model = new BaseModel();
        $config = $model->getWebConfig();
        $this->config = $config;
        $map['status'] = 1;
        $map['isNav'] = 1;
        $map['parent_id'] = 0;
        $navCate = $model->getNavCate($map);
        foreach($navCate as $key => $val){
            $val['url'] = getCateUrl($val['id'], $val['website'], $val['catedir']);
            if($config['web_subnav'] == 1){
                $map['parent_id'] = $val['id'];
                $val['sub'] = $model->getNavCate($map);
                if(count($val['sub'])>0){
                    foreach($val['sub'] as $k => $v){
                        $v['url'] = getCateUrl($v['id'], $v['website'], $v['catedir']);
                        $val['sub'][$k] = $v;
                    }
                }
            }
            $navCate[$key] = $val;
        }
        $nav_width = substr(sprintf('%.3f', 1200/(count($navCate)+1)),0,-1);
        $friend_link_show = Db::name('other_cate')->where('id=2')->value('status');
        $friend_link = $model->getOtherList(['otherId'=>2,'status'=>1]);
        $this->assign('friend_link',$friend_link);
        $this->assign('friend_link_show',$friend_link_show);
        $this->assign('nav_width',$nav_width);
        $this->assign('nav_cate',$navCate);
        $this->assign('config',$config);

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
            $data['client'] = 1;
            $data['ip']	 =	get_client_ip();
            $data['create_time']  =	time();
            $data['state'] = 0;
            Db::name('counter')->insert($data);
        }

        //网站会员
        if($config['web_site_member'] == 1){
            $member_login = $this->isLogin();
            if($member_login){
                $isLogin = true;
                $this->assign('member',$member_login);
            }else{
                $isLogin = false;
            }
            $this->assign('isLogin',$isLogin);
        }

        //在线客服
        $online_config = $model->getOnlineConfig();
        $this->assign('online_config',$online_config);
        if($online_config['status'] == 1){
            $this->assign('online_list',$model->getOnlineList());
        }
        $this->assign('wap_site_state',1);
        //是否开启手机站
      	$mobile_domain = config('mobile_domain');
        if($mobile_domain && is_array($mobile_domain)){
             $wap_domain =  'http://'.config('mobile_domain')[0];
        }else{
          	 $wap_domain = "/mobile";
        }
        redirectMobileUrl($wap_domain);
        $this->assign('mobile_domain',$wap_domain);
        $wap_site_qrcode = Db::name('wap_config')->where(['name'=>'wap_site_qrcode'])->value('value');
        $this->assign('wap_site_qrcode',$wap_site_qrcode);
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

