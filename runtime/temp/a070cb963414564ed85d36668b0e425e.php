<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/ad/edit_ad.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<style>
.file-item{float: left; position: relative; width: 110px;height: 110px; margin: 0 20px 20px 0; padding: 4px;}
.file-item .info{overflow: hidden;}
.uploader-list{width: 100%; overflow: hidden;}
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-title-goback">
                        <a href="javascript:history.back();"><i class="fa fa-reply"></i> 返回</a>
                    </div>
                    <h5>编辑广告</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" name="edit" id="edit" method="post" action="edit_ad" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $ad['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题：</label>
                            <div class="input-group col-sm-4">
                                <input id="title" type="text" class="form-control" value="<?php echo $ad['title']; ?>" name="title" placeholder="请输入广告标题">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序：</label>
                            <div class="input-group col-sm-4">
                                <input id="orderby" type="text" value="<?php echo $ad['orderby']; ?>" class="form-control input_wd1" name="orderby" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">链接地址：</label>
                            <div class="input-group col-sm-4">
                                <input id="link_url" type="text" class="form-control" value="<?php echo $ad['link_url']; ?>" name="link_url" placeholder="请输入广告链接地址">
                            </div>
                        </div>
                       <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告图片：</label>
                            <div class="input-group col-sm-4">
                                <div class="uploadImg-box">
                                    <input type="file" name="photo" id="photo" class="imgFile" onchange="previewImage(this)"/>
                                    <div class="up-img <?php if($ad['photo'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                    <?php if($ad['photo'] != ''): ?>
                                    <input type="checkbox" name="delPhoto" class="input-del" value="1" />
                                    <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $ad['photo']; ?>"/></div>
                                    <?php endif; ?>
                                    <div class="uploadCover">
                                        <div class="ulinfo clearfix">
                                            <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                            <span class="up-del"><i class="fa fa-close"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">图片尺寸：</label>
                            <div class="input-group col-sm-10">
                                <span class="control-label" style="float:left;">宽度</span>
                                <div class="col-sm-1 input_wd3">
                                    <input type="text" class="form-control" name="width" id="width" value="<?php echo $ad['width']; ?>">
                                    <span class="tp-unit">px</span>
                                </div>
                                <span class="control-label" style="float:left; padding-left:60px;">高度</span>
                                <div class="col-sm-1 input_wd3">
                                    <input type="text" class="form-control" name="height" id="height" value="<?php echo $ad['height']; ?>">
                                    <span class="tp-unit">px</span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告日期：</label>
                            <div class="input-group col-sm-4" style="width:446px;">
                                <input type="text" class="form-control input_wd2 select-date" name="start_date" id="start_date" value="<?php echo !empty($ad['start_date'])?$ad['start_date']:''; ?>" readonly="readonly" style="background:url(__IMG__/WdatePicker.jpg) no-repeat 97% center">
                                <span style="float:left; line-height:30px; padding:0 10px; color:#999;">—</span>
                                <input type="text" class="form-control input_wd2 select-date" name="end_date" id="end_date" value="<?php echo !empty($ad['end_date'])?$ad['end_date']:''; ?>" readonly="readonly" style="background:url(__IMG__/WdatePicker.jpg) no-repeat 97% center">
                                <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="日期不填则永久有效"><i class="fa fa-question-circle-o"></i></a></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">显示方式：</label>
                            <div class="col-sm-6 input-group">
                                <div class="radio i-checks">
                                    <input type="radio" name='ad_position' value="0" <?php if($ad['ad_position'] == 0): ?>checked<?php endif; ?>/>首页显示&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='ad_position' value="1" <?php if($ad['ad_position'] == 1): ?>checked<?php endif; ?>/>全部页面显示
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">显示关闭按钮：</label>
                            <div class="col-sm-6 input-group">
                                <input type="checkbox" name="closed" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($ad['closed'] == 1): ?>checked<?php endif; ?>/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告类型：</label>
                            <div class="col-sm-6 input-group">
                                <div class="radio i-checks">
                                    <input type="radio" name='mode' value="popup" <?php if($ad['mode'] == 'popup'): ?>checked<?php endif; ?>/>弹窗广告&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='mode' value="float" <?php if($ad['mode'] == 'float'): ?>checked<?php endif; ?>/>全屏漂浮广告&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='mode' value="hangL" <?php if($ad['mode'] == 'hangL'): ?>checked<?php endif; ?>/>左侧浮动广告&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='mode' value="hangR" <?php if($ad['mode'] == 'hangR'): ?>checked<?php endif; ?>/>右侧浮动广告&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='mode' value="pullScreen" <?php if($ad['mode'] == 'pullScreen'): ?>checked<?php endif; ?>/>拉屏广告
                                </div>
                            </div>
                        </div>
                        <div class="top-left-aside <?php if($ad['mode'] == 'popup' or $ad['mode'] == 'pullScreen'): ?>hidden-box<?php endif; ?>">
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">顶部距离：</label>
                                <div class="col-sm-1 input_wd3" style="padding-left:0;">
                                    <input id="asidetop" type="text" value="<?php echo $ad['asidetop']; ?>" class="form-control" name="asidetop" >
                                    <span class="tp-unit">px</span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">侧边距离：</label>
                                <div class="col-sm-1 input_wd3" style="padding-left:0;">
                                    <input id="asideleft" type="text" value="<?php echo $ad['asideleft']; ?>" class="form-control" name="asideleft" >
                                    <span class="tp-unit">px</span>
                                </div>
                            </div>
                        </div>
                        <div class="pull-screen-time <?php if($ad['mode'] != 'pullScreen'): ?>hidden-box<?php endif; ?>">
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">拉屏时间：</label>
                                <div class="col-sm-1 input_wd3" style="padding-left:0;">
                                    <input id="screen_time" type="text" value="<?php echo $ad['screen_time']; ?>" class="form-control" name="screen_time">
                                    <span class="tp-unit">秒</span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">状&nbsp;态：</label>
                            <div class="col-sm-6 input-group">
                                <input type="checkbox" name="status" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($ad['status'] == 1): ?>checked<?php endif; ?>/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2 button-group">
                                <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.back();"><i class="fa fa-close"></i> 返回</a>
                            </div>
                        </div>
                    </form>
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
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        lay('.select-date').each(function(){
            laydate.render({
                elem: this,
                trigger: 'click'
            });
        });
    });
    $('input[name="mode"]').on('ifChecked', function(event){
        var val = $(this).val();
        if(val == 'float' || val == 'hangL' || val == 'hangR'){
            $('.top-left-aside').show();
        }else{
            $('.top-left-aside').hide();
        }
        if(val == 'pullScreen'){
            $('.pull-screen-time').show();
        }else {
            $('.pull-screen-time').hide();
        }

    });
    $(function(){
        $('#edit').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#title').val())){
                layer.msg('标题不能为空', {icon: 5}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if ($.trim($('#orderby').val()) == '' || $.trim($('#orderby').val()).match(/\D/))
            {
                layer.msg('请输入合法的序号', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if($('.uploadImg-box .imgView').length < 1){
                layer.msg('请上传广告图片', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if($('#photo').val() != ''){
                var ext = $('#photo').val().substr($('#photo').val().length - 3).toLowerCase();
                if (ext != "gif" && ext != "jpg" && ext != "png")
                {
                    layer.msg('图片必须是GIF、JPG或PNG格式！', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
            if(!isPositiveNum($('#width').val()) || !isPositiveNum($('#height').val())){
                layer.msg('请输入正确的图片尺寸', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if($('#start_date').val() == '' && $('#end_date').val() != ''){
                layer.msg('请输入开始日期', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if($('#start_date').val() != '' && $('#end_date').val() == ''){
                layer.msg('请输入结束日期', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if(!isPositiveNum($('#asidetop').val()) || !isPositiveNum($('#asideleft').val())){
                layer.msg('请输入正确的顶部或侧边距离', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if(!isPositiveNum($('#screen_time').val())){
                layer.msg('请输入正确的拉屏时间', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }

        function complete(data){
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.href="<?php echo url('Ad/index'); ?>";
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
