<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:82:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/category/detail.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/head.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/header.html";i:1532138656;s:82:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/sub_menu.html";i:1532138656;s:89:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/detail-module/module_0.html";i:1532138656;s:89:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/detail-module/module_1.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/footer.html";i:1532138656;s:77:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/nav.html";i:1532138656;}*/ ?>
<!Doctype html>
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
                <?php if(is_array($second_menu) || $second_menu instanceof \think\Collection || $second_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $second_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $second['url']; ?>" <?php if($second['isCurrent'] == 1): ?>class="on"<?php endif; ?>><?php echo $second['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
    <?php if($third_menu != ''): ?>
    <div class="sub_menu_2" id="wrapper02">
        <div class="scroller">
            <ul class="clearfix">
                <?php if(is_array($third_menu) || $third_menu instanceof \think\Collection || $third_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $third_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $third['url']; ?>" <?php if($third['isCurrent'] == 1): ?>class="on"<?php endif; ?>><?php echo $third['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            var third_select = $('.sub_menu_2 li .on').parent().index();
            $('#wrapper02').navbarscroll({
                defaultSelect:third_select
            });
        });
    </script>
    <?php endif; if($four_menu != ''): ?>
    <div class="sub_menu_3" id="wrapper03">
        <div class="scroller">
            <ul class="clearfix">
                <?php if(is_array($four_menu) || $four_menu instanceof \think\Collection || $four_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $four_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$four): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $four['url']; ?>" <?php if($four['isCurrent'] == 1): ?>class="on"<?php endif; ?>><?php echo $four['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            var four_select = $('.sub_menu_3 li .on').parent().index();
            $('#wrapper03').navbarscroll({
                defaultSelect:four_select
            });
        });
    </script>
    <?php endif; ?>
</div>
	<section class="MainCon">
		<?php switch($cate['infoStyle']): case "0": ?><div class="art-box">
    <h2><?php echo $article['title']; ?></h2>
    <div class="info">
        <i class="iconfont icon-shijian"></i> <?php echo date("Y-m-d",$article['create_time']); ?> &nbsp;&nbsp;&nbsp;&nbsp;
        <i class="iconfont icon-liulan"></i> <?php echo $article['views']; ?>
    </div>
</div>
<div class="article_content">
    <?php echo $article['content']; ?>
</div>
<?php if($up || $down): ?>
<div class="prev_next">
    <?php if($up): ?><a href="<?php echo $up['url']; ?>" title="<?php echo $up['title']; ?>">上一条</a><?php endif; if($down): ?><a href="<?php echo $down['url']; ?>" title="<?php echo $down['title']; ?>">下一条</a><?php endif; ?>
</div>
<?php endif; if($relevant_article): ?>
<div class="news_about">
    <h5>相关信息</h5>
    <ul>
        <?php if(is_array($relevant_article) || $relevant_article instanceof \think\Collection || $relevant_article instanceof \think\Paginator): $i = 0; $__LIST__ = $relevant_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$relevant): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo $relevant['url']; ?>">○ <?php echo $relevant['title']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<?php endif; break; case "1": ?><div class="art-box" style="border:none;">
    <h2><?php echo $article['title']; ?></h2>
</div>
<?php if($product_img): ?>
<div class="Pro_focus" id="Pro_focus">
    <a href="javascript:;" class="prev iconfont icon-xiangzuo02"></a>
    <div class="bd">
        <ul>
            <?php if(is_array($product_img) || $product_img instanceof \think\Collection || $product_img instanceof \think\Paginator): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" alt="<?php echo $vo['title']; ?>"/></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <a href="javascript:;" class="next iconfont icon-xiangyou02"></a>
</div>
<script type="text/javascript">
    TouchSlide({
        slideCell:"#Pro_focus",
        mainCell:".bd ul",
        effect:"left",
        autoPlay:true,
        switchLoad:"_src"
    });
</script>
<?php endif; ?>
<div class="pro_info">
    <h3>产品参数</h3>
    <div class="article_content">
        <?php echo $article['intro']; ?>
    </div>
</div>
<div class="pro_info">
    <h3>产品简介</h3>
    <div class="article_content">
        <?php echo $article['content']; ?>
    </div>
</div>
<div class="pro_info">
    <h3>相关产品</h3>
    <div class="relevant_product">
        <ul class="clearfix">
            <?php if(is_array($relevant_article) || $relevant_article instanceof \think\Collection || $relevant_article instanceof \think\Paginator): $i = 0; $__LIST__ = $relevant_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <li>
                <div class="pic">
                    <a href="<?php echo $item['url']; ?>"><img src="__UPLOAD_PATH__/<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>"/></a>
                </div>
                <p class="tit"><a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></a></p>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <script type="text/javascript">
        window.onload=function(){
            setPicHeight(".relevant_product .pic");
        }
    </script>
</div><?php break; default: ?>模板文件不存在
		<?php endswitch; ?>
	</section>
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
<!--导航-->
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