<?php if (!defined('THINK_PATH')) exit(); /*a:11:{s:81:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/category/index.html";i:1532138656;s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/head.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/header.html";i:1532138656;s:82:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/sub_menu.html";i:1532138656;s:87:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/cate-module/module_0.html";i:1532138656;s:87:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/cate-module/module_1.html";i:1532138656;s:87:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/cate-module/module_2.html";i:1532138656;s:87:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/cate-module/module_3.html";i:1532138656;s:87:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/cate-module/module_4.html";i:1532138656;s:80:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/footer.html";i:1532138656;s:77:"/www/wwwroot/jzb.ahcfwl.com/public/../application/mobile/view/public/nav.html";i:1532138656;}*/ ?>
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
<div class="homebody <?php if($cate['cateStyle'] == 0 and $cateParam == 1): ?>full-container<?php endif; ?>">
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
	<div class="MainCon">
		<div class="box-wrap">
			<?php switch($cate['cateStyle']): case "0": if($lists['content']): ?>
<div class="article_content">
    <?php echo $lists['content']; ?>
</div>
<?php else: ?>
<div class="no-msg-tip">
    <img src="__IMG__/no-msg-img.png" />
    <p>暂无信息</p>
</div>
<?php endif; break; case "1": if($lists): ?>
<div class="newsList">
    <ul>
        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <li>
            <h4><a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>"><?php echo leftstr($item['title'],$cateParam[1]); ?></a></h4>
            <?php if($cateParam[2]): ?>
            <div class="info"><?php echo leftstr_html($item['content'],$cateParam[3]); ?></div>
            <div class="i"><i class="iconfont icon-shijian"></i> 发表时间：<?php echo date("Y-m-d",$item['create_time']); ?> <span><i class="iconfont icon-liulan"></i> 浏览次数： <?php echo $item['views']; ?></span></div>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="page"><?php echo $lists->render(); ?></div>
<?php else: ?>
<div class="no-msg-tip">
    <img src="__IMG__/no-msg-img.png" />
    <p>暂无信息</p>
</div>
<?php endif; break; case "2": if($lists): ?>
<div class="picList">
    <ul class="clearfix">
        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <li style="width:<?php echo 100/$cateParam[1]-2; ?>%">
            <div class="pic <?php if($cateParam[3]): ?>imgBd<?php endif; ?>">
                <?php if($item['photo'] != ''): ?>
                <a href="<?php echo $item['url']; ?>"><img src="__UPLOAD_PATH__/<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>" /></a>
                <?php else: ?>
                <div class="noPic-box">
                    <div class="img"><i class="iconfont icon-tupian"></i><p>暂无图片</p></div>
                </div>
                <?php endif; ?>
            </div>
            <p class="tit"><a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>"><?php echo leftstr($item['title'],$cateParam[2]); ?></a></p>
            <?php if($cateParam[4]): ?>
            <div class="info"><?php echo leftstr_html($item['content'],$cateParam[5]); ?></div>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<script type="text/javascript">
    window.onload=function(){
        setPicHeight(".picList .pic");  //设置图片尺寸
        var img_ht = $('.picList .pic img').height();
        $('.noPic-box').height(img_ht);
    }
</script>
<div class="page"><?php echo $lists->render(); ?></div>
<?php else: ?>
<div class="no-msg-tip">
    <img src="__IMG__/no-msg-img.png" />
    <p>暂无信息</p>
</div>
<?php endif; break; case "3": if($lists): ?>
<div class="picTxt">
    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
    <div class="list-item clearfix">
        <div class="pic <?php if($cateParam[3]): ?>imgBd<?php endif; ?>">
            <?php if($item['photo'] != ''): ?>
            <a href="<?php echo $item['url']; ?>"><img src="__UPLOAD_PATH__/<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>" /></a>
            <?php else: ?>
            <div class="noPic-box">
                <div class="img"><i class="iconfont icon-tupian"></i><p>暂无图片</p></div>
            </div>
            <?php endif; ?>
        </div>
        <div class="txt">
            <h4><a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>"><?php echo leftstr($item['title'],$cateParam[1]); ?></a></h4>
            <div class="info"><?php echo leftstr_html($item['content'],$cateParam[2]); ?></div>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="page"><?php echo $lists->render(); ?></div>
