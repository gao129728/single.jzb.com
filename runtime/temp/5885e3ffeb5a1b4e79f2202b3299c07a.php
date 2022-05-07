<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:77:"/www/wwwroot/baimusen.cn/public/../application/home/view/category/detail.html";i:1535103194;s:73:"/www/wwwroot/baimusen.cn/public/../application/home/view/public/head.html";i:1532138656;s:75:"/www/wwwroot/baimusen.cn/public/../application/home/view/public/header.html";i:1532138656;s:78:"/www/wwwroot/baimusen.cn/public/../application/home/view/public/left_menu.html";i:1535100944;s:84:"/www/wwwroot/baimusen.cn/public/../application/home/view/detail-module/module_0.html";i:1532138656;s:84:"/www/wwwroot/baimusen.cn/public/../application/home/view/detail-module/module_1.html";i:1535018730;s:82:"/www/wwwroot/baimusen.cn/public/../application/home/view/public/message_panel.html";i:1534929724;s:75:"/www/wwwroot/baimusen.cn/public/../application/home/view/public/footer.html";i:1532138656;s:77:"/www/wwwroot/baimusen.cn/public/../application/home/view/public/onlineqq.html";i:1532138656;}*/ ?>
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
<body>
<!--头部-->
<div class="header-box">
	<?php if($config['web_nav_style'] != 4): ?>
	<div class="headTop headTop-<?php echo $config['web_nav_style']; ?>">
	    <div class="box-wrap clearfix">
	        <p class="fl">欢迎来到<?php echo $config['web_site_name']; ?>官方网站！</p>
	        <div class="fr">
	            <?php if($config['web_site_member'] == 1): if($isLogin): ?>
	                <span class="site-member">
	                    <i class="iconfont icon-morentouxiang"></i>您好，<?php echo $member['account']; ?> <a href="javascript:;" onclick="isLoginOut();">退出</a>  |
	                </span>
	                <?php else: ?>
	                <a href="<?php echo url('home/member/login'); ?>">登录</a>
	                <?php if($config['web_member_reg'] == 1): ?><a href="<?php echo url('home/member/register'); ?>">注册</a><?php endif; ?> |
	                <?php endif; endif; ?>
	            <a href="<?php echo url('home/sitemap/sitemap'); ?>">网站地图</a>
	            <?php if($wap_site_state == 1): ?>
	            <a href="<?php echo $mobile_domain; ?>" class="mobile">手机版  <?php if($wap_site_qrcode): ?><img src="__UPLOAD_PATH__/<?php echo $wap_site_qrcode; ?>" width="100"><?php endif; ?></a>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>
	<?php endif; if($config['web_nav_style'] == 1): ?>
	<div class="header">
	    <h1 class="logo">
	        <a href="<?php echo url('home/index/index'); ?>" title="<?php echo $config['web_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a>
	    </h1>
	</div>
	<!--导航-->
	<div class="MainNav">
	    <div class="box-wrap">
	        <ul class="clearfix">
	            <li style="width:<?php echo $nav_width; ?>px;"><a href="<?php echo url('home/index/index'); ?>" title="网站首页" <?php if($navCur == 'index'): ?>class="current"<?php endif; ?>>网站首页</a></li>
	            <?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
	            <li style="width:<?php echo $nav_width; ?>px;"><a href="<?php echo $nav['url']; ?>" title="<?php echo $nav['name']; ?>" <?php if($nav['isTarget'] == 1): ?>target="_blank"<?php endif; if($navCur == $nav['id']): ?>class="current"<?php endif; ?>><?php echo $nav['name']; ?></a>
	                <?php if($nav['sub'] and $config['web_subnav'] == 1): ?>
	                <div class="subNav">
	                    <dl>
	                        <?php if(is_array($nav['sub']) || $nav['sub'] instanceof \think\Collection || $nav['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $nav['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	                        <dt><a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" <?php if($vo['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $vo['name']; ?></a></dt>
	                        <?php endforeach; endif; else: echo "" ;endif; ?>
	                    </dl>
	                </div>
	                <?php endif; ?>
	            </li>
	            <?php endforeach; endif; else: echo "" ;endif; ?>
	        </ul>
	    </div>
	</div>
	<script type="text/javascript">
	    $(".MainNav li").last().find('a').css('background-image','none');
	    <?php if($config['web_subnav'] == 1): ?>
	    Nav();
	    <?php endif; ?>
	</script>
	<?php elseif($config['web_nav_style'] == 2): ?>
	<div class="MainNav-1">
	    <div class="box-wrap clearfix">
	        <h1 class="lef fl">
	            <a href="<?php echo url('home/index/index'); ?>" title="<?php echo $config['web_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a>
	        </h1>
	        <div class="nav-1">
	            <ul class="clearfix">
	                <li <?php if($navCur == 'index'): ?>class="on"<?php endif; ?>><a href="<?php echo url('home/index/index'); ?>">网站首页</a></li>
	                <?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
	                <li <?php if($navCur == $nav['id']): ?>class="on"<?php endif; ?>><a href="<?php echo $nav['url']; ?>" title="<?php echo $nav['name']; ?>" <?php if($nav['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['name']; if($nav['sub'] and $config['web_subnav'] == 1): ?><i class="iconfont icon-down"></i><?php endif; ?></a>
	                    <?php if($nav['sub'] and $config['web_subnav'] == 1): ?>
	                    <div class="nav-item">
	                        <ul>
	                            <?php if(is_array($nav['sub']) || $nav['sub'] instanceof \think\Collection || $nav['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $nav['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	                            <li><a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" <?php if($vo['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><span><?php echo $vo['name']; ?></span><i class="iconfont icon-xiangyoujiantou"></i></a></li>
	                            <?php endforeach; endif; else: echo "" ;endif; ?>
	                        </ul>
	                    </div>
	                    <?php endif; ?>
	                </li>
	                <?php endforeach; endif; else: echo "" ;endif; ?>
	            </ul>
	        </div>
	    </div>
	</div>
	<?php elseif($config['web_nav_style'] == 3): ?>
	<div class="mainNav-3">
		<div class="box-wrap clearfix">
			<h1 class="lef fl">
				<a href="<?php echo url('home/index/index'); ?>" title="<?php echo $config['web_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a>
			</h1>
			<div class="nav">
				<ul class="clearfix">
					<li <?php if($navCur == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo url('home/index/index'); ?>">网站首页</a></li>
					<?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
					<li <?php if($navCur == $nav['id']): ?>class="active"<?php endif; ?>><a href="<?php echo $nav['url']; ?>" title="<?php echo $nav['name']; ?>" <?php if($nav['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['name']; if($nav['sub'] and $config['web_subnav'] == 1): ?><i class="iconfont icon-down"></i><?php endif; ?></a>
					<?php if($nav['sub'] and $config['web_subnav'] == 1): ?>
					<div class="nav-item">
						<ul>
							<?php if(is_array($nav['sub']) || $nav['sub'] instanceof \think\Collection || $nav['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $nav['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li><a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" <?php if($vo['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><span><?php echo $vo['name']; ?></span></a></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<?php endif; ?>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(window).scroll(function(){
			if($(window).scrollTop()>0){
				$(".header-box").addClass('header-fix');
			}else{
				$(".header-box").removeClass('header-fix');
			}
		});
	</script>
	<?php elseif($config['web_nav_style'] == 4): ?>
	<div class="mainNav-4">
		<div class="clearfix">
			<h1 class="lef fl">
				<a href="<?php echo url('home/index/index'); ?>" title="<?php echo $config['web_site_title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_logo']; ?>" alt="<?php echo $config['web_site_title']; ?>"/></a>
			</h1>
			<div class="rig fr">
				<div class="searchBox fl">
					<form class="header_search" name="search_form" method="get" action="<?php echo url('home/search/index'); ?>">
						<input name="keyword" type="text" id="search_key" class="sear-txt fl" placeholder="搜索">
						<div class="iconfont icon-search fl"></div>
					</form>
				</div>
				<?php if($config['web_site_member'] == 1): ?>
				<div class="a-box fl">
					<?php if($isLogin): ?>
					<span class="site-member"><i class="iconfont icon-morentouxiang"></i> 您好，<?php echo $member['account']; ?> <a href="javascript:;" onclick="isLoginOut();">退出</a></span>
					<?php else: ?>
					<a href="<?php echo url('home/member/login'); ?>">登录</a><em>|</em>
					<?php if($config['web_member_reg'] == 1): ?><a href="<?php echo url('home/member/register'); ?>">注册</a><?php endif; endif; ?>
				</div>
				<?php endif; ?>
				<div class="menu-btn fl"><i></i></div>
			</div>
			<div class="nav">
				<ul class="clearfix">
					<li <?php if($navCur == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo url('home/index/index'); ?>">网站首页</a></li>
					<?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
					<li <?php if($navCur == $nav['id']): ?>class="active"<?php endif; ?>><a href="<?php echo $nav['url']; ?>" title="<?php echo $nav['name']; ?>" <?php if($nav['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['name']; ?></a>
					<?php if($nav['sub'] and $config['web_subnav'] == 1): ?>
					<div class="nav-item">
						<ul>
							<?php if(is_array($nav['sub']) || $nav['sub'] instanceof \think\Collection || $nav['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $nav['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li><a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" <?php if($vo['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><span><?php echo $vo['name']; ?></span></a></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<?php endif; ?>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(window).scroll(function(){
			if($(window).scrollTop()>0){
				$(".header-box").addClass('header-fix');
			}else{
				$(".header-box").removeClass('header-fix');
			}
		});
		$('#search_key').blur(function(){
			if($.trim($(this).val()) == ''){
				layer.msg('搜索关键词不能为空', {icon: 5,time:2000,shade: 0.5}, function(index){
					layer.close(index);
				});
				return false;
			}
			$('.header_search')[0].submit();
		});
		$(".menu-btn").click(function(){
			if(!$(this).hasClass("active")){
				$(this).addClass('active');
				$(".mainNav-4 .nav").addClass('nav-show');
			}else{
				$(this).removeClass('active');
				$(".mainNav-4 .nav").removeClass('nav-show');
			}
		});
		$(".mainNav-4 .nav>ul>li").hover(function(){
			$(this).find(".nav-item").stop().slideDown(500);
		},function(){
			$(this).find(".nav-item").stop().slideUp(500);
		});

		$(function(){
			var sear=$(".mainNav-4 .searchBox .iconfont");
			sear.click(function(event){
				event.stopPropagation();
				$(".mainNav-4 .sear-txt").addClass("show");
				return false;
			})
			$(document).click(function(event){
				var _con = $(".mainNav-4 .sear-txt");   // 设置目标区域
				if(!_con.is(event.target) && _con.has(event.target).length === 0){
					$(".mainNav-4 .sear-txt").removeClass("show");
					$(".mainNav-4 .sear-txt").val('');
				}
			})
		})
	</script>
	<?php endif; ?>
</div>
<script type="text/javascript">
	function isLoginOut(){
		layer.confirm('您确定要退出登录吗？',{icon: 3, title:'提示'}, function(index){
			window.location = "<?php echo url('home/member/loginOut'); ?>";
			layer.close(index);
		})
	}
</script>
<!--banner-->
<?php if($inside_banner): ?>
<div class="iBanner">
    <div class="bd" style="width:1920px; margin-left:-960px;"><img src="__UPLOAD_PATH__/<?php echo $inside_banner; ?>" width="<?php echo $banner_config['width']; ?>" height="<?php echo $banner_config['height']; ?>" alt="<?php echo $vo['title']; ?>"></div>
</div>
<?php elseif($banner_img): if($banner_config['switch'] == 1): ?>
    <div class="HomeBan" style="height:<?php echo $banner_config['height']; ?>px;">
        <div class="bd" style="width:<?php echo $banner_config['width']; ?>px; margin-left:-<?php echo $banner_config['width']/2; ?>px;">
            <ul>
                <?php if(is_array($banner_img) || $banner_img instanceof \think\Collection || $banner_img instanceof \think\Paginator): $i = 0; $__LIST__ = $banner_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo !empty($vo['url'])?$vo['url']:'javascript:;'; ?>" <?php if($vo['url'] != ''): ?>target="_blank"<?php endif; ?>><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" width="<?php echo $banner_config['width']; ?>" height="<?php echo $banner_config['height']; ?>" alt="<?php echo $vo['title']; ?>" /></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if($banner_config['circle_btn'] == 1): ?>
        <div class="hd"><ul></ul></div>
        <?php endif; if($banner_config['aside_btn'] == 1): ?>
        <a class="prev btn"></a>
        <a class="next btn"></a>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        $(".HomeBan").hover(function(){
            $(this).find('.btn').fadeIn(300);
        }, function(){
            $(this).find('.btn').fadeOut(300);
        });
        $(".HomeBan").slide({titCell:".hd ul", mainCell:".bd ul", autoPage:true,trigger:"click", autoPlay:<?php echo !empty($banner_config['auto'])?'true':'false'; ?>, effect:"<?php echo $banner_config['switch_style']; ?>",delayTime:<?php echo $banner_config['effect_time']; ?>, interTime:<?php echo $banner_config['interval_time']; ?>});
    </script>
    <?php else: ?>
    <div class="iBanner">
        <div class="bd" style="width:<?php echo $banner_config['width']; ?>px; margin-left:-<?php echo $banner_config['width']/2; ?>px;">
        	<a href="<?php echo !empty($banner_img['url'])?$banner_img['url']:'javascript:;'; ?>" <?php if($banner_img['url'] != ''): ?>target="_blank"<?php endif; ?>>
        		<img src="__UPLOAD_PATH__/<?php echo $banner_img['photo']; ?>" width="<?php echo $banner_config['width']; ?>" height="<?php echo $banner_config['height']; ?>"  alt="<?php echo $vo['title']; ?>">
        	</a>
        </div>
    </div>
    <?php endif; endif; ?>

<!--主要内容-->
<div class="MainCon inside-container">
	<div class="box-wrap">
		<div class="breadcrumbs">
			您现在的位置：<a href="<?php echo url('home/index/index'); ?>">首页</a>
			<?php if(is_array($cate_arr) || $cate_arr instanceof \think\Collection || $cate_arr instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			> <a href="<?php echo $vo['url']; ?>"><?php echo $vo['name']; ?></a>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="inside-box clearfix <?php if($showSidebar === false): ?>full-box-wrap<?php elseif($showSidebar and $inside['web_menu_style'] == 2): ?>rig-box-wrap<?php endif; ?>">
			<?php if($inside['web_menu_style'] == 3 and $showSubMenu): ?>
<div class="main-menu">
    <div class="first-menu">
        <ul class="clearfix">
            <?php if(is_array($second_menu) || $second_menu instanceof \think\Collection || $second_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $second_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo $second['url']; ?>" title="<?php echo $second['name']; ?>" <?php if($second['isCurrent'] == 1): ?>class="active"<?php endif; if($second['isTarget'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $second['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php if($third_menu != ''): ?>
    <div class="second-menu">
        <ul class="clearfix">
            <?php if(is_array($third_menu) || $third_menu instanceof \think\Collection || $third_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $third_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo $third['url']; ?>" title="<?php echo $third['name']; ?>" <?php if($third['isCurrent'] == 1): ?>class="active"<?php endif; if($third['isTarget'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $third['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php endif; if($four_menu != ''): ?>
    <div class="third-menu">
        <ul class="clearfix">
            <?php if(is_array($four_menu) || $four_menu instanceof \think\Collection || $four_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $four_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$four): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo $four['url']; ?>" title="<?php echo $four['name']; ?>" <?php if($four['isCurrent'] == 1): ?>class="active"<?php endif; if($four['isTarget'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $four['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
<?php endif; if($showSidebar): ?>
<div class="leftCon fl">
    <?php if($showSubMenu and $inside['web_menu_style'] != 3): ?>
    <div class="sub-menu">
        <h2><?php echo $cate_arr[0]['name']; ?></h2>
        <ul class="menu-list">
            <?php if(is_array($sub_menu) || $sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo $sub['url']; ?>" title="<?php echo $sub['name']; ?>" <?php if($sub['isCurrent'] == 1): ?>class="active"<?php endif; if($sub['isTarget'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $sub['name']; ?> <span>＋</span></a>
                <?php if($sub['child']): ?>
                <ul class="lvl-third" style="display:none;">
                    <?php if(is_array($sub['child']) || $sub['child'] instanceof \think\Collection || $sub['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $sub['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="<?php echo $third['url']; ?>" title="<?php echo $third['name']; ?>" <?php if($third['isCurrent'] == 1): ?>class="active"<?php endif; if($third['isTarget'] == 1): ?> target="_blank"<?php endif; ?>><i class="iconfont <?php if($third['isCurrent'] == 1): ?> icon-xiajiantou <?php else: ?> icon-sanjiaoright <?php endif; ?>"></i><?php echo $third['name']; ?></a>
                        <?php if($third['child']): ?>
                        <ul class="lvl">
                            <?php if(is_array($third['child']) || $third['child'] instanceof \think\Collection || $third['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $third['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$four): $mod = ($i % 2 );++$i;?>
                            <li>
                                <a href="<?php echo $four['url']; ?>" title="<?php echo $four['name']; ?>" <?php if($four['isCurrent'] == 1): ?>class="active"<?php endif; if($four['isTarget'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $four['name']; ?></a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <script type="text/javascript">
        $(function(){
            $('.sub-menu .lvl-third').slideDown(1000);
        });
        var slvl=$(".sub-menu .lvl-third");
        var lvli=$(".sub-menu .lvl-third .lvl li").size();
        if(lvli<1){
            slvl.find(".iconfont").addClass("icon-sanjiaoright").removeClass('icon-xiajiantou');
        }
    </script>
    <?php endif; if($sidebar_style): ?>
    <div class="sidebar">
        <?php if(is_array($module_list) || $module_list instanceof \think\Collection || $module_list instanceof \think\Paginator): $ml = 0; $__LIST__ = $module_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$module): $mod = ($ml % 2 );++$ml;?>
        <div class="sidebar-item">
            <div class="sTit"><?php echo $module['title']; if($module['isMore'] and $module['module_style'] != 4): ?><a href="<?php echo $module['cate_url']; ?>">更多</a><?php endif; ?></div>
            <div class="con">
                <?php if($module['module_style'] == 1): ?>
                <ul class="pic-list">
                    <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listPic): $mod = ($i % 2 );++$i;?>
                    <li>
                        <p class="pic"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $listPic['photo']; ?>" width="<?php echo $module['moduleParam'][1]; ?>" height="<?php echo $module['moduleParam'][2]; ?>" <?php if($module['moduleParam'][3]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $listPic['title']; ?>"></a></p>
                        <?php if($module['moduleParam'][4]): ?>
                        <p class="tit"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><?php echo $listPic['title']; ?></a></p>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php elseif($module['module_style'] == 2): ?>
                <ul class="news-list">
                    <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsList): $mod = ($i % 2 );++$i;?>
                    <li class="clearfix">
                        <?php if($module['moduleParam'][4]): ?>
                        <p class="pic"><a href="<?php echo $newsList['url']; ?>" target="_blank" title="<?php echo $newsList['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $newsList['photo']; ?>" <?php if($module['moduleParam'][5]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $newsList['title']; ?>"></a></p>
                        <?php endif; ?>
                        <div class="txt-box">
                            <h4><em></em><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>" target="_blank"><?php echo leftstr($newsList['title'],$module['moduleParam'][1]); ?></a></h4>
                            <?php if($module['moduleParam'][2]): ?>
                            <div class="i"><?php echo leftstr_html($newsList['content'],$module['moduleParam'][3]); ?></div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php elseif($module['module_style'] == 3): ?>
                <div class="pic-focus" id="sidebar-module-<?php echo $ml; ?>">
                    <?php if($module['moduleParam'][6]): ?>
                    <a class="prev" href="javascript:;" style="top:<?php echo $module['moduleParam'][2]/2-22; ?>px"></a>
                    <a class="next" href="javascript:;" style="top:<?php echo $module['moduleParam'][2]/2-22; ?>px"></a>
                    <?php endif; ?>
                    <div class="bd">
                        <ul>
                            <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$picFocus): $mod = ($i % 2 );++$i;?>
                            <li>
                                <p class="pic"><a href="<?php echo $picFocus['url']; ?>" target="_blank" title="<?php echo $picFocus['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $picFocus['photo']; ?>" width="<?php echo $module['moduleParam'][1]; ?>" height="<?php echo $module['moduleParam'][2]; ?>" alt="<?php echo $picFocus['title']; ?>"></a></p>
                                <?php if($module['moduleParam'][3]): ?>
                                <p class="tit"><a href="<?php echo $picFocus['url']; ?>" target="_blank" title="<?php echo $picFocus['title']; ?>"><?php echo $picFocus['title']; ?></a></p>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    $("#sidebar-module-<?php echo $ml; ?>").slide({mainCell:".bd ul", autoPlay:<?php echo !empty($module['moduleParam'][4])?'true':'false'; ?>, autoPage:true, effect:"<?php echo $module['moduleParam'][5]; ?>"});
                </script>
                <?php else: ?>
                <div class="content-panel"><?php echo $module['module_content']; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>


			<div class="rigCon fr">
				<?php switch($cate['infoStyle']): case "0": ?><div class="art-box">
    <h2><?php echo $article['title']; ?></h2>
    <div class="info">
        <i class="iconfont icon-shijian"></i>发布时间：<?php echo date("Y-m-d",$article['create_time']); ?>
        <i class="iconfont icon-liulan"></i>浏览次数：<?php echo $article['views']; if($article['source'] != ''): ?><i class="iconfont icon-danyilaiyuan"></i>信息来源：<?php echo $article['source']; endif; if($article['writer'] != ''): ?><i class="iconfont icon-xiazai43"></i>文章作者：<?php echo $article['writer']; endif; ?>
    </div>
</div>
<div class="article_content">
    <?php echo $article['content']; ?>
</div>
<ul class="prev_next">
    <li>
        <span>上一篇：</span><?php if($up): ?><a href="<?php echo $up['url']; ?>" title="<?php echo $up['title']; ?>" <?php if($up['website'] != ''): ?>target="_blank"<?php endif; ?>><?php echo $up['title']; ?></a><?php else: ?>没有了<?php endif; ?>
    </li>
    <li>
        <span>下一篇：</span><?php if($down): ?><a href="<?php echo $down['url']; ?>" title="<?php echo $down['title']; ?>" <?php if($down['website'] != ''): ?>target="_blank"<?php endif; ?>><?php echo $down['title']; ?></a><?php else: ?>没有了<?php endif; ?>
    </li>
</ul>
<?php break; case "1": ?><div class="product-show clearfix">
    <?php if($product_img): ?>
    <div class="focusBox">
        <div class="bigImg" style="width:<?php echo $infoParam[0]; ?>px; height:<?php echo $infoParam[1]; ?>px;">
            <ul>
                <?php if(is_array($product_img) || $product_img instanceof \think\Collection || $product_img instanceof \think\Paginator): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($infoParam[2] == 1): ?>
                    <li><a href="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" class="MagicZoom"><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" width="<?php echo $infoParam[0]; ?>" height="<?php echo $infoParam[1]; ?>" alt="<?php echo $vo['title']; ?>" /></a></li>
                    <?php else: ?>
                    <li><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" width="<?php echo $infoParam[0]; ?>" height="<?php echo $infoParam[1]; ?>" alt="<?php echo $vo['title']; ?>" /></li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="smallImg" style="width:<?php echo $infoParam[0]+2; ?>px;">
            <a class="scrollbutton prev"><i class="iconfont icon-xiangzuojiantou"></i></a>
            <div class="p_list">
                <ul>
                    <?php if(is_array($product_img) || $product_img instanceof \think\Collection || $product_img instanceof \think\Paginator): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" width="80"/></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <a class="scrollbutton next"><i class="iconfont icon-xiangyoujiantou"></i></a>
        </div>
        <?php if($infoParam[2] == 1): ?>
        <link href="__CSS__/MagicZoom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__JS__/mz-packed.js"></script>
        <?php endif; ?>
        <script type="text/javascript">
            var w=98;//小图宽度，包括内外边距、边框
            var s=$('.smallImg .p_list li').size();
            var length= Math.floor(<?php echo $infoParam[0]-66; ?>/w); //小图显示个数
            $('.smallImg .p_list').width(length*w);
            $('.smallImg ul').width(s*w);
            //大图滚动
            jQuery(".focusBox").slide({titCell: ".p_list li", mainCell: ".bigImg ul", effect:"fold", autoPlay:false,trigger:'click', startFun: function(i,c){
                if (c>length){
                    if(i>=length){
                        $('.smallImg ul').animate({'marginLeft': -(i-length+1)*w}, 100);
                    }else{
                        $('.smallImg ul').animate({'marginLeft': 0}, 100);
                    }
                }
            }
            });
        </script>
    </div>
    <?php endif; ?>
    <div class="intro">
        <h2><?php echo $article['title']; ?></h2>
        <div class="i">
            <?php echo $article['intro']; ?>
        </div>
        <?php if($inside['web_site_qq'] != ''): ?>
        <div class="online_qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $inside['web_site_qq']; ?>&site=qq&menu=yes" target="_blank"><img src="__IMG__/qq_icon.png"/>在线咨询</a></div>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        var box_wd = $('.product-show').width();
        $('.product-show .intro').width(box_wd - 22 - <?php echo $infoParam[0]; ?>);
    </script>
</div>
<div class="Pro_info">
    <h3>产品介绍</h3>
    <div class="article_content">
        <?php echo $article['content']; ?>
    </div>
</div>
<?php if($relevant_article): ?>
<div class="Pro_info">
    <h3>相关产品</h3>
    <ul class="product_about clearfix">
        <?php if(is_array($relevant_article) || $relevant_article instanceof \think\Collection || $relevant_article instanceof \think\Paginator): $i = 0; $__LIST__ = $relevant_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$itemPic): $mod = ($i % 2 );++$i;?>
        <li <?php if($i == 1): ?>class="noMg"<?php endif; ?>>
            <p class="pic"><a href="<?php echo $itemPic['url']; ?>" title="<?php echo $itemPic['title']; ?>" class="mask"><i class="iconfont icon-jiantouyou"></i></a><img src="__UPLOAD_PATH__/<?php echo $itemPic['photo']; ?>" alt="<?php echo $itemPic['title']; ?>"></p>
            <p class="tit"><a href="<?php echo $itemPic['url']; ?>" title="<?php echo $itemPic['title']; ?>"><?php echo $itemPic['title']; ?></a></p>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<?php endif; break; default: ?>模板文件不存在
				<?php endswitch; ?>
			</div>
		</div>
	</div>
	<?php if($cate['isForm']): ?>
	<div class="message-panel">
    <script src="__JS__/jquery.form.js"></script>
    <div class="form-area">
        <h2>在线留言</h2>
        <form action="<?php echo url('home/form/message'); ?>" method="post" id="message">
            <ul>
                <li class="clearfix">
                    <input name="name" type="text" size="30" maxlength="50" class="text name" placeholder="姓名"/>
                    <input name="phone" type="text" size="30" maxlength="50" class="text" placeholder="电话"/>
                </li>
                <li class="clearfix">
                    <input name="email" type="text" size="30" maxlength="50" class="text email" placeholder="电子邮箱"/>
                </li>
                <li class="clearfix">
                    <textarea name="content" rows="4" class="textarea" placeholder="请输入您的留言"></textarea>
                </li>
                <li class="clearfix">
                    <input name="code" type="text" size="12" maxlength="4" class="text code" placeholder="验证码"/>
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
                    layer.alert(data.msg, {icon: 6, shade: 0.5, closeBtn: 0}, function(index){
                        layer.close(index);
                        $('#message')[0].reset();
                    });
                }else{
                    layer.msg(data.msg, {icon: 5,time:2000,shade: 0.5}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
        });
    </script>
</div>


	<?php endif; ?>
</div>

<!--底部-->
<!--底部-->
<div class="footer">
    <div class="foot-bottom">
        <div class="box-wrap">
            <?php if($friend_link_show == 1): ?>
            <div class="friend_link clearfix">
                <em>友情链接：</em>
                <?php if(is_array($friend_link) || $friend_link instanceof \think\Collection || $friend_link instanceof \think\Paginator): $i = 0; $__LIST__ = $friend_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            <div class="foot-extra clearfix">
                <div class="ft-contact">
                    <?php echo $config['web_site_contact']; ?>
                </div>
                <div class="ft-qrcode clearfix">
                    <?php if($config['web_site_qrcode']): ?>
                    <div class="omg">
                        <img alt="微信公众号" src="__UPLOAD_PATH__/<?php echo $config['web_site_qrcode']; ?>">
                        <p>微信公众号</p>
                    </div>
                    <?php endif; if($wap_site_state == 1 and $wap_site_qrcode): ?>
                    <div class="omg">
                        <img alt="手机版" src="__UPLOAD_PATH__/<?php echo $wap_site_qrcode; ?>">
                        <p>手机版</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="box-wrap">
            <?php echo $config['web_site_copy']; ?>
        </div>
    </div>
</div>
<?php if($adverList != ''): ?>
<script type="text/javascript" src="__JS__/adver.js"></script>
<?php if(is_array($adverList) || $adverList instanceof \think\Collection || $adverList instanceof \think\Paginator): $i = 0; $__LIST__ = $adverList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adver): $mod = ($i % 2 );++$i;?>
<script type="text/javascript">AdPrepare('<?php echo $adver['id']; ?>','<?php echo $adver['link_url']; ?>','<?php echo $adver['mode']; ?>','__UPLOAD_PATH__/<?php echo $adver['photo']; ?>',<?php echo $adver['width']; ?>,<?php echo $adver['height']; ?>,<?php echo $adver['asidetop']; ?>,<?php echo $adver['asideleft']; ?>,<?php echo $adver['closed']; ?>,<?php echo $adver['screen_time']; ?>);</script>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
