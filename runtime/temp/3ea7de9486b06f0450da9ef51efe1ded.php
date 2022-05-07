<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\php\single.jzb.com\public/../application/admin/view/connector/sitemap.html";i:1532138656;s:73:"E:\php\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:73:"E:\php\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理中心</title>
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.7.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/static/admin/js/plugins/layui/css/layui.css" rel="stylesheet">
    <link href="/static/admin/css/lc_switch.css" rel="stylesheet">
    <link href="/static/admin/css/common.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/admin/js/plugins/jquery-ui/jquery-ui.css" />
    <style type="text/css">
    .long-tr th{
        text-align: center
    }
    .long-td td{
        text-align: center
    }
    </style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>SEO优化</h5>
        </div>
        <div class="ibox-content">        
            <div class="article-box">
                <p>您的网站Sitemap地址： 仅对绑定了独立域名的用户开放！</p>
                <h3 class="ztit">第一步：登录百度站长平台</h3>
                <p class="blue">网址是: <a href="http://zhanzhang.baidu.com " target="_blank">http://zhanzhang.baidu.com </a>没有注册就注册下。 登录后点击“开始使用站长工具”</p>
                <div class="imgbox"><img src="__IMG__/seo/img1.jpg"/></div>
                <h3 class="ztit">第二步：增加网站验证</h3>
                <div class="imgbox"><img src="__IMG__/seo/img2.jpg"/></div>
                <h3 class="ztit">第三步：网站验证</h3>
                <p>他会提供三种验证方式</p>
                <p>1 下载html到你的网站根目录（优势是：不关你将来换不换网站代码，都不会丢失验证。劣势：需要连接你的服务器,有点小麻烦)</p>
                <p>2 HTML标签验证(优势：是方便，在首页增加一行代码就可以了。劣势：换网站框架代码了要重新加上)</p>
                <p>3 CNAME 这个是二级域名解析指向(优势：和第一条差不多。劣势：换IP了要重新解析)</p>
                <p>解析可以参照参考资料中的【如何在dnspod上解析域名】</p>
                <div class="imgbox"><img src="__IMG__/seo/img3.jpg"/></div>
                <h3 class="ztit">第四步：操作完，点击完成验证</h3>
                <div class="imgbox"><img src="__IMG__/seo/img4.jpg"/></div>
                <h3 class="ztit">第五步：提交SITEMAP</h3>
                <div class="col-sm-12" style="padding-left:0;">
                    <div class="col-sm-4" style="padding-left:0;">
                        <p>点击站点信息，网页抓取连接提交，这里点击详细</p>
                        <div class="imgbox">
                            <img src="__IMG__/seo/img5.jpg"/>
                        </div>
                    </div>
                    <div class="col-sm-6" style="padding-left:0;">
                        <p>页面的下部，找到sitemap提交，在这里输出您的sitemap <a class="blue" href="http://392753837.pc.goabc.cn/392753837/sitemap.xml" target="_blank">地址：http://392753837.pc.goabc.cn/392753837/sitemap.xml</a></p>
                        <div class="imgbox">
                            <img src="__IMG__/seo/img6.jpg"/>
                        </div>
                    </div>
                </div>
                <h3 class="ztit">第六步：提交成功，恭喜您操作完成</h3>
                <p>添加成功</p>
                <div class="imgbox">
                    <img src="__IMG__/seo/img7.jpg"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Panel Other -->

<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/chosen/chosen.jquery.js"></script>
<script src="__JS__/plugins/iCheck/icheck.min.js"></script>
<script src="__JS__/plugins/layer/laydate/laydate.js"></script>
<script src="__JS__/jquery.form.js"></script>
<script src="__JS__/layer/layer.js"></script>
<script src="__JS__/laypage/laypage.js"></script>
<script src="__JS__/laytpl/laytpl.js"></script>
<script src="__JS__/plugins/layui/layui.js"></script>
<script src="__JS__/previewImage.js"></script>
<script src="__JS__/lc_switch.js"></script>
<script src="__JS__/common.js"></script>
<script>
    $(document).ready(function(){
        $(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green"});
        $('.lcs_check').lc_switch();
    });
</script>

</body>
</html>