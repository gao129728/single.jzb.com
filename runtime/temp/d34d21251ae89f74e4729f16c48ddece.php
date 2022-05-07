<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/member/login.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/head.html";i:1532138656;}*/ ?>
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
<div class="loginBox">
    <h1 class="logo"><a href="<?php echo url('mobile/index/index'); ?>" title="<?php echo $config['wap_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['wap_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a></h1>
    <div class="login">
        <form action="<?php echo url('mobile/member/login'); ?>" method="post" id="login">
            <ul>
                <li>
                    <input type="text" name="username" class="text" placeholder="请输入用户名或邮箱"/>
                </li>
                <li>
                    <input type="password" name="password" class="text" placeholder="请输入您的密码"/>
                </li>
            </ul>
            <input type="submit" class="u-subBtn" value="登录"/>
        </form>
        <p class="toLogin clearfix"><span>没有账号？<a href="<?php echo url('mobile/member/register'); ?>">去注册 </a></span></p>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#login').ajaxForm({
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
                setTimeout(function(){
                    window.location.href="<?php echo url('mobile/index/index'); ?>";
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
