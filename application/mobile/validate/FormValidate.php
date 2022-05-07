<?php

namespace app\mobile\validate;
use think\Validate;

class FormValidate extends Validate
{
    protected $rule = [
        'name|姓名'  => ['require'],
        'phone|手机号'  => ['require', 'regex'=>'/^0?(13|14|15|17|18)[0-9]{9}$/'],
        'province|所在地区'  => ['require'],
        'code|验证码'  => ['require'],
    ];

    protected $message  =   [
        'phone.regex' => '请输入正确的手机号',
    ];

    protected $scene = [
        'message' =>  ['name','phone','code'],
        'job' =>  ['name','phone','code'],
        'join' =>  ['name','phone','province','code'],
    ];
}