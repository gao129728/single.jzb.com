<?php if (!defined('THINK_PATH')) exit(); /*a:12:{s:74:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index/index.html";i:1532138656;s:74:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/public/head.html";i:1532138656;s:76:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/public/header.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_1.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_2.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_3.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_4.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_5.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_6.html";i:1532138656;s:84:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/index-module/module_7.html";i:1532138656;s:76:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/public/footer.html";i:1532138656;s:78:"E:\php\testjzb.ahcfwl.com\public/../application/home/view/public/onlineqq.html";i:1532138656;}*/ ?>
<!DOCTYPE html>
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
<div class="MainCon">
    <?php if($search_show == 1): ?>
    <div class="search_box">
        <div class="box-wrap">
            <div class="fl">
                <span>热门搜索： </span>
                <?php if(is_array($hot_search) || $hot_search instanceof \think\Collection || $hot_search instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php if($vo['url'] != ''): ?><?php echo $vo['url']; else: ?><?php echo url('home/search/index'); ?>?keyword=<?php echo $vo['title']; endif; ?>" target="_blank"><?php echo $vo['title']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <form class="search_form fr" name="search_form" method="get" action="<?php echo url('home/search/index'); ?>">
                <input name="keyword" type="text" id="searchkd" placeholder="请输入搜索关键字... ">
                <i class="iconfont icon-search"></i>
            </form>
        </div>
    </div>
    <?php endif; if(is_array($structureList) || $structureList instanceof \think\Collection || $structureList instanceof \think\Paginator): $sl = 0; $__LIST__ = $structureList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$structure): $mod = ($sl % 2 );++$sl;?>
    <div class="area-content" style="padding:<?php echo $structure['topSpace']; ?>px 0 <?php echo $structure['bottomSpace']; ?>px; <?php if($structure['bgcolor']): ?>background-color:<?php echo $structure['bgcolor']; ?>;<?php endif; if($structure['photo']): ?>background-image:url('__UPLOAD_PATH__/<?php echo $structure['photo']; ?>');<?php endif; ?>">
        <div class="<?php echo !empty($structure['show_style'])?'screen-wrap':'box-wrap'; ?> clearfix">
            <?php if(is_array($structure['module_list']) || $structure['module_list'] instanceof \think\Collection || $structure['module_list'] instanceof \think\Paginator): $ml = 0; $__LIST__ = $structure['module_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$module): $mod = ($ml % 2 );++$ml;?>
            <div class="col-area <?php echo $module['float']; ?>" id="index-module-<?php echo $sl; ?><?php echo $ml; ?>" style="width:<?php echo $module['width']; ?>;">
                <?php if($module['titleStyle'] == 1): ?>
                <div class="col-hd-1">
                    <h3><?php echo $module['sub_title']; ?></h3>
                    <h2><?php echo $module['title']; ?></h2>
                    <img src="__IMG__/cir.png"/>
                </div>
                <?php elseif($module['titleStyle'] == 2): ?>
                <div class="col-hd-2 clearfix">
                    <h3><?php echo $module['title']; ?></h3>
                    <?php if($module['isMore']): ?><p class="m"><a href="<?php echo $module['cate_url']; ?>" title="<?php echo $module['title']; ?>">全部</a></p><?php endif; ?>
                </div>
                <?php elseif($module['titleStyle'] == 3): ?>
                <div class="col-hd-3 clearfix">
                    <ul class="clearfix">
                        <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
                        <li><?php echo $tab_cate_name['name']; ?></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php if($module['isMore']): ?>
                        <p class="m">
                            <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
                            <a href="<?php echo $tab_cate_name['url']; ?>" title="<?php echo $tab_cate_name['name']; ?>">MORE+</a>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php elseif($module['titleStyle'] == 4): ?>
                <div class="col-hd-4 clearfix">
                    <?php if($module['titPic']): ?><h3><img src="__UPLOAD_PATH__/<?php echo $module['titPic']; ?>"></h3><?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="col-bd">
                    <?php switch($module['module_style']): case "1": if($module['titleStyle'] == 3): if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
    <div class="pic-list-panel clearfix">
        <?php if($module['moduleParam'][10] and $module['moduleParam'][12]): ?>
        <a class="aprev"><i class="iconfont icon-left"></i></a>
        <a class="anext"><i class="iconfont icon-right"></i></a>
        <?php endif; ?>
        <ul>
            <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listPic): $mod = ($i % 2 );++$i;?>
            <li style="width:<?php echo !empty($module['moduleParam'][4])?$module['moduleParam'][2]+2:$module['moduleParam'][2]; ?>px;" <?php if($module['moduleParam'][10] or ($module['moduleParam'][10]==0 and $i % $module['moduleParam'][1] > 0)): ?>class="MgRt"<?php endif; ?>>
                <div class="item-box">
	                <p class="pic"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $listPic['photo']; ?>" width="<?php echo $module['moduleParam'][2]; ?>" height="<?php echo $module['moduleParam'][3]; ?>" <?php if($module['moduleParam'][4]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $listPic['title']; ?>"></a></p>
	                <?php if($module['moduleParam'][5]): ?>
	                <p class="tit"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><?php echo leftstr($listPic['title'],$module['moduleParam'][6]); ?></a></p>
	                <?php endif; if($module['moduleParam'][7]): ?>
	                <div class="intro"><?php echo leftstr_html($listPic['content'],$module['moduleParam'][8]); ?></div>
	                <?php endif; if($module['moduleParam'][9]): ?>
	                <p class="detail"><a href="<?php echo $listPic['url']; ?>" target="_blank">查看详情</a></p>
	                <?php endif; ?>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="pic-list-panel clearfix">
    <?php if($module['moduleParam'][10] and $module['moduleParam'][12]): ?>
    <a class="aprev"><i class="iconfont icon-left"></i></a>
    <a class="anext"><i class="iconfont icon-right"></i></a>
    <?php endif; ?>
    <ul>
        <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listPic): $mod = ($i % 2 );++$i;?>
        <li style="width:<?php echo !empty($module['moduleParam'][4])?$module['moduleParam'][2]+2:$module['moduleParam'][2]; ?>px;" <?php if($module['moduleParam'][10] or ($module['moduleParam'][10]==0 and $i % $module['moduleParam'][1] > 0)): ?>class="MgRt"<?php endif; ?>>
            <div class="item-box">
	            <p class="pic"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $listPic['photo']; ?>" width="<?php echo $module['moduleParam'][2]; ?>" height="<?php echo $module['moduleParam'][3]; ?>" <?php if($module['moduleParam'][4]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $listPic['title']; ?>"></a></p>
	            <?php if($module['moduleParam'][5]): ?>
	            <p class="tit"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><?php echo leftstr($listPic['title'],$module['moduleParam'][6]); ?></a></p>
	            <?php endif; if($module['moduleParam'][7]): ?>
	            <div class="intro"><?php echo leftstr_html($listPic['content'],$module['moduleParam'][8]); ?></div>
	            <?php endif; if($module['moduleParam'][9]): ?>
	            <p class="detail"><a href="<?php echo $listPic['url']; ?>" target="_blank">查看详情</a></p>
	            <?php endif; ?>
            </div>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<?php endif; ?>
