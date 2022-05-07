<?php

namespace app\mobile\validate;
use think\Validate;

class MemberValidate extends Validate
{
    protected $rule = [
        'account|会员账号'  => ['require', 'min'=>2, 'unique'=>'member'],
        'username|会员账号'  => ['require'],
        'mobile|手机号码'  => ['require', 'regex'=>'/^0?(13|14|15|17|18)[0-9]{9}$/','unique'=>'member'],
        'password|密码'  => ['require', 'min'=>6],
        'repassword|确认密码' =>['require','confirm'=>'password'],
        'code|验证码'  => ['require'],
    ];

    protected $message  =   [
        'account.min'     => '会员账号不能少于2位',
        'account.unique'     => '会员账号已存在',
        'mobile.regex' => '请输入正确的手机号码',
        'mobile.unique' => '手机号码已存在',
        'password.min'     => '密码不能少于6位',
        'repassword.confirm'     => '两次输入密码不一致'
    ];

    protected $scene = [
        'login' =>  ['username','password'],
        'register' =>  ['account','mobile','password','repassword','code'],
    ];
}