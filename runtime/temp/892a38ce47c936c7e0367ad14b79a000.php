<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/batch/watermark.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
                    <h5>批量水印</h5>
                </div>
                <div class="ibox-content">
                    <form action="<?php echo url('watermark'); ?>" method="post" class="form-horizontal" id="watermark">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="padding-top:6px;">参数设置：</label>
                            <div class="input-group col-sm-1">
                                <a href="javascript:;" onclick="markModel()" class="btn btn-blue btn-outline" style="padding:4px 12px;">设置水印参数</a>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="padding-top:6px;">水印示例：</label>
                            <div class="input-group col-sm-6">
                                <div class="wm-example">
                                    <img src="__IMG__/wm-example.jpg"/>
                                    <?php if($wm['wm_type'] == 0): ?>
                                        <div id="wm-text" class="wm-place-<?php echo $wm['wm_position']; ?>" style="font-size:<?php echo $wm['wm_fontsize']; ?>px;color:<?php echo $wm['wm_color']; ?>; font-family:'微软雅黑';"><?php echo $wm['wm_text']; ?></div>
                                    <?php else: ?>
                                        <div id="wm-image" class="wm-place-<?php echo $wm['wm_position']; ?>" style="opacity:<?php echo $wm['wm_alpha']/100; ?>;filter:alpha(opacity=<?php echo $wm['wm_alpha']; ?>);-moz-opacity:<?php echo $wm['wm_alpha']/100; ?>; -webkit-opacity: <?php echo $wm['wm_alpha']/100; ?>;">
                                            <img src="__UPLOAD_PATH__/<?php echo $wm['wm_image']; ?>"/>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">选择栏目：</label>
                            <div class="input-group col-sm-1">
                                <select class="form-control input_wd2" name="cate_id" id='cate_id'>
                                    <option value="0">所有栏目分类</option>
                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">水印添加类别：</label>
                            <div class="input-group col-sm-8">
                                <div class="checkbox-box clearfix">
                                    <span><input type='checkbox' class="i-checks" name='photo' value='1'> 缩略图</span>
                                    <span><input type='checkbox' class="i-checks" name='content' value='1'> 内容中的图片</span>
                                    <span><input type='checkbox' class="i-checks" name='images' value='1'> 产品多图</span>
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
                                        <p>1、如果原图片有水印，不能去除，只能再加新的水印。</p>
                                        <p>2、水印添加后，原图片将被修改，原图无法找回，请慎重。</p>
                                        <p>3、若原图片小于水印图片，则无法添加水印。</p>
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
<div class="markModel">
    <div class="ibox-content">
        <form action="<?php echo url('setWmPrarm'); ?>" method="post" class="form-horizontal" id="setParam">
            <div class="form-group">
                <label class="col-sm-3 control-label">水印位置：</label>
                <div class="input-group col-sm-8">
                    <div class="radio i-checks">
                        <input type="radio" name='wm_position' value="1" <?php if($wm['wm_position'] == 1): ?>checked<?php endif; ?>/>顶部居左&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='wm_position' value="2" <?php if($wm['wm_position'] == 2): ?>checked<?php endif; ?>/>顶部居右&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='wm_position' value="3" <?php if($wm['wm_position'] == 3): ?>checked<?php endif; ?>/>居中&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='wm_position' value="4" <?php if($wm['wm_position'] == 4): ?>checked<?php endif; ?>/>底部居左&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='wm_position' value="5" <?php if($wm['wm_position'] == 5): ?>checked<?php endif; ?>/>底部居右&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">水印类型：</label>
                <div class="input-group col-sm-6">
                    <div class="radio i-checks">
                        <input type="radio" name='wm_type' value="0" <?php if($wm['wm_type'] == 0): ?>checked<?php endif; ?>/>文字水印&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='wm_type' value="1" <?php if($wm['wm_type'] == 1): ?>checked<?php endif; ?>/>图片水印
                    </div>
                </div>
            </div>
            <div class="text-mark <?php if($wm['wm_type'] != 0): ?>hidden-box<?php endif; ?>">
                <div class="row-dashed-title">文字水印设置</div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">水印文字内容：</label>
                    <div class="input-group col-sm-4">
                        <input id="wm_text" type="text" class="form-control" name="wm_text" value="<?php echo $wm['wm_text']; ?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">文字大小：</label>
                    <div class="input-group col-sm-1">
                        <input id="wm_fontsize" type="text" class="form-control input_wd1" name="wm_fontsize" value="<?php echo $wm['wm_fontsize']; ?>">
                        <span style="position: absolute; line-height: 30px; top:0; right:-20px;">px</span>
                        <span class="help-question" style="left:120%;"><a data-toggle="tooltip" data-placement="auto right" title="单位像素，建议16~30像素"><i class="fa fa-question-circle-o"></i></a></span>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">文字颜色：</label>
                    <div class="iColor-Picker">
                        <input id="mycolor1" type="text" class="form-control iColorPicker input_wd1" name="wm_color" maxlength="7" value="<?php echo $wm['wm_color']; ?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">图片质量：</label>
                    <div class="input-group col-sm-1">
                        <input id="wm_textquality" type="text" class="form-control input_wd1" name="wm_textquality" value="<?php echo $wm['wm_textquality']; ?>">
                        <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="仅限jpp图片，值为0~100，0为质量最低，100为质量最高"><i class="fa fa-question-circle-o"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="image-mark <?php if($wm['wm_type'] != 1): ?>hidden-box<?php endif; ?>">
                <div class="row-dashed-title">图片水印设置</div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">水印图片：</label>
                    <div class="input-group col-sm-3">
                        <div class="uploadImg-box">
                            <input type="file" name="wm_image" id="wm_image" class="imgFile" onchange="previewImage(this)"/>
                            <div class="up-img <?php if($wm['wm_image'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                            <?php if($wm['wm_image'] != ''): ?>
                            <input type="checkbox" name="delImage" class="input-del" value="1" />
                            <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $wm['wm_image']; ?>"/></div>
                            <?php endif; ?>
                            <div class="uploadCover">
                                <div class="ulinfo clearfix">
                                    <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                    <span class="up-del"><i class="fa fa-close"></i></span>
                                </div>
                            </div>
                        </div>
                        <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="仅限jpp、png、gif图片，建议为png"><i class="fa fa-question-circle-o"></i></a></span>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">水印透明度：</label>
                    <div class="input-group col-sm-1">
                        <input id="wm_alpha" type="text" class="form-control input_wd1" name="wm_alpha" value="<?php echo $wm['wm_alpha']; ?>">
                        <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="值为0~100，0为完全透明，100为不透明"><i class="fa fa-question-circle-o"></i></a></span>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">图片质量：</label>
                    <div class="input-group col-sm-1">
                        <input id="wm_imgquality" type="text" class="form-control input_wd1" name="wm_imgquality" value="<?php echo $wm['wm_imgquality']; ?>">
                        <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="仅限jpp图片，值为0~100，0为质量最低，100为质量最高"><i class="fa fa-question-circle-o"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3 button-group">
                    <button class="btn btn-warning" type="submit" style="padding:6px 20px;"> 确定 </button>
                </div>
            </div>
        </form>
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
<script src="/static/admin/js/iColorPicker-1.js" type="text/javascript"></script>
<script type="text/javascript">
    var model;
    function markModel(){
        //页面层
        model = layer.open({
            type: 1,
            title:'参数设置',
            skin: 'layui-layer-demo', //加上边框
            area: ['840px', '72%'], //宽高
            content: $('.markModel')
        });
    }

    $('input[name="wm_type"]').on('ifChecked', function(event){
        if($(this).val() == 1){
            $('.image-mark').show();
            $('.text-mark').hide();
        }else{
            $('.text-mark').show();
            $('.image-mark').hide();
        }
    });

    $(function(){
        $('#setParam').ajaxForm({
            beforeSubmit: checkParam,
            success: setSuccess, // 这是提交后的方法
            dataType: 'json'
        });

        function checkParam(){
            if($('input[name="wm_type"]:checked').val() == 1){
                if($('.uploadImg-box .imgView').length < 1)
                {
                    layer.msg('请选择水印图片', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
                if($('#wm_image').val() != '') {
                    var ext = $('#wm_image').val().substr($('#wm_image').val().length - 3).toLowerCase();
                    if (ext != "gif" && ext != "jpg" && ext != "png") {
                        layer.msg('图片必须是GIF、JPG或PNG格式！', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                            layer.close(index);
                        });
                        return false;
                    }
                }
                if (!/^(?:0|[1-9][0-9]?|100)$/.exec($('#wm_alpha').val()))
                {
                    layer.msg('水印透明度填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
                if (!/^(?:0|[1-9][0-9]?|100)$/.exec($('#wm_imgquality').val()))
                {
                    layer.msg('图片质量填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
            }else{
                if($.trim($('#wm_text').val()) == '')
                {
                    layer.msg('水印文字内容不能为空', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
                if (!/^[1-9][0-9]?$/.exec($('#wm_fontsize').val()))
                {
                    layer.msg('文字大小填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
                if (!/^\#[0-9a-fA-F]{6}$/.exec($('#mycolor1').val()))
                {
                    layer.msg('文字颜色填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
                if (!/^(?:0|[1-9][0-9]?|100)$/.exec($('#wm_textquality').val()))
                {
                    layer.msg('图片质量填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
            }
        }

        function setSuccess(data){
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    layer.close(model);
                    location.reload();
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }

        $('#watermark').ajaxForm({
            beforeSubmit: checkForm,
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });
        var load;
        function checkForm(){
            var flag=false;
            $(".checkbox-box input").each(function(){
                if($(this).is(':checked')){
                    flag=true;
                }
            });
            if(!flag){
                layer.msg('请选择水印添加类别', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            load = layer.load(0, {
                shade: [0.5,'#000'],
                content:'水印批量添加中...'
            });
        }

        function complete(data){
            layer.close(load);
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:2000,shade: 0.1}, function(index){
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
