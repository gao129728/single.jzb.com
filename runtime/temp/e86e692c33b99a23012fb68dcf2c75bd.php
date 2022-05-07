<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/www/wwwroot/baimusen.cn/public/../application/admin/view/login.html";i:1534908912;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit"> 
    <title>后台登录</title>
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css" rel="stylesheet">
    <link href="__CSS__/login.min.css" rel="stylesheet">
    <!--极验验证需要引入的两个JS-->
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script src="http://static.geetest.com/static/tools/gt.js"></script>
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
</head>

<body class="signin">
<div class="header-top">
	<div class="pull-left"><img src="/static/admin/images/hlogo.png"/></div>
	<a href="http://hfcfwl.com/" target="_blank" class="pull-right">晨飞官网</a>
</div>
<div class="sign-box clearfix">
	<div class="txt-box pull-left ">
		<div class="tit"><img src="/static/admin/images/txt-bg.png"/></div>
		<p>依托网络营销主流三大模式：搜索引擎营销，社交化媒体营销，门户网站营销，
为客户提供策划、推广、运营与一体的互联网整合营销、品牌塑造解决方案。打
造中国知名、安徽领先的一站式网络整合营销服务商！</p>
	</div>
	<div class="signinpanel pull-right">
	    <form id="doLogin" name="doLogin" method="post" action="<?php echo url('doLogin'); ?>">
	        <p class="signup-header">网站后台登录</p>
	        <input type="text" class="form-control uname" placeholder="用户名" id="username" name="username" />
	        <input type="password" class="form-control pword m-b" placeholder="登录密码" id="password" name="password" />
	        <?php if(config('verify_type') == 1): ?>
	            <div class="clearfix">
	                <input type="text" class="form-control" placeholder="验证码" style="color:black;width:190px;float:left;margin:0px 0px;" name="code" id="code"/>
	                <img class="code_img" src="<?php echo url('checkVerify'); ?>" onclick="javascript:this.src='<?php echo url('checkVerify'); ?>?tm='+Math.random();" style="float:right;cursor: pointer;"/>
	            </div>
	        <?php else: ?>
	            <div id="embed-captcha"></div>
	            <p id="wait">正在加载验证码......</p>
	        <?php endif; ?>
	        <button type="submit" class="btn btn-primary btn-block">登　录</button>

	        <div class="login-tip">
		    	<p><span>温馨提示：</span>如忘记登录密码，可向晨飞客服咨询哦！</p>
				<p><span>咨询热线：400-800-7469</span></p>
		    </div>
	    </form>
	    
	</div>
</div>
<div class="footer-fix">
	<p><a href="http://hfcfwl.com/" target="_blank">晨飞科技_一站式网络整合营销服务商</a>　 法律顾问：王利民律师　<a href="http://hfcfwl.com/" target="_blank">合肥做网站</a> <a href="https://hfcfwl.com/case.php" target="_blank">合肥网站建设</a> 
		<a href="https://hfcfwl.com/sem_tg.php?class_id=112101" target="_blank">合肥网络推广</a> <a href="http://hfcfwl.com/" target="_blank">合肥网络公司</a>  <a href="http://wyx.hfcfwl.com/" target="_blank">合肥微信开发</a></p>
</div>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/jquery.form.js"></script>
<script src="__JS__/layer/layer.js"></script>
 <script>
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "<?php echo url('Admin/Login/getVerify',array('t'=>time())); ?>", // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "float", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
            }, handlerEmbed);
        }
    });


    $(function(){
        $('#doLogin').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#username').val())){
                layer.msg('请输入登录用户名', {icon: 5,time:2000}, function(index){
                    layer.close(index);
                });
                return false;
            }

            if( '' == $.trim($('#password').val())){
                layer.msg('请输入登录密码', {icon: 5,time:2000}, function(index){
                    layer.close(index);
                });
                return false;
            }

            $("button").removeClass('btn-primary').addClass('btn-danger').text("登录中...");
        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:2000}, function(index){
                    layer.close(index);
                    window.location.href=data.url;
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:2000}, function(index){
                    layer.close(index);
                });
                $("button").removeClass('btn-danger').addClass('btn-primary').text("登　录");
                $('.code_img').click();
                return false;
            }
        }
    });
</script>
</body>
</html>