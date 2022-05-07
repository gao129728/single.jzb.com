<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/batch/batchupload.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>上传设置</h5>
                </div>
                <div class="ibox-content">
                    <form action="<?php echo url('multiupload'); ?>" method="get" class="form-horizontal" onSubmit="return checkForm(this);">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">选择栏目：</label>
                            <div class="input-group col-sm-1">
                                <select class="form-control input_wd2" name="cate_id" id='cate_id'>
                                    <option value="">请选择栏目分类</option>
                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题：</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="title" value="">
                                <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="标题不填则使用图片文件名作为标题"><i class="fa fa-question-circle-o"></i></a></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上传类别：</label>
                            <div class="input-group col-sm-6">
                                <div class="radio i-checks">
                                    <input type="radio" name='upload_sort' value="0" checked/>内容&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='upload_sort' value="1" />缩略图
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">缩略图样式：</label>
                            <div class="input-group col-sm-10">
                                <div class="radio i-checks">
                                    <input type="radio" name='photo_style' value="0" checked/><span class="radioTxt">无</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='photo_style' value="1" />固定宽和高&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='photo_style' value="2" />固定宽度&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='photo_style' value="3" />固定高度&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='photo_style' value="4" />左上裁剪&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name='photo_style' value="5" />居中裁剪&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">缩略图尺寸：</label>
                            <div class="input-group col-sm-10">
                                <span class="control-label" style="float:left;">宽度</span>
                                <div class="col-sm-1 input_wd3">
                                    <input type="text" class="form-control" name="small_img_width" value="280">
                                    <span class="tp-unit">px</span>
                                </div>
                                <span class="control-label" style="float:left; padding-left:60px;">高度</span>
                                <div class="col-sm-1 input_wd3">
                                    <input type="text" class="form-control" name="small_img_height" value="173">
                                    <span class="tp-unit">px</span>
                                    <span class="help-question" style="left:110%;"><a data-toggle="tooltip" data-placement="auto right" title="建议尺寸：280px*173px"><i class="fa fa-question-circle-o"></i></a></span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="note-content">
                                <label class="note-title">备注：</label>
                                <div class="note-box">
                                    <div class="note-ico">
                                        <span class="fa-stack fa-lg">
                                           <i class="fa fa-circle-thin fa-stack-2x"></i>
                                           <i class="fa fa-exclamation fa-stack-1x"></i>
                                        </span>
                                    </div>
                                    <div class="note-text">
                                        <p>1、上传类别为缩略图时，只上传缩略图。</p>
                                        <p>2、缩略图压缩处理, 仅限jpg、png、gif。</p>
                                        <p>3、如图片尺寸小于缩略图尺寸，以原图作为缩略图。</p>
                                        <p>4、固定宽高压缩可能使图片变形。</p>
                                        <p>5、固定宽度、高度其中一个，另一个值自动等比例设置，可能与给定的数值不一样。</p>
                                        <p>6、裁剪的方式尺寸与设置相同，但可能无法显示全部图片内容。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2 button-group">
                                <button class="btn btn-warning" type="submit" style="padding:6px 20px;"> 确定 </button>
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
    $('input[name="upload_sort"]').on('ifChecked', function(event){
        if($(this).val() == 1){
            $('.radioTxt').text('原始图片宽高');
        }else{
            $('.radioTxt').text('无');
        }
    });

    function checkForm(form){
        if($('#cate_id').val() == '')
        {
            layer.msg('请选择栏目分类', {icon: 5,time:1500,shade: 0.1}, function(index){
                layer.close(index);
            });
            return false;
        }

        if($('input[name="photo_style"]:checked').val() != 1)
        {
            if (!/^[1-9][0-9]*$/.exec(form.small_img_width.value))
            {
                alert("缩略图宽度填写错误。");
                form.small_img_width.focus();
                return false;
            }
            if (!/^[1-9][0-9]*$/.exec(form.small_img_height.value))
            {
                alert("缩略图高度填写错误。");
                form.small_img_height.focus();
                return false;
            }
        }

        return true;
    }
</script>
</body>
</html>