<script type="text/javascript">
    setPicSpace("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .pic-list-panel",<?php echo !empty($module['moduleParam'][4])?$module['moduleParam'][2]+2:$module['moduleParam'][2]; ?>,<?php echo $module['moduleParam'][1]; ?>);  //设置图片间距
    <?php if($module['moduleParam'][10]): if($module['moduleParam'][11] == 0): ?>
            $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .pic-list-panel").slide({mainCell:"ul", autoPlay:true, autoPage:true, effect:"leftLoop", vis:<?php echo $module['moduleParam'][1]; ?>, trigger:"click", prevCell:".aprev",nextCell:".anext"});
        <?php else: ?>
            $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .pic-list-panel").slide({mainCell:"ul", autoPlay:true, effect:"leftMarquee", vis:<?php echo $module['moduleParam'][1]; ?>, trigger:"click", interTime:30, prevCell:".aprev",nextCell:".anext"});
        <?php endif; endif; ?>
</script><?php break; case "2": if($module['titleStyle'] == 3): if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
    <div class="news-list-panel">
        <div class="bd">
            <ul>
                <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsList): $mod = ($i % 2 );++$i;?>
                <li class="clearfix <?php if($module['moduleParam'][9] == 0 and $i == $module['moduleParam'][0]): ?>noMg<?php endif; ?>">
                    <?php if($module['moduleParam'][5]): ?>
                    <p class="pic"><a href="<?php echo $newsList['url']; ?>" target="_blank" title="<?php echo $newsList['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $newsList['photo']; ?>" width="<?php echo $module['moduleParam'][7]; ?>" height="<?php echo $module['moduleParam'][8]; ?>" <?php if($module['moduleParam'][6]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $newsList['title']; ?>"></a></p>
                    <?php endif; ?>
                    <div class="txt-box">
	                    <h4><?php if($module['moduleParam'][2]): ?><span><?php echo date("Y-m-d",$newsList['create_time']); ?></span><?php endif; ?><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>" target="_blank"><?php echo leftstr($newsList['title'],$module['moduleParam'][1]); ?></a></h4>
	                    <?php if($module['moduleParam'][3]): ?>
	                    <div class="i"><?php echo leftstr_html($newsList['content'],$module['moduleParam'][4]); ?></div>
	                    <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="news-list-panel">
    <div class="bd">
        <ul>
            <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsList): $mod = ($i % 2 );++$i;?>
            <li class="clearfix <?php if($module['moduleParam'][9] == 0 and $i == $module['moduleParam'][0]): ?>noMg<?php endif; ?>">
                <?php if($module['moduleParam'][5]): ?>
                <p class="pic"><a href="<?php echo $newsList['url']; ?>" target="_blank" title="<?php echo $newsList['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $newsList['photo']; ?>" width="<?php echo $module['moduleParam'][7]; ?>" height="<?php echo $module['moduleParam'][8]; ?>" <?php if($module['moduleParam'][6]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $newsList['title']; ?>"></a></p>
                <?php endif; ?>
                <div class="txt-box">
	                <h4><?php if($module['moduleParam'][2]): ?><span><?php echo date("Y-m-d",$newsList['create_time']); ?></span><?php endif; ?><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>" target="_blank"><?php echo leftstr($newsList['title'],$module['moduleParam'][1]); ?></a></h4>
	                <?php if($module['moduleParam'][3]): ?>
	                <div class="i"><?php echo leftstr_html($newsList['content'],$module['moduleParam'][4]); ?></div>
	                <?php endif; ?>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<script type="text/javascript">
    <?php if($module['moduleParam'][9]): ?>
        $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .news-list-panel .bd").height($("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .news-list-panel li").outerHeight(true)*<?php echo $module['moduleParam'][11]; ?>-5);
        <?php if($module['moduleParam'][10] == 0): ?>
        $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .news-list-panel .bd").slide({mainCell:"ul", autoPlay:true, autoPage:true, effect:"topLoop", vis:<?php echo $module['moduleParam'][11]; ?>, trigger:"click"});
        <?php else: ?>
        $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .news-list-panel .bd").slide({mainCell:"ul", autoPlay:true, effect:"topMarquee", vis:<?php echo $module['moduleParam'][11]; ?>, trigger:"click", interTime:30});
        <?php endif; endif; ?>
</script>
<script type="text/javascript">
	var imgHeight=$(".news-list-panel li .pic img").height();
	var txtHeight=$(".news-list-panel li .txt-box").height();
	var MAt=(imgHeight-txtHeight)/2;
	$(".news-list-panel li .txt-box").css("margin-top",MAt);
</script><?php break; case "3": if($module['titleStyle'] == 3): if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
    <div class="pic-txt-panel clearfix">
        <?php if($tab_cate_name['art_list']): if($module['moduleParam'][4]): ?>
        <p class="pic <?php if($module['moduleParam'][8]=='left'): ?>fl<?php elseif($module['moduleParam'][8]=='right'): ?>fr<?php endif; ?>"><a href="<?php echo $tab_cate_name['art_list']['url']; ?>" title="<?php echo $tab_cate_name['art_list']['title']; ?>" target="_blank"><img src="__UPLOAD_PATH__/<?php echo $tab_cate_name['art_list']['photo']; ?>" width="<?php echo $module['moduleParam'][5]; ?>" height="<?php echo $module['moduleParam'][6]; ?>" <?php if($module['moduleParam'][7]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $tab_cate_name['art_list']['title']; ?>"></a></p>
        <?php endif; ?>
        <div class="txt">
            <?php if($module['moduleParam'][0]): ?>
            <h4><?php echo leftstr($tab_cate_name['art_list']['title'],$module['moduleParam'][1]); ?></h4>
            <p class="line"></p>
            <?php endif; ?>
            <div class="info"><?php echo leftstr_html($tab_cate_name['art_list']['content'],$module['moduleParam'][2]); ?></div>
        </div>
        <?php if($module['moduleParam'][0]): ?>
        <p class="detail"><a href="<?php echo $tab_cate_name['art_list']['url']; ?>" target="_blank">查看更多</a></p>
        <?php endif; endif; ?>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="pic-txt-panel clearfix">
    <?php if($module['art_list']): if($module['moduleParam'][4]): ?>
        <p class="pic <?php if($module['moduleParam'][8]=='left'): ?>fl<?php elseif($module['moduleParam'][8]=='right'): ?>fr<?php endif; ?>"><a href="<?php echo $module['art_list']['url']; ?>" title="<?php echo $module['art_list']['title']; ?>" target="_blank"><img src="__UPLOAD_PATH__/<?php echo $module['art_list']['photo']; ?>" width="<?php echo $module['moduleParam'][5]; ?>" height="<?php echo $module['moduleParam'][6]; ?>" <?php if($module['moduleParam'][7]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $module['art_list']['title']; ?>"></a></p>
        <?php endif; ?>
        <div class="txt">
            <?php if($module['moduleParam'][0]): ?>
            <h4><?php echo leftstr($module['art_list']['title'],$module['moduleParam'][1]); ?></h4>
            <p class="line"></p>
            <?php endif; ?>
            <div class="info"><?php echo leftstr_html($module['art_list']['content'],$module['moduleParam'][2]); ?></div>
        </div>
        <?php if($module['moduleParam'][0]): ?>
        <p class="detail"><a href="<?php echo $module['art_list']['url']; ?>" target="_blank">查看更多</a></p>
        <?php endif; endif; ?>
</div>
<?php endif; break; case "4": ?><div class="fixed-content-panel">
    <div class="content-panel" <?php if($structure['show_style'] and $module['width'] == '100%'): ?>style="position:relative; width:1920px; left:50%; margin-left:-960px;"<?php endif; ?>>
        <?php echo $module['module_content']; ?>
    </div>
</div><?php break; case "5": ?><div class="tab-pic-panel">
    <div class="tab-bar fl">
        <div class="tab-bar-tit"><?php echo $module['title']; ?></div>
        <dl>
            <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
            <dt><a href="<?php echo $tab_cate_name['url']; ?>" title="<?php echo $tab_cate_name['name']; ?>"><em><?php echo $tab_cate_name['name']; ?></em><span>＋</span></a></dt>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
    </div>
    <div class="fr pic-box">
        <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
        <ul class="clearfix">
            <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$itemPic): $mod = ($i % 2 );++$i;?>
            <li <?php if($i % $module['moduleParam'][3] > 0): ?>class="MgRt"<?php endif; ?> style="width:<?php echo $module['moduleParam'][6]; ?>px;" >
                <p class="pic">
                	<a href="<?php echo $itemPic['url']; ?>" title="<?php echo $itemPic['title']; ?>" class="mask" target="_blank"><i class="iconfont">+</i></a>
                	<a href="<?php echo $itemPic['url']; ?>" title="<?php echo $itemPic['title']; ?>" class="imgbox <?php if($module['moduleParam'][8]): ?>imgBd<?php endif; ?> " ><img src="__UPLOAD_PATH__/<?php echo $itemPic['photo']; ?>" width="<?php echo $module['moduleParam'][6]; ?>" height="<?php echo $module['moduleParam'][7]; ?>" alt="<?php echo $itemPic['title']; ?>"></a>
                </p>
                <?php if($module['moduleParam'][4]): ?>
                <p class="tit"><a href="<?php echo $itemPic['url']; ?>" title="<?php echo $itemPic['title']; ?>" target="_blank"><?php echo leftstr($itemPic['title'],$module['moduleParam'][5]); ?></a></p>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<script type="text/javascript">
    setPicSpace("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .tab-pic-panel .pic-box",<?php echo !empty($module['moduleParam'][8])?$module['moduleParam'][6]+2:$module['moduleParam'][6]; ?>,<?php echo $module['moduleParam'][3]; ?>);  //设置图片间距
    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .tab-pic-panel").slide({mainCell:".pic-box",titCell:"dl dt",effect:"fold",autoPlay:<?php echo !empty($module['moduleParam'][9])?'true':'false'; ?>,autoPage:false,interTime:2500});
</script><?php break; case "6": if($module['titleStyle'] == 3): if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
    <div class="focus-panel">
        <?php if($module['moduleParam'][7]): ?>
        <a class="aprev"><i class="iconfont icon-xiangzuojiantou"></i></a>
        <a class="anext"><i class="iconfont icon-xiangyoujiantou"></i></a>
        <?php endif; ?>
        <div class="bd" style="width:<?php echo $module['moduleParam'][1]; ?>px; height:<?php echo $module['moduleParam'][2]; ?>px; left:50%; margin-left:-<?php echo $module['moduleParam'][1]/2; ?>px;">
            <ul>
                <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focusPic): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo !empty($focusPic['website'])?$focusPic['website']:'javascript:;'; ?>" <?php if($focusPic['website'] != ''): ?>target="_blank"<?php endif; ?>><img src="__UPLOAD_PATH__/<?php echo $focusPic['photo']; ?>" width="<?php echo $module['moduleParam'][1]; ?>" height="<?php echo $module['moduleParam'][2]; ?>" alt="<?php echo $focusPic['title']; ?>"></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if($module['moduleParam'][8]): ?>
        <div class="hd">
            <ul></ul>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="focus-panel">
    <?php if($module['moduleParam'][7]): ?>
    <a class="aprev"><i class="iconfont icon-xiangzuojiantou"></i></a>
    <a class="anext"><i class="iconfont icon-xiangyoujiantou"></i></a>
    <?php endif; ?>
    <div class="bd" style="width:<?php echo $module['moduleParam'][1]; ?>px; height:<?php echo $module['moduleParam'][2]; ?>px; left:50%; margin-left:-<?php echo $module['moduleParam'][1]/2; ?>px;">
        <ul>
            <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focusPic): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo !empty($focusPic['website'])?$focusPic['website']:'javascript:;'; ?>" <?php if($focusPic['website'] != ''): ?>target="_blank"<?php endif; ?>><img src="__UPLOAD_PATH__/<?php echo $focusPic['photo']; ?>" width="<?php echo $module['moduleParam'][1]; ?>" height="<?php echo $module['moduleParam'][2]; ?>" alt="<?php echo $focusPic['title']; ?>"></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php if($module['moduleParam'][8]): ?>
    <div class="hd">
        <ul></ul>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<script type="text/javascript">
    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .focus-panel").slide({titCell:".hd ul", mainCell:".bd ul", autoPlay:<?php echo !empty($module['moduleParam'][3])?'true':'false'; ?>, autoPage:true, effect:"<?php echo $module['moduleParam'][4]; ?>",delayTime:<?php echo $module['moduleParam'][5]; ?>, interTime:<?php echo $module['moduleParam'][6]; ?>,prevCell:".aprev",nextCell:".anext"});
