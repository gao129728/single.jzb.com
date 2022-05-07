<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/website/inside.html";i:1534989504;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    .radio{position:relative; display: inline-block; padding-right:20px;}
    .radio .group_item{float:left; white-space: nowrap; padding-right:30px;}
    .member_group .help-question{margin-top:-8px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>内页配置</h5>
                </div>
                <div class="ibox-content">       
                    <div class="panel blank-panel">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li <?php if($nav_menu == 'inside'): ?>class="active"<?php endif; ?>><a href="<?php echo url('website/inside'); ?>">基本设置</a></li>
                                <li <?php if($nav_menu == 'sidebar'): ?>class="active"<?php endif; ?>><a href="<?php echo url('sidebar/index'); ?>">侧边栏设置</a></li>
                            </ul>
                        </div>
                        <form action="<?php echo url('inside_save'); ?>" method="post" class="form-horizontal" id="config">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">子级导航位置：</label>
                                        <div class="col-sm-10 input-group">
                                            <div class="radio i-checks clearfix">
                                                <span class="group_item"><input type="radio" name='config[web_menu_style]' value="1" <?php if($config['web_menu_style'] == 1): ?>checked<?php endif; ?>/>左侧显示</span>
                                                <span class="group_item"><input type="radio" name='config[web_menu_style]' value="2" <?php if($config['web_menu_style'] == 2): ?>checked<?php endif; ?>/>右侧显示</span>
                                                <span class="group_item"><input type="radio" name='config[web_menu_style]' value="3" <?php if($config['web_menu_style'] == 3): ?>checked<?php endif; ?>/>顶部显示</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类页侧边栏：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[cate_sidebar_style]" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($config['cate_sidebar_style'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">详情页侧边栏：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[detail_sidebar_style]" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($config['detail_sidebar_style'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">产品详情咨询qq：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control input_wd2" name="config[web_site_qq]" value="<?php echo $config['web_site_qq']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2 button-group">
                                    <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </form>
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
<script type="text/javascript">
    $(function(){
        $('#config').ajaxForm({
            //beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function complete(data){
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    location.reload();
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }
    });
</script>
</body>
</html>
