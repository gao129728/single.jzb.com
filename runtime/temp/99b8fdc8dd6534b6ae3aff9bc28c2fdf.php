<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/applet/config.html";i:1536056070;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    .param-set-box .set-item{margin:0;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>小程序配置</h5>
                </div>
                <div class="ibox-content">       
                    <div class="panel blank-panel">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本设置</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">内页设置</a></li>
                            </ul>
                        </div>
                        <form action="<?php echo url('save_config'); ?>" method="post" class="form-horizontal" id="config">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">小程序Logo：</label>
                                        <div class="col-sm-2" style="padding:0;">
                                            <div class="uploadImg-box">
                                                <input type="file" name="applet_logo" id="applet_logo" class="imgFile" onchange="previewImage(this)"/>
                                                <div class="up-img <?php if($config['applet_logo'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                                <?php if($config['applet_logo'] != ''): ?>
                                                <input type="checkbox" name="delLogo" class="input-del" value="1" />
                                                <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $config['applet_logo']; ?>"/></div>
                                                <?php endif; ?>
                                                <div class="uploadCover">
                                                    <div class="ulinfo clearfix">
                                                        <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                                        <span class="up-del"><i class="fa fa-close"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="tips-text">仅支持jpg、png、gif</p>
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="尺寸建议：220*82px"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">小程序标题：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" id="applet_title" name="config[applet_title]" value="<?php echo $config['applet_title']; ?>">
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="小程序首页顶部标题"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">咨询热线：</label>
                                        <div class="input-group col-sm-4 input_wd2">
                                            <input type="text" class="form-control" name="config[applet_service_line]" value="<?php echo $config['applet_service_line']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">位置坐标：</label>
                                        <div class="input-group col-sm-4 input_wd2" style="float:left;">
                                            <input type="text" class="form-control" id="coordinates" name="config[applet_coordinate]" value="<?php echo $config['applet_coordinate']; ?>">
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="请输入正确的位置坐标，坐标纬度、经度以 , 隔开"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                        <div class="col-sm-2" style="margin-left:30px; line-height:32px; font-size: 12px;"><a href="http://lbs.qq.com/tool/getpoint/" target="_blank" style="color:#00B7EE;">坐标拾取器</a></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">详细地址：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" id="address" name="config[applet_address]" value="<?php echo $config['applet_address']; ?>">
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="显示在地图坐标位置"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">版权信息：</label>
                                        <div class="input-group col-sm-6">
                                            <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                            <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                            <textarea name="config[applet_copy]" id="myEditor2" style="width:100%"><?php echo $config['applet_copy']; ?></textarea>
                                            <script type="text/javascript">
                                                var editor1 = UE.getEditor('myEditor2', {
                                                    toolbars: [
                                                        ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','fontfamily','fontsize','lineheight','justifyleft','justifycenter','justifyright','justifyjustify', '|','link','unlink']
                                                    ],
                                                    autoHeightEnabled: true,
                                                    autoFloatEnabled: true,
                                                    initialFrameHeight:200
                                                });
                                            </script>
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="小程序底部显示的版权信息"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">新闻列表：</label>
                                        <div class="input-group col-sm-10">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="newsCnt" value="3">
                                                    <div class="item clearfix">
                                                        <label class="item-label">每页显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='newsParam[0]' value="<?php echo $newsParam[0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='newsParam[1]' value="<?php echo $newsParam[1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示简介</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="newsParam[2]" value="1" class="lcs_check" lcs-text="是|否" <?php if($newsParam[2] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">简介字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='newsParam[3]' value="<?php echo $newsParam[3]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">图片列表：</label>
                                        <div class="input-group col-sm-10">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="picCnt" value="5">
                                                    <div class="item clearfix">
                                                        <label class="item-label">每页显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='picParam[0]' value="<?php echo $picParam[0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">每行显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='picParam[1]' value="<?php echo $picParam[1]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='picParam[2]' value="<?php echo $picParam[2]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="picParam[3]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($picParam[3] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示简介</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="picParam[4]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($picParam[4] == 1): ?>checked<?php endif; ?>/>
                                                            <span>简介字数</span><input type="text" class="text checknum" name='picParam[5]' value="<?php echo $picParam[5]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">图文列表：</label>
                                        <div class="input-group col-sm-10">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="picTxtCnt" value="3">
                                                    <div class="item clearfix">
                                                        <label class="item-label">每页显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='picTxtParam[0]' value="<?php echo $picTxtParam[0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='picTxtParam[1]' value="<?php echo $picTxtParam[1]; ?>"/>
                                                            <span><i class="fa fa-info-circle"></i> 为0则全部显示</span>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">简介字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='picTxtParam[2]' value="<?php echo $picTxtParam[2]; ?>"/>
                                                            <span><i class="fa fa-info-circle"></i> 为0则全部显示</span>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="picTxtParam[3]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($picTxtParam[3] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if($('#applet_logo').val() != ''){
                var ext = $('#applet_logo').val().substr($('#applet_logo').val().length - 3).toLowerCase();
                if (ext != "gif" && ext != "jpg" && ext != "png")
                {
                    layer.msg('图片必须是GIF、JPG或PNG格式！', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }

            if($.trim($('#applet_title').val()) == ''){
                layer.msg('小程序标题不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

            var result = true;
            $('.param-set-box .checknum').each(function(){
                val = $(this).val();
                if(!isPositiveNum(val)){
                    layer.msg('请输入合法的内页设置参数', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    result = false;
                    return false;
                }
            });
            if(!result){
                return false;
            }
        }

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
