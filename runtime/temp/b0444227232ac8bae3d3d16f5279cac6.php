<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:86:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/index/index.html";i:1545115130;s:86:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/public/head.html";i:1532138656;s:88:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/public/header.html";i:1537319114;s:96:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/index-module/module_1.html";i:1532138656;s:96:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/index-module/module_2.html";i:1532138656;s:96:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/index-module/module_3.html";i:1532138656;s:96:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/index-module/module_4.html";i:1532138656;s:96:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/index-module/module_5.html";i:1532138656;s:88:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/public/footer.html";i:1537319148;s:85:"C:\Users\EDZ\Desktop\single.jzb.com\public/../application/mobile/view/public/nav.html";i:1532138656;}*/ ?>
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
<?php elseif($config['wap_nav_style'] == 2 or $config['wap_nav_style'] == 3): ?>
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
<section class="MainCon">	
	<script type="text/javascript" src="/static/mobile/js/flexible.js"></script>    
	<script type="text/javascript" src="/static/mobile/js/iscroll.js"></script>    
	<script type="text/javascript" src="/static/mobile/js/navbarscroll.js"></script>
	<?php if($index_cate): ?>
	<div class="menulist">
		<ul class="clearfix">
			<?php if(is_array($index_cate) || $index_cate instanceof \think\Collection || $index_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $index_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li>
				<a href="<?php echo $vo['url']; ?>">
					<span><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>"/></span>
					<p><?php echo $vo['title']; ?></p>
				</a>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<?php endif; if(is_array($module_list) || $module_list instanceof \think\Collection || $module_list instanceof \think\Paginator): $ml = 0; $__LIST__ = $module_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$module): $mod = ($ml % 2 );++$ml;?>
	<div class="area-content" id="index-module-<?php echo $ml; ?>" style="padding:<?php echo $module['topSpace']; ?>px 0 <?php echo $module['bottomSpace']; ?>px; <?php if($module['bgcolor']): ?>background-color:<?php echo $module['bgcolor']; ?>;<?php endif; if($module['photo']): ?>background-image:url('__UPLOAD_PATH__/<?php echo $module['photo']; ?>');<?php endif; ?>">
		<?php if($module['titleStyle'] == 1): ?>
		<div class="area-hd-1">
			<h3 class="iTit"><?php echo $module['title']; ?></h3>
		</div>
		<?php elseif($module['titleStyle'] == 2): ?>
		<div class="area-hd-2 clearfix">
			<h3 class="iTit"><?php echo $module['title']; ?></h3>
			<div class="hd">
				<ul>
					<?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
					<li><a href="<?php echo $tab_cate_name['url']; ?>"><?php echo $tab_cate_name['name']; ?></a><span></span></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<?php elseif($module['titleStyle'] == 3): ?>
		<div class="area-hd-3 clearfix">
			<?php if($module['titPic']): ?><h3><img src="__UPLOAD_PATH__/<?php echo $module['titPic']; ?>"></h3><?php endif; ?>
		</div>
		<?php endif; switch($module['module_style']): case "1": if($module['titleStyle'] == 2): ?>
    <div class="pic-list-panel clearfix">
        <div class="bd">
            <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
            <ul class="clearfix">
                <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listPic): $mod = ($i % 2 );++$i;?>
                <li style="width:<?php echo 100/$module['moduleParam'][1]-2; ?>%">
                    <p class="pic <?php if($module['moduleParam'][2]): ?>imgBd<?php endif; ?>"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $listPic['photo']; ?>" alt="<?php echo $listPic['title']; ?>"></a></p>
                    <?php if($module['moduleParam'][3]): ?>
                    <p class="tit"><a href="<?php echo $listPic['url']; ?>" target="_blank" title="<?php echo $listPic['title']; ?>"><?php echo leftstr($listPic['title'],$module['moduleParam'][4]); ?></a></p>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
