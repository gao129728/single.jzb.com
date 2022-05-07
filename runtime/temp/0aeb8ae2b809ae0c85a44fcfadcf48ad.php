<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/index/index.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<style type="text/css">
    .ibox{margin-bottom: 20px;}
    .panel-body{padding-bottom:5px;}
    .panel-body p{margin-bottom:10px; font-size: 13px;}
    .panel-body a{color: #337ab7;}
</style>
<div class="wrapper wrapper-content">
    <!-- 上方tab -->
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-web-number clearfix">
                    <a href="<?php echo url('article/index_cate'); ?>" class="clearfix">
                        <div class="pull-left">
                            <h1 class="no-margins"><?php echo $all_cate_cnt; ?></h1>
                            <small>栏目分类</small>
                        </div>
                        <div class="pull-right"><img src="__IMG__/img1.png"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-web-number">
                    <a href="<?php echo url('article/index'); ?>" class="clearfix">
                        <div class="pull-left">
                            <h1 class="no-margins"><?php echo $all_article_cnt; ?></h1>
                            <small>所有内容</small>
                        </div>
                        <div class="pull-right"><img src="__IMG__/img2.png"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox-web-number">
                <a href="<?php echo url('apply/message'); ?>" class="clearfix">
                    <div class="pull-left">
                        <h1 class="no-margins"><?php echo $all_message_cnt; ?></h1>
                        <small>客户留言</small>
                    </div>
                    <div class="pull-right"><img src="__IMG__/img3.png"></div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox-web-number">
                <a href="<?php echo url('counter/index'); ?>" class="clearfix">
                    <div class="pull-left">
                        <h1 class="no-margins"><?php echo $all_counter_cnt; ?></h1>
                        <small>网站访问量</small>
                    </div>
                    <div class="pull-right"><img src="__IMG__/img4.png"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-counter ibox">
                <div class="counter-tit">
                    <p>最近12天访问统计</p>
                    <h4>访问统计</h4>
                </div>
                <div class="counter-chart">
                    <canvas id="lineChart" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- 中间折线 -->
    <div class="index_news ibox-counter">
    <div class="row">
        <div class="col-sm-6">
        	<div class="ibox float-e-margins line-green">
                <div class="ibox-title">
                    <i class="fa fa-cogs"></i> 系统信息
                </div>
                <div class="ibox-content no-padding">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-sitemap"></i> 系统类型：<?php echo $info['web_system']; ?>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-windows"></i> 服务环境：<?php echo $info['web_server']; ?>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-warning"></i> 上传附件限制：<?php echo $info['onload']; ?>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-credit-card"></i> PHP 版本：<?php echo $info['phpversion']; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        	<div class="ibox float-e-margins line-blue">
                <div class="ibox-title">
                    <i class="fa fa-cogs"></i> 站点信息
                </div>
                <div class="ibox-content no-padding">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-desktop"></i> 网站名称：<?php echo $website['web_name']; ?></a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-support"></i> 网站域名：<a href="<?php echo $website['web_domain']; ?>" target="_blank"><?php echo $website['web_domain']; ?></a></a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-user-circle"></i> 登录用户：<?php echo $username; ?></a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-clock-o"></i> 登录时间：<?php echo date("Y-m-d H:i:s",$login_time); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
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
<script src="__JS__/plugins/chartJs/Chart.min.js"></script>
<script>
    $(function(){
        var chart_date=<?php echo $chart_date; ?>;
        var  labels = [
            <?php if(is_array($chart_date) || $chart_date instanceof \think\Collection || $chart_date instanceof \think\Paginator): $i = 0; $__LIST__ = $chart_date;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <?php echo !empty($i) && $i==1?'':','; ?>"<?php echo $vo['date']; ?>"
            <?php endforeach; endif; else: echo "" ;endif; ?>
        ];
        var  data = [
            <?php if(is_array($chart_date) || $chart_date instanceof \think\Collection || $chart_date instanceof \think\Paginator): $i = 0; $__LIST__ = $chart_date;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <?php echo !empty($i) && $i==1?'':','; ?>"<?php echo $vo['val']; ?>"
            <?php endforeach; endif; else: echo "" ;endif; ?>
        ];
        var lineData = {
            labels: labels,
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: data
                }
            ]
        };

        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true
        };

        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
    });
</script>

</body>
</html>