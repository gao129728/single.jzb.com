<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/member/register.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/head.html";i:1532138656;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="webkit" name="renderer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta content="portrait" name="screen-orientation"> <!-- uc强制竖屏 -->
    <meta content="portrait" name="x5-orientation"><!-- QQ强制竖屏 -->
    <title><?php echo $config['wap_site_title']; ?></title>
    <meta name="keywords" content="<?php echo $config['wap_site_keyword']; ?>">
    <meta name="description" content="<?php echo $config['wap_site_description']; ?>">
    <link href="__CSS__/style.css" type="text/css" rel="stylesheet">
    <link href="__CSS__/color<?php echo $web_site_style; ?>.css" type="text/css" rel="stylesheet">
    <link href="/static/mobile/iconfont/iconfont.css" rel="stylesheet" type="text/css" />	<script src="__JS__/rem.js" type="text/javascript" ></script>
    <script src="__JS__/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="__JS__/TouchSlide.1.1.js" type="text/javascript" ></script>
    <script src="__JS__/layer.m.js"></script>
    <script src="__JS__/base.js" type="text/javascript" ></script>
    <?php echo $config['wap_head_javascript']; ?>
</head>
<body>
<!--头部-->
<script src="__JS__/jquery.form.js"></script>
<!--主要内容-->
<div class="loginBox registerBox">
    <h1 class="logo"><a href="<?php echo url('mobile/index/index'); ?>" title="<?php echo $config['wap_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['wap_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a></h1>
    <div class="login">
        <form action="<?php echo url('mobile/member/register'); ?>" method="post" id="register">
            <ul>
                <li>
                    <input type="text" name="account" class="text" placeholder="请输入会员账号"/>
                </li>
                <li>
                    <input type="text" name="mobile" class="text" placeholder="请输入您的手机号码"/>
                </li>
                <li>
                    <input type="password" class="text" name="password" placeholder="请设置登录密码">
                </li>
                <li>
                    <input type="password" class="text" name="repassword" placeholder="请确认登录密码">
                </li>
                <li class="yzm clearfix">
                    <input class="text" type="text" name="code" placeholder="请输入验证码" autocomplete="off" maxlength="4">
                    <img src="<?php echo url('form/code_img'); ?>" class="codeImg" onclick="this.src='<?php echo url('form/code_img'); ?>?time='+Math.random();" alt="看不清,请单击"/>
                </li>
            </ul>
            <input type="submit" class="u-subBtn" value="注册"/>
        </form>
        <p class="toLogin clearfix"><span>已有账号？<a href="<?php echo url('mobile/member/login'); ?>">直接登录 </a></span></p>
    </div>
</div>
<script type="text/javascript">
    $('#register')[0].reset();
    $(function(){
        $('#register').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });
        function checkForm() {
            $('.u-subBtn').attr("disabled", "disabled");
        }
        function complete(data){
            if(data.code == 1){
                layer.open({content:data.msg, time:2});
                $('#register')[0].reset();
                setTimeout(function(){
                    window.location.href="<?php echo url('mobile/member/login'); ?>";
                },2000);
            }else{
                layer.open({content:data.msg, time:2});
                $('.u-subBtn').removeAttr("disabled");
                return false;
            }
        }
    });
</script>
</body>
</html>
