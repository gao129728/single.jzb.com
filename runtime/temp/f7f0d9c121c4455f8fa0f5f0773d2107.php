<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/batch/multiupload.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/admin/webUploader/css/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/webUploader/css/style.css" />
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-title-goback">
                        <a href="<?php echo url('batchupload'); ?>"><i class="fa fa-reply"></i> 返回</a>
                    </div>
                    <h5>批量上传</h5>
                </div>
                <div class="ibox-content form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">选择栏目：</label>
                        <div class="input-group col-sm-1 text-group">
                            <?php echo $cate_name; ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题：</label>
                        <div class="input-group col-sm-3 text-group">
                            <?php if($title == ''): ?>原图片名称<?php else: ?><?php echo $title; endif; ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">上传类别：</label>
                        <div class="input-group col-sm-6 text-group">
                            <?php if($upload_sort == 1): ?>缩略图<?php else: ?>内容<?php endif; ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">缩略图样式：</label>
                        <div class="input-group col-sm-6">
                            <div class="radio i-checks">
                                <?php switch($photo_style): case "0": if($upload_sort == 1): ?>原始图片高宽<?php else: ?>无缩略图<?php endif; break; case "1": ?>固定宽和高，宽度：<?php echo $small_img_width; ?>px &nbsp;&nbsp;&nbsp;&nbsp;高度：<?php echo $small_img_height; ?>px<?php break; case "2": ?>固定宽度，宽度：<?php echo $small_img_width; ?>px &nbsp;&nbsp;&nbsp;&nbsp;高度：自适应<?php break; case "3": ?>固定高度，宽度：自适应 &nbsp;&nbsp;&nbsp;&nbsp;高度：<?php echo $small_img_height; ?>px<?php break; case "4": ?>左上裁剪，宽度：<?php echo $small_img_width; ?>px &nbsp;&nbsp;&nbsp;&nbsp;高度：<?php echo $small_img_height; ?>px<?php break; case "5": ?>居中裁剪，宽度：<?php echo $small_img_width; ?>px &nbsp;&nbsp;&nbsp;&nbsp;高度：<?php echo $small_img_height; ?>px<?php break; default: ?>错误
                                <?php endswitch; ?>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">选择图片：</label>
                        <div class="col-sm-7 input-group">
                            <div id="wrapper" class="multiu-wrap">
                                <div id="container">
                                    <div id="uploader">
                                        <div class="queueList">
                                            <div id="dndArea" class="placeholder">
                                                <div id="filePicker"></div>
                                                <p class="tips">或将照片拖到这里，单次最多可选100张</p>
                                            </div>
                                        </div>
                                        <div class="statusBar" style="display:none;">
                                            <div class="progress">
                                                <span class="text">0%</span>
                                                <span class="percentage"></span>
                                            </div><div class="info"></div>
                                            <div class="btns">
                                                <div id="filePicker2"></div><div class="uploadBtn">开始上传</div><div class="delAll">清空</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script type="text/javascript" src="/static/admin/webUploader/webuploader.min.js"></script>
<script type="text/javascript" src="/static/admin/webUploader/upload.js"></script>
<script type="text/javascript">
    //设置需要传递的参数
    var upload_data_arr = new Array("<?php echo $cate_id; ?>", "<?php echo $title; ?>", "<?php echo $upload_sort; ?>", "<?php echo $photo_style; ?>", "<?php echo $small_img_width; ?>", "<?php echo $small_img_height; ?>");
</script>
</body>
</html>