<?php else: ?>
<div class="pic-list-panel clearfix">
    <div class="bd">
    <?php if($module['moduleParam'][5] == 0): ?><ul class="clearfix"><?php endif; if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listPic): $mod = ($i % 2 );++$i;if($module['moduleParam'][5] == 1 and ($module['moduleParam'][6] == 1 or $i%$module['moduleParam'][6] == 1)): ?><ul class="clearfix"><?php endif; ?>
            <li style="width:<?php echo 100/$module['moduleParam'][1]-2; ?>%">
                <p class="pic <?php if($module['moduleParam'][2]): ?>imgBd<?php endif; ?>"><a href="<?php echo $listPic['url']; ?>" title="<?php echo $listPic['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $listPic['photo']; ?>" alt="<?php echo $listPic['title']; ?>"></a></p>
                <?php if($module['moduleParam'][3]): ?>
                <p class="tit"><a href="<?php echo $listPic['url']; ?>" title="<?php echo $listPic['title']; ?>"><?php echo leftstr($listPic['title'],$module['moduleParam'][4]); ?></a></p>
                <?php endif; ?>
            </li>
            <?php if($module['moduleParam'][5] == 1 and ($module['moduleParam'][6] == 1 or $i%$module['moduleParam'][6] == 0 or $i == $module['art_list_cnt'])): ?></ul><?php endif; endforeach; endif; else: echo "" ;endif; if($module['moduleParam'][5] == 0): ?></ul><?php endif; ?>
    </div>
    <?php if($module['moduleParam'][7] == 1): ?>
    <div class="panel-list-tit">
        <ul></ul>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<script type="text/javascript">
    window.onload=function(){
        setPicHeight("#index-module-<?php echo $ml; ?> .pic-list-panel .pic");  //设置图片尺寸
    };
    <?php if($module['titleStyle'] == 2): ?>
        TouchSlide({
            slideCell:"#index-module-<?php echo $ml; ?>",
            mainCell:".pic-list-panel .bd",
            titCell:".area-hd-2 .hd li",
            autoPage:false,
            autoPlay:false,
            effect:"leftLoop",
            switchLoad:"_src"
        });
    <?php elseif($module['moduleParam'][5] == 1): ?>
        TouchSlide({
            slideCell:"#index-module-<?php echo $ml; ?>",
            mainCell:".pic-list-panel .bd",
            <?php if($module['moduleParam'][7] == 1): ?>
            titCell:".panel-list-tit ul",
            autoPage:true,
            <?php endif; ?>
            autoPlay:true,
            effect:"leftLoop",
            switchLoad:"_src"
        });
    <?php endif; ?>
</script><?php break; case "2": if($module['titleStyle'] == 2): ?>
    <div class="news-list-panel">
        <div class="bd">
            <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
                <ul>
                    <?php if(is_array($tab_cate_name['art_list']) || $tab_cate_name['art_list'] instanceof \think\Collection || $tab_cate_name['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_cate_name['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsList): $mod = ($i % 2 );++$i;?>
                    <li class="clearfix">
                        <?php if($module['moduleParam'][5]): ?>
                        <p class="pic <?php if($module['moduleParam'][6]): ?>imgBd<?php endif; ?>"><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $newsList['photo']; ?>"  alt="<?php echo $newsList['title']; ?>"></a></p>
                        <?php elseif($module['moduleParam'][2]): ?>
                        <p class="time"><?php echo date("m-d",$newsList['create_time']); ?><span><?php echo date("Y",$newsList['create_time']); ?></span></p>
                        <?php endif; ?>
                        <h4><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>" target="_blank"><?php echo leftstr($newsList['title'],$module['moduleParam'][1]); ?></a></h4>
                        <?php if($module['moduleParam'][3]): ?>
                        <div class="i"><?php echo leftstr_html($newsList['content'],$module['moduleParam'][4]); ?></div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
<?php else: ?>
<div class="news-list-panel">
    <div class="bd">
        <?php if($module['moduleParam'][7] == 0): ?><ul><?php endif; if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsList): $mod = ($i % 2 );++$i;if($module['moduleParam'][7] == 1 and ($module['moduleParam'][8] == 1 or $i%$module['moduleParam'][8] == 1)): ?><ul class="clearfix"><?php endif; ?>
                <li class="clearfix">
                    <?php if($module['moduleParam'][5]): ?>
                    <p class="pic <?php if($module['moduleParam'][6]): ?>imgBd<?php endif; ?>"><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $newsList['photo']; ?>"  alt="<?php echo $newsList['title']; ?>"></a></p>
                    <?php elseif($module['moduleParam'][2]): ?>
                    <p class="time"><?php echo date("m-d",$newsList['create_time']); ?><span><?php echo date("Y",$newsList['create_time']); ?></span></p>
                    <?php endif; ?>
                    <h4><a href="<?php echo $newsList['url']; ?>" title="<?php echo $newsList['title']; ?>" target="_blank"><?php echo leftstr($newsList['title'],$module['moduleParam'][1]); ?></a></h4>
                    <?php if($module['moduleParam'][3]): ?>
                    <div class="i"><?php echo leftstr_html($newsList['content'],$module['moduleParam'][4]); ?></div>
                    <?php endif; ?>
                </li>
                <?php if($module['moduleParam'][7] == 1 and ($module['moduleParam'][8] == 1 or $i%$module['moduleParam'][8] == 0 or $i == $module['art_list_cnt'])): ?></ul><?php endif; endforeach; endif; else: echo "" ;endif; if($module['moduleParam'][7] == 0): ?></ul><?php endif; ?>
    </div>
    <?php if($module['moduleParam'][9] == 1): ?>
    <div class="panel-list-tit">
        <ul></ul>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<script type="text/javascript">
    <?php if($module['titleStyle'] == 2): ?>
    TouchSlide({
        slideCell:"#index-module-<?php echo $ml; ?>",
        mainCell:".news-list-panel .bd",
        titCell:".area-hd-2 .hd li",
        autoPage:false,
        autoPlay:false,
        effect:"leftLoop",
        switchLoad:"_src"
    });
    <?php elseif($module['moduleParam'][7] == 1): ?>
    TouchSlide({
        slideCell:"#index-module-<?php echo $ml; ?>",
        mainCell:".news-list-panel .bd",
        <?php if($module['moduleParam'][9] == 1): ?>
        titCell:".panel-list-tit ul",
        autoPage:true,
        <?php endif; ?>
        autoPlay:true,
        effect:"leftLoop",
        switchLoad:"_src"
        });
        <?php endif; ?>
