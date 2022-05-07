<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/message/index.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/head.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/header.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/footer.html";i:1532138656;s:77:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/nav.html";i:1532138656;}*/ ?>
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
<div class="homebody">
	<?php if($config['wap_nav_style'] == 1): ?>
<header class="header clearfix">
    <h1 class="logo fl"><a href="<?php echo url('mobile/index/index'); ?>" title="<?php echo $config['wap_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['wap_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a></h1>
    <div class="fr" style="margin-right:0.3rem;">
	    <div class="hshare fl">
	        <a href="tel:<?php echo $config['service_line']; ?>"> <i class="iconfont icon-dianhua"></i> </a>
	        <a href="sms:<?php echo $config['wap_service_qq']; ?>"> <i class="iconfont icon-mess"></i> </a>
	        <?php if($web_site_member == 1): if($isLogin): ?>
	            <a href="javascript:;" onclick="loginModel()"><i class="iconfont icon-huiyuan21"></i></a>
	            <script type="text/javascript">
	                function loginModel(){
	                    layer.open({
	                        content: '您已经登录，用户名：<?php echo $member['account']; ?>'
	                        ,btn: ['确定','退出登录']
	                        ,yes: function(index){
	                            layer.close(index);
	                        }
	                        ,no:function(index){
	                            window.location = "<?php echo url('mobile/member/loginOut'); ?>";
	                            layer.close(index);
	                        }
	                    });
	                }
	            </script>
	            <?php else: ?>
	            <a href="<?php echo url('mobile/member/login'); ?>"><i class="iconfont icon-huiyuan21"></i></a>
	            <?php endif; endif; ?>
	    </div>
	    <div class="menu fl">
	        <i class="iconfont icon-mulu"></i>
	    </div>
    </div>
</header>
<?php elseif($config['wap_nav_style'] == 2): ?>
<header class="header2">
	<h1 class="logo"><a href="<?php echo url('mobile/index/index'); ?>" title="<?php echo $config['wap_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['wap_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a></h1>
	<nav class="menuNav2" id="wrapperNav">
		<div class="scroller">
		    <ul>
		        <li><a href="<?php echo url('mobile/index/index'); ?>" <?php if($navCur == 'index'): ?>class="on"<?php endif; ?>>首页</a></li>
		        <?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
		        <li><a href="<?php echo $nav['url']; ?>" <?php if($navCur == $nav['cateId']): ?>class="on"<?php endif; ?>><?php echo $nav['name']; ?></a></li>
		        <?php endforeach; endif; else: echo "" ;endif; ?>
		    </ul>
	    </div>
	</nav>
</header>
<script type="text/javascript">
    $(function(){
        var second_select = $('.menuNav2 li .on').parent().index();
        $('#wrapperNav').navbarscroll({
            defaultSelect:second_select
        });
    });
</script>
<?php endif; ?>

<!--banner-->
<?php if($inside_banner): ?>
<aside class="iBanner">
    <img src="__UPLOAD_PATH__/<?php echo $inside_banner; ?>">