<?php else: ?>
<div class="no-msg-tip">
    <img src="__IMG__/no-msg-img.png" />
    <p>暂无信息</p>
</div>
<?php endif; break; case "4": ?><div class="article_content">
    <?php echo $lists['content']; ?>
</div>
<script src="__JS__/jquery.form.js"></script>
<?php if($cateParam == 0): ?>
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
<?php elseif($cateParam == 1): ?>
<link href="__JS__/iCheck/custom.css" rel="stylesheet" type="text/css" />
<script src="__JS__/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $(".i-checks").iCheck({radioClass:"iradio_square-green"});
    });
</script>
<div class="form-area">
    <h3>在线应聘</h3>
    <form action="<?php echo url('mobile/form/job'); ?>" method="post" id="job">
        <input type="hidden" name="cateId" value="<?php echo $cate['id']; ?>">
        <ul class="clearfix">
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
                <input name="email" type="text" maxlength="50" class="text"/>
            </li>
            <li class="clearfix">
                <span>性别：</span>
                <div class="sex_box">
                    <div class="sex-sel on">
                        <input type="radio" name="sex" value="男" checked />
                        男性
                    </div>
                    <div class="sex-sel">
                        <input type="radio" name="sex" value="女" />
                        女性
                    </div>
                </div>
            </li>
            <li class="clearfix">
                <span>年龄：</span>
                <input name="age" type="text"  maxlength="2" class="text" />
            </li>
            <li class="clearfix">
                <span>毕业院校：</span>
                <input name="college" type="text" class="text"/>
            </li>
            <li class="clearfix">
                <span>毕业时间：</span>
                <input name="graduate_time" type="text"  class="text"/>
            </li>
            <li class="clearfix">
                <span>个人履历：</span>
                <textarea name="resumes" class="textarea wd1"></textarea>
            </li>
            <li class="clearfix">
                <span>自我评价：</span>
                <textarea name="appraise" class="textarea wd1"></textarea>
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
    $('#job')[0].reset();
    $(".sex_box .sex-sel").click(function(){
        $(this).addClass('on').siblings().removeClass('on');
        $(this).find('input').prop('checked', true);
        $(this).siblings().find('input').prop('checked', false);
    });
    $(function(){
        $('#job').ajaxForm({
            success: complete,
            dataType: 'json'
        });
        function complete(data){
            if(data.code == 1){
                layer.open({content: data.msg, btn:'确定', yes:function(index){
                        layer.close(index);
                        $('#job')[0].reset();
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
<?php elseif($cateParam == 2): ?>
<div class="form-area">
    <form action="<?php echo url('mobile/form/apply'); ?>" method="post" id="apply">
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
                <span><em>*</em>所在地区：</span>
                <input name="area" id="area" type="text" readonly="readonly" class="text"/>
            </li>
            <li class="clearfix">
                <span>详细地址：</span>
                <input name="address" type="text" class="text"/>
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
                <input name="code" type="text" size="8" maxlength="4" class="text" />
                <img src="<?php echo url('form/code_img'); ?>" class="codeImg" onclick="this.src='<?php echo url('form/code_img'); ?>?time='+Math.random();" alt="看不清,请单击"/>
            </li>
            <li class="clearfix input-btn">
                <input type="submit" value="提交" class="submitBtn" />
                <input type="reset" value="重置" class="resetBtn" />
            </li>
        </ul>
    </form>
</div>
<link rel="stylesheet" href="__JS__/LArea/LArea.min.css">
<script src="__JS__/LArea/LAreaData1.js"></script>
<script src="__JS__/LArea/LArea.min.js"></script>
<script type="text/javascript">
    $('#apply')[0].reset();
    var area1 = new LArea();
    area1.init({
        'trigger': '#area', //触发选择控件的文本框，同时选择完毕后name属性输出到该位置
        'keys': {
            id: 'id',
            name: 'name'
        }, //绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
        'type': 1, //数据源类型
        'data': LAreaData //数据源
    });
    $(function(){
        $('#apply').ajaxForm({
            success: complete,
            dataType: 'json'
        });
        function complete(data){
            if(data.code == 1){
                layer.open({content: data.msg, btn:'确定', yes:function(index){
                        layer.close(index);
                        $('#apply')[0].reset();
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
<?php endif; break; default: ?>模板文件不存在
			<?php endswitch; ?>
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
