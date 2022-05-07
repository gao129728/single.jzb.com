<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/sitemap/sitemap.html";i:1535959519;s:76:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/public/head.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/public/header.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/public/footer.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/home/view/public/onlineqq.html";i:1532138656;}*/ ?>
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
			您现在的位置：<a href="<?php echo url('home/index/index'); ?>">首页</a> > <?php echo $base_name; ?>
		</div>
		<div class="inside-box clearfix">
			<div class="centerCon">
				<div class="sitemap">
					<?php if(is_array($cate_tree) || $cate_tree instanceof \think\Collection || $cate_tree instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
					<div class="cate-item">
						<h2><a href="<?php echo $cate['url']; ?>" title="<?php echo $cate['name']; ?>" <?php if($cate['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $cate['name']; ?></a></h2>
						<?php if($cate['child']): ?>
						<ul>
							<?php if(is_array($cate['child']) || $cate['child'] instanceof \think\Collection || $cate['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?>
							<li class="second-li">
								<h3><a href="<?php echo $second['url']; ?>" title="<?php echo $second['name']; ?>" <?php if($second['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $second['name']; ?></a></h3>
								<?php if($second['child']): ?>
								<ul class="clearfix">
									<?php if(is_array($second['child']) || $second['child'] instanceof \think\Collection || $second['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $second['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
									<li class="third-li">
										<h4><a href="<?php echo $third['url']; ?>" title="<?php echo $third['name']; ?>" <?php if($third['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $third['name']; ?></a></h4>
										<?php if($third['child']): ?>
										<dl>
											<?php if(is_array($third['child']) || $third['child'] instanceof \think\Collection || $third['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $third['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$four): $mod = ($i % 2 );++$i;?>
											<dt><a href="<?php echo $four['url']; ?>" title="<?php echo $four['name']; ?>" <?php if($four['isTarget'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $four['name']; ?></a></dt>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</dl>
										<?php endif; ?>
									</li>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								<?php endif; ?>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<?php endif; ?>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
	</div>
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