</script><?php break; case "3": if($module['titleStyle'] == 2): ?>
    <div class="pic-txt-panel clearfix">
        <ul>
            <?php if(is_array($module['cate_article_list']) || $module['cate_article_list'] instanceof \think\Collection || $module['cate_article_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['cate_article_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab_cate_name): $mod = ($i % 2 );++$i;?>
            <li class="clearfix">
                <?php if($tab_cate_name['art_list']): if($module['moduleParam'][2]): ?>
                    <p class="pic <?php if($module['moduleParam'][4]=='left'): ?>fl<?php elseif($module['moduleParam'][4]=='right'): ?>fr<?php endif; ?>"><a href="<?php echo $tab_cate_name['art_list']['url']; ?>" title="<?php echo $tab_cate_name['art_list']['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $tab_cate_name['art_list']['photo']; ?>" <?php if($module['moduleParam'][3]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $tab_cate_name['art_list']['title']; ?>"></a></p>
                    <?php endif; ?>
                    <div class="txt">
                        <div class="info"><?php echo leftstr_html($tab_cate_name['art_list']['content'],$module['moduleParam'][0]); ?></div>
                    </div>
                    <?php if($module['moduleParam'][1]): ?>
                    <p class="detail"><a href="<?php echo $tab_cate_name['art_list']['url']; ?>">查看更多 +</a></p>
                    <?php endif; endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <script type="text/javascript">
        TouchSlide({
            slideCell:"#index-module-<?php echo $ml; ?>",
            mainCell:".pic-txt-panel ul",
            titCell:".area-hd-2 .hd li",
            autoPage:false,
            autoPlay:false,
            effect:"leftLoop",
            switchLoad:"_src"
        });
    </script>
<?php else: ?>
<div class="pic-txt-panel clearfix">
    <ul>
        <li class="clearfix">
            <?php if($module['art_list']): if($module['moduleParam'][2]): ?>
                <p class="pic <?php if($module['moduleParam'][4]=='left'): ?>fl<?php elseif($module['moduleParam'][4]=='right'): ?>fr<?php endif; ?>"><a href="<?php echo $module['art_list']['url']; ?>" title="<?php echo $module['art_list']['title']; ?>"><img src="__UPLOAD_PATH__/<?php echo $module['art_list']['photo']; ?>" <?php if($module['moduleParam'][3]): ?>class="imgBd"<?php endif; ?> alt="<?php echo $module['art_list']['title']; ?>"></a></p>
                <?php endif; ?>
                <div class="txt">
                    <div class="info"><?php echo leftstr_html($module['art_list']['content'],$module['moduleParam'][0]); ?></div>
                </div>
                <?php if($module['moduleParam'][1]): ?>
                <p class="detail"><a href="<?php echo $module['art_list']['url']; ?>">查看更多 +</a></p>
                <?php endif; endif; ?>
        </li>
    </ul>
</div>
<?php endif; break; case "4": ?><div class="content-panel">
    <?php echo $module['module_content']; ?>
</div><?php break; case "5": ?><div class="focus-pic-panel">
    <div class="bd">
        <ul>
            <?php if(is_array($module['art_list']) || $module['art_list'] instanceof \think\Collection || $module['art_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['art_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$itemPic): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo !empty($itemPic['website'])?$itemPic['website']:'javascript:;'; ?>"><img src="__UPLOAD_PATH__/<?php echo $itemPic['photo']; ?>"/></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php if($module['moduleParam'][4] == 1): ?>
    <div class="panel-list-tit">
        <ul></ul>
    </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    TouchSlide({
        slideCell:"#index-module-<?php echo $ml; ?>",
        mainCell:".bd ul",
        <?php if($module['moduleParam'][4] == 1): ?>
        titCell:".panel-list-tit ul",
        autoPage:true,
        <?php endif; ?>
        effect:"leftLoop",
        autoPlay:<?php echo !empty($module['moduleParam'][1])?'true':'false'; ?>,
        delayTime:<?php echo $module['moduleParam'][2]; ?>,
        interTime:<?php echo $module['moduleParam'][3]; ?>,
        switchLoad:"_src" //切换加载，真实图片路径为"_src"
    });
</script><?php break; default: ?>模板文件不存在
		<?php endswitch; ?>
	</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</section>
<!--footer-->
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
<?php elseif($config['wap_nav_style'] == 3): ?>
<div class="fixBox2">
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