</aside>
<?php elseif($banner_img): if($banner_config['switch'] == 1): ?>
    <aside class="HomeBan" id="banner">
        <div class="bd">
            <ul>
                <?php if(is_array($banner_img) || $banner_img instanceof \think\Collection || $banner_img instanceof \think\Paginator): $i = 0; $__LIST__ = $banner_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo !empty($vo['url'])?$vo['url']:'javascript:;'; ?>" <?php if($vo['url'] != ''): ?>target="_blank"<?php endif; ?>><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>"/></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if($banner_config['circle_btn'] == 1): ?>
        <div class="hd"><ul></ul></div>
        <?php endif; ?>
    </aside>
    <script type="text/javascript">
        TouchSlide({
            slideCell:"#banner",
            mainCell:".bd ul",
            <?php if($banner_config['circle_btn'] == 1): ?>
            titCell:".hd ul",
            autoPage:true,
            <?php endif; ?>
            effect:"leftLoop",
            autoPlay:<?php echo !empty($banner_config['auto'])?'true':'false'; ?>,
            delayTime:<?php echo $banner_config['effect_time']; ?>,
            interTime:<?php echo $banner_config['interval_time']; ?>,
            switchLoad:"_src" //切换加载，真实图片路径为"_src"
        });
    </script>
    <?php else: ?>
    <div class="iBanner">
        <a href="<?php echo !empty($banner_img['url'])?$banner_img['url']:'javascript:;'; ?>" <?php if($banner_img['url'] != ''): ?>target="_blank"<?php endif; ?>><img src="__UPLOAD_PATH__/<?php echo $banner_img['photo']; ?>"></a>
    </div>
    <?php endif; endif; ?>

	<!--主要内容-->
	<div class="sub_menu">
	    <script type="text/javascript" src="__JS__/flexible.js"></script>
	    <script type="text/javascript" src="__JS__/iscroll.js"></script>
	    <script type="text/javascript" src="__JS__/navbarscroll.js"></script>
	    <div class="sub_menu_1" id="wrapper01">
	        <div class="scroller">
	            <ul class="clearfix">
	                <li><a href="<?php echo url('mobile/message/index'); ?>" class="on"><?php echo $baseName; ?></a></li>
	            </ul>
	        </div>
	    </div>
	    <script type="text/javascript">
	        $(function(){
	            var second_select = $('.sub_menu_1 li .on').parent().index();
	            $('#wrapper01').navbarscroll({
	                defaultSelect:second_select
	            });
	        });
	    </script>
	</div>
	<div class="MainCon">
		<div class="box-wrap">
			<script src="__JS__/jquery.form.js"></script>
			<div class="form-area">
			    <form action="<?php echo url('mobile/form/message'); ?>" method="post" id="message">
			        <ul>
			            <li class="clearfix">
			                <span><em>*</em>姓名：</span>
			                <input name="name" type="text" maxlength="50" class="text"/>
			            </li>
			            <li class="clearfix">
			                <span><em>*</em>电话：</span>
			                <input name="phone" type="text" maxlength="50" class="text"/>
			            </li>
			            <li class="clearfix">
			                <span>邮箱：</span>
			                <input name="email" type="text" maxlength="50" class="text" />
			            </li>
			            <li class="clearfix">
			                <span>留言：</span>
			                <textarea name="content" class="textarea"></textarea>
			            </li>
			            <li class="clearfix yzm">
			                <span>验证码：</span>
			                <input name="code" type="text" maxlength="4" class="text" />
			                <img src="<?php echo url('form/code_img'); ?>" class="codeImg" onclick="this.src='<?php echo url('form/code_img'); ?>?time='+Math.random();" alt="看不清,请单击"/>
			            </li>
			            <li class="clearfix input-btn">
			                <input type="submit" value="提交" class="submitBtn" />
			                <input type="reset" value="重置" class="resetBtn" />
			            </li>
			        </ul>
			    </form>
			</div>
			<script type="text/javascript">
			    $('#message')[0].reset();
			    $(function(){
			        $('#message').ajaxForm({
			            success: complete,
			            dataType: 'json'
			        });
			        function complete(data){
			            if(data.code == 1){
			                layer.open({content: data.msg, btn:'确定', yes:function(index){
			                        layer.close(index);
			                        $('#message')[0].reset();
			                        location.reload();
			                    }
			                });
			            }else{
			                layer.open({content: data.msg, time: 2 });
			                return false;
			            }
			        }
			    });
			</script>
		</div>
	</div>
	<!--底部-->
	<div class="hotline clearfix">
    <div class="lef">
        <h3>免费咨询热线</h3>
        <p>专业客服为您解疑答惑</p>
    </div>
    <div class="rig">
        <a href="tel:<?php echo $config['service_line']; ?>"> <i class="iconfont icon-service-phone"></i> <?php echo $config['service_line']; ?></a>
    </div>
