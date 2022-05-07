<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/member/login.html";i:1532138656;s:76:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/public/head.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/public/onlineqq.html";i:1532138656;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <title><?php echo $web_site_title; ?></title>
    <meta name="keywords" content="<?php echo $web_site_keyword; ?>">
    <meta name="description" content="<?php echo $web_site_description; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=7"  />
    <?php if($config['web_site_ico'] != ''): ?>
    <link rel="shortcut icon" type="image/x-icon" href="__UPLOAD_PATH__/<?php echo $config['web_site_ico']; ?>"/>
    <?php endif; ?>
    <link href="__CSS__/style.css" rel="stylesheet" type="text/css" />
    <link href="__CSS__/color<?php echo $config['web_site_style']; ?>.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
    <script src="__JS__/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="__JS__/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="__JS__/layer/layer.js" type="text/javascript"></script>
    <script src="__JS__/base.js?rightButton=<?php echo $config['web_rightbutton']; ?>" type="text/javascript"></script>
    <?php echo $config['web_head_javascript']; ?>
</head>
<body class="extra-body">
<div class="form-header">会员登录</div>
<!--头部-->
<script src="__JS__/jquery.form.js"></script>
<!--主要内容-->
<div class="m-regForm">
    <div class="regBox" style="padding-bottom:40px;">
        <p class="back-home"><a href="<?php echo url('home/index/index'); ?>"><i class="iconfont icon-icon-home2"></i> 返回首页</a></p>
        <form action="<?php echo url('home/member/login'); ?>" method="post" id="login">
            <div class="content">
                <div class="u-input noMg">
                    <label>会员帐号</label>
                    <div class="inputWrapper">
                        <input type="text" class="text" name="username" placeholder="请输入您的会员账号"  maxlength="34">
                    </div>
                </div>
                <div class="u-input">
                    <label>密码</label>
                    <div class="inputWrapper">
                        <input type="password" class="text" name="password" placeholder="请输入您的登录密码" autocomplete="new-password" onpaste="return false;" maxlength="20">
                    </div>
                </div>
                <div class="u-input verifyCode">
                    <label>验证码</label>
                    <div class="inputWrapper">
                        <input class="text" type="text" name="code" placeholder="请输入验证码" autocomplete="off" maxlength="4">
                        <img src="<?php echo url('form/code_img'); ?>" class="codeImg" onclick="this.src='<?php echo url('form/code_img'); ?>?time='+Math.random();" alt="看不清,请单击"/>
                    </div>
                </div>
            </div>
            <div class="bottomBar" style="padding-top:0;">
                <button class="u-bigBtn" type="submit">登录</button>
            </div>
        </form>
        <div class="toLogin">
            还没帐号？<a href="<?php echo url('home/member/register'); ?>" >直接注册</a>
        </div>
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
            $('.u-bigBtn').attr("disabled", "disabled");
        }
        function complete(data){
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:2000,shade: 0.5}, function(index){
                    layer.close(index);
                    window.location.href="<?php echo url('home/index/index'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:2000,shade: 0.5}, function(index){
                    $('.u-bigBtn').removeAttr("disabled");
                    layer.close(index);
                });
                return false;
            }
        }
    });
</script>
<div class="m-wave">
    <ul class="wave-item item1">
        <li class="wave-bg wave-bg1"></li>
        <li class="wave-bg wave-bg1"></li>
    </ul>
    <ul class="wave-item item2">
        <li class="wave-bg wave-bg2"></li>
        <li class="wave-bg wave-bg2"></li>
    </ul>
    <ul class="wave-item item3">
        <li class="wave-bg wave-bg3"></li>
        <li class="wave-bg wave-bg3"></li>
    </ul>
</div><script type="text/javascript">
	$(function(){    	mWave.init();    });	/* 波浪动画模块 */	var mWave = (function(){		var $dom = $('.m-wave');		function init(){			start($dom.find('.wave-item.item1'), 150000);			start($dom.find('.wave-item.item2'), 140000);			start($dom.find('.wave-item.item3'), 30000);		}		function start($target, speed){			var halfWidth = parseInt($target.width() / 2);			$target.animate({'marginLeft': - halfWidth + 'px'}, speed, 'linear', roll);			function roll(){				$target.css('marginLeft', 0);				$target.animate({'marginLeft': - halfWidth + 'px'}, speed, 'linear', roll);			}		}		return {			init: init		}	})();	/* 波浪动画模块 end */
</script>
<div class="extra-footer">
    <div class="box-wrap">
        <?php echo $config['web_site_copy']; ?>
    </div>
</div>
<!--在线客服-->
<?php if($online_config['status'] == 1): ?>
<script src="__JS__/onlineqq.js" type="text/javascript"></script>
<div class="kefu_online">
    <?php if($online_list): ?>
    <ul class="kefu_ul">
        <?php if(is_array($online_list) || $online_list instanceof \think\Collection || $online_list instanceof \think\Paginator): $i = 0; $__LIST__ = $online_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$online): $mod = ($i % 2 );++$i;?>
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $online['number']; ?>&site=qq&menu=yes" target="_blank"><img src="/static/admin/images/qqicon/<?php echo $online['show_icon']; ?>.gif"/><span><?php echo $online['name']; ?></span></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <?php endif; if($online_config['qrcode'] != ''): ?><div class="code"><img src="__UPLOAD_PATH__/<?php echo $online_config['qrcode']; ?>"></div>
    <?php endif; if($online_config['content'] != ''): ?><div class="content"><?php echo $online_config['content']; ?></div><?php endif; ?>
</div>
<script type="text/javascript">
    $(function(){
        $('.kefu_online').OnlineQQ({
            'title':'<?php echo $online_config['title']; ?>',
            'width':<?php echo $online_config['width']; ?>,
            'position':'<?php echo $online_config['position']; ?>',
            'topSpace':<?php echo $online_config['topSpace']; ?>,
            'isOpen':<?php echo $online_config['is_open']; ?>,
            'isClosed':<?php echo $online_config['show_btn']; ?>,
            'color':'<?php echo $online_config['color']; ?>',
            'bgcolor':'<?php echo $online_config['bgcolor']; ?>',
            'titcolor':'<?php echo $online_config['titcolor']; ?>',
            'titbgcolor':'<?php echo $online_config['titbgcolor']; ?>'
        });
    })
</script>
<?php endif; ?>
</body>
</html>