</script><?php break; case "7": if($module['titleStyle'] == 3): if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
    <div class="question-list-panel">
        <div class="bd">
            <ul>
                <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$question): $mod = ($i % 2 );++$i;?>
                <li class="clearfix <?php if($module['moduleParam'][3] == 0 and $i == $module['moduleParam'][0]): ?>noMg<?php endif; ?>">
                    <div class="tit">
                        <span>问</span>
                        <h4><a href="<?php echo $question['url']; ?>" title="<?php echo $question['title']; ?>" target="_blank"><?php echo leftstr($question['title'],$module['moduleParam'][1]); ?></a></h4>
                    </div>
                    <div class="answer">
                        <span>答</span>
                        <div class="i"><?php echo leftstr_html($question['content'],$module['moduleParam'][2]); ?></div>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="question-list-panel">
    <div class="bd">
        <ul>
            <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$question): $mod = ($i % 2 );++$i;?>
            <li class="clearfix <?php if($module['moduleParam'][3] == 0 and $i == $module['moduleParam'][0]): ?>noMg<?php endif; ?>">
                <div class="tit">
                    <span>问</span>
                    <h4><a href="<?php echo $question['url']; ?>" title="<?php echo $question['title']; ?>" target="_blank"><?php echo leftstr($question['title'],$module['moduleParam'][1]); ?></a></h4>
                </div>
                <div class="answer">
                    <span>答</span>
                    <div class="i"><?php echo leftstr_html($question['content'],$module['moduleParam'][2]); ?></div>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<script type="text/javascript">
    <?php if($module['moduleParam'][3]): ?>
    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .question-list-panel .bd").height($("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .question-list-panel li").outerHeight(true)*<?php echo $module['moduleParam'][5]; ?>-20);
    <?php if($module['moduleParam'][4] == 0): ?>
    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .question-list-panel .bd").slide({mainCell:"ul", autoPlay:true, autoPage:true, effect:"topLoop", vis:<?php echo $module['moduleParam'][5]; ?>, trigger:"click"});
    <?php else: ?>
    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?> .question-list-panel .bd").slide({mainCell:"ul", autoPlay:true, effect:"topMarquee", vis:<?php echo $module['moduleParam'][5]; ?>, trigger:"click", interTime:30});
    <?php endif; endif; ?>
</script><?php break; default: ?>模板文件不存在
                    <?php endswitch; ?>
                </div>
            </div>
                <?php if($module['titleStyle'] == 3): ?>
                <script type="text/javascript">
                    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?>").slide({mainCell:".col-hd-3 .m",titCell:".col-hd-3 li",effect:"fold",autoPlay:false,autoPage:false});
                    $("#index-module-<?php echo $sl; ?><?php echo $ml; ?>").slide({mainCell:".col-bd",titCell:".col-hd-3 li",effect:"fold",autoPlay:false,autoPage:false,interTime:2500});
                </script>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
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
<script type="text/javascript">
    $('.search_form .icon-search').click(function(){
        if($.trim($('#searchkd').val()) == ''){
            layer.msg('搜索关键词不能为空', {icon: 5,time:2000,shade: 0.5}, function(index){
                layer.close(index);
            });
            $('#searchkd').focus();
            return false;
        }
        $('.search_form')[0].submit();
    });
</script>
</body>
</html>