</div>
<footer class="footer footer1">
    <?php echo $config['wap_site_copy']; ?>
</footer>
<?php if($config['wap_nav_style'] == 1): ?>
<div class="fixBox">
    <ul class="clearfix">
        <li><a href="<?php echo url('mobile/index/index'); ?>"><i class="iconfont icon-weibiaoti1"></i></a></li>
        <li><a href="tel:<?php echo $config['service_line']; ?>"><i class="iconfont icon-dianhua1"></i></a></li>
        <li><a href="sms:<?php echo $config['wap_service_qq']; ?>"><i class="iconfont icon-mess"></i></a></li>
    </ul>
</div>
<?php elseif($config['wap_nav_style'] == 2): ?>
<!--fixnav-->
<div class="fixnav">
    <ul>
        <li <?php if($navCur == 'index'): ?>class="on"<?php endif; ?>><a href="<?php echo url('mobile/index/index'); ?>">首页</a></li>
        <?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
        <li <?php if($navCur == $nav['cateId']): ?>class="on"<?php endif; ?>><a href="<?php echo $nav['url']; ?>"><?php echo $nav['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div class="menuBtn">
    	<i class="iconfont icon-down"></i>
    </div>
</div>
<div class="fixBox1">
    <ul class="clearfix">
    	<li <?php if($navCur == 'index'): ?>class="on"<?php endif; ?>>
    		<a href="<?php echo url('mobile/index/index'); ?>">
    			<i class="iconfont icon-icohome"></i>
    			<p>首页</p>
    		</a>
    	</li>
    	<li>
    		<a href="tel:<?php echo $config['service_line']; ?>">
    			<i class="iconfont icon-dianhua2"></i>
    			<p>电话</p>
    		</a>
    	</li>
    	<li class="center">
    		<a href="javascript:;">
    			<i class="iconfont icon-plus"></i>
    		</a>
    	</li>
    	<li <?php if($navCur == 'message'): ?>class="on"<?php endif; ?>>
    		<a href="<?php echo url('mobile/message/index'); ?>">
    			<i class="iconfont icon-lyan"></i>
    			<p>留言</p>
    		</a>
    	</li>
    	<li>
    		<a href="sms:<?php echo $config['wap_service_qq']; ?>">
    			<i class="iconfont icon-mess"></i>
    			<p>短信</p>
    		</a>
    	</li>
    </ul>
</div> 
<script type="text/javascript">
	$(".fixBox1 li.center").click(function(){
		if($(".fixnav").css('display')=='none'){
			$(".fixnav").slideDown();
		}else{
			$(".fixnav").slideUp();
		}
		
	});
	$(".menuBtn .icon-down").click(function(){
		$(".fixnav").slideUp();
	})
</script>
<?php endif; ?>

</div>
<div class="menuBg"></div>
<div class="menuNav">
    <h5>MENU</h5>
    <ul>
        <li <?php if($navCur == 'index'): ?>class="on"<?php endif; ?>><a href="<?php echo url('mobile/index/index'); ?>">首页</a></li>
        <?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
        <li <?php if($navCur == $nav['cateId']): ?>class="on"<?php endif; ?>><a href="<?php echo $nav['url']; ?>"><?php echo $nav['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<script type="text/javascript">
    TouchSlide({ slideCell:"#leftTabBox" });
    TouchSlide({ slideCell:"#newsTab" });
    $(".header .menu").click(function(){
        $(".menuNav").addClass('menuOn');
        $(".menuBg").addClass('menuOn');
        $(".homebody").addClass('bodyOn');
    });
    $(".menuBg").click(function(){
        $(".menuNav").removeClass('menuOn');
        $(".menuBg").removeClass('menuOn');
        $(".homebody").removeClass('bodyOn');
    })
</script>



</body>
</html>
