<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/banner/index.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<style type="text/css">
    .multi-img .upload-list .control-label{width:50px;}
    .multi-img .upload-list .img{width:200px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight" style="overflow-y:auto;">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Banner管理</h5>
                </div>
                <div class="ibox-content">       
                    <div class="panel blank-panel">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <?php if(is_array($banner_list) || $banner_list instanceof \think\Collection || $banner_list instanceof \think\Paginator): $i = 0; $__LIST__ = $banner_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li <?php if($banner['id'] == $vo['id']): ?>class="active"<?php endif; ?>><a href="<?php echo url('banner/index', ['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <form action="<?php echo url('save_banner'); ?>" method="post" class="form-horizontal" id="banner">
                            <input type="hidden" name="id" value="<?php echo $banner['id']; ?>">
                            <div class="tab-content">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">banner尺寸：</label>
                                    <div class="input-group col-sm-10">
                                        <span class="control-label" style="float:left;">宽度</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="text" class="form-control" id="width" name="width" value="<?php echo $banner['width']; ?>">
                                            <span class="tp-unit">px</span>
                                        </div>
                                        <span class="control-label" style="float:left; padding-left:60px;">高度</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="text" class="form-control" id="height" name="height" value="<?php echo $banner['height']; ?>">
                                            <span class="tp-unit">px</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">切换状态：</label>
                                    <div class="input-group col-sm-10">
                                        <span class="control-label" style="float:left;">是否切换</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="checkbox" name="switch" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($banner['switch'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                        <span class="control-label" style="float:left; padding-left:60px;">自动切换</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="checkbox" name="auto" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($banner['auto'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">切换效果：</label>
                                    <div class="input-group col-sm-6">
                                        <div class="radio i-checks">
                                            <input type="radio" name='switch_style' value="fold" <?php if($banner['switch_style'] == 'fold'): ?>checked<?php endif; ?>/>柔和渐变&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name='switch_style' value="fade" <?php if($banner['switch_style'] == 'fade'): ?>checked<?php endif; ?>/>淡入淡出&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name='switch_style' value="leftLoop" <?php if($banner['switch_style'] == 'leftLoop'): ?>checked<?php endif; ?>/>向左滑动&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name='switch_style' value="topLoop" <?php if($banner['switch_style'] == 'topLoop'): ?>checked<?php endif; ?>/>向上滑动
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">效果参数：</label>
                                    <div class="input-group col-sm-10">
                                        <span class="control-label" style="float:left;">效果时间</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="text" class="form-control" id="effect_time" name="effect_time" value="<?php echo $banner['effect_time']; ?>">
                                            <span class="tp-unit m-l-lg" style="right:-26px;">毫秒</span>
                                        </div>
                                        <span class="control-label" style="float:left; padding-left:60px;">间隔时间</span>
                                        
                                        <div class="col-sm-1 input_wd3">
                                            <input type="text" class="form-control" id="interval_time" name="interval_time" value="<?php echo $banner['interval_time']; ?>">
                                            <span class="tp-unit m-l-lg" style="right:-26px;">毫秒</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">切换按钮状态：</label>
                                    <div class="input-group col-sm-10">
                                        <span class="control-label" style="float:left;">左右按钮</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="checkbox" name="aside_btn" value="1" class="lcs_check" lcs-text="显示|关闭" autocomplete="off" <?php if($banner['aside_btn'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                        <span class="control-label" style="float:left; padding-left:60px;">圆点按钮</span>
                                        <div class="col-sm-1 input_wd3">
                                            <input type="checkbox" name="circle_btn" value="1" class="lcs_check" lcs-text="显示|关闭" autocomplete="off" <?php if($banner['circle_btn'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" style="padding-top:10px;">
                                    <label class="col-sm-2 control-label">图片列表：</label>
                                    <div class="col-sm-7 input-group">
                                        <ul class="multi-img" id="multi-img-sortable">
                                            <?php if(is_array($imageList) || $imageList instanceof \think\Collection || $imageList instanceof \think\Paginator): $k = 0; $__LIST__ = $imageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                            <li>
                                                <input type="hidden" name="img_id[<?php echo $k; ?>]" value="<?php echo $vo['id']; ?>" class="img_id">
                                                <input type="hidden" name="img_src[<?php echo $k; ?>]" value="<?php echo $vo['photo']; ?>" class="img_src">
                                                <div class="handle"><i class="fa fa-arrows"></i></div>
                                                <div class="upload-list">
                                                    <div class="pull-left"><img src="__UPLOAD_PATH__/<?php echo $vo['photo']; ?>" class="img" alt="<?php echo $vo['title']; ?>"/></div>
                                                    <div class="pull-left col-sm-8">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">标题</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="img_name[<?php echo $k; ?>]" value="<?php echo $vo['title']; ?>" placeholder="请输入标题" class="form-control">
                                                            </div>
                                                            <label class="col-sm-2 control-label">状态</label>
                                                            <div class="col-sm-3">
                                                                <input type="checkbox" name="state[<?php echo $k; ?>]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($vo['state'] == 1): ?>checked<?php endif; ?>/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">链接</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="img_url[<?php echo $k; ?>]" value="<?php echo $vo['url']; ?>" placeholder="请输入链接地址" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="status-label"><i class="fa fa-check"></i></label>
                                                <label class="status-move"><i class="fa fa-remove"></i></label>
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                        <div id="wrapper">
                                            <div id="container">
                                                <div id="uploader">
                                                    <div class="queueList">
                                                        <div id="dndArea" class="placeholder">
                                                            <div id="filePicker"></div>
                                                            <p class="tips">或将照片拖到这里，单次最多可选100张，且图片大小不超过1M</p>
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
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2 button-group">
                                    <button class="btn btn-warning" type="submit" style="padding:6px 20px;"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
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
<script type="text/javascript" src="/static/admin/webUploader/webuploader.min.js"></script>
<script type="text/javascript" src="/static/admin/webUploader/upload_banner.js"></script>
<script type="text/javascript" src="/static/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">
    $("#multi-img-sortable").sortable();
    $("#multi-img-sortable").disableSelection();
    $('#multi-img-sortable').on('click','.status-move', function(){
        var _this = $(this);
        layer.confirm('确认删除此图片吗?', {icon: 3, title:'提示'}, function(index){
            var img_id = _this.siblings('.img_id').val();
            var img_src = _this.siblings('.img_src').val();
            $.getJSON("<?php echo url('banner/del_banner_img'); ?>", {'img_id':img_id,'img_src':img_src}, function(res){
                if(res.code == 1){
                    _this.parent().remove();
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        });
    });
    $('#filePicker').on('click','.webuploader-pick', function(){
        $(this).next().find('label').click();
    });
    $(function(){
        $('#banner').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if(!isPositiveNum($('#width').val()) || !isPositiveNum($('#height').val())){
                layer.msg('请输入合法的banner尺寸', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                result = false;
                return false;
            }

            if(!isPositiveNum($('#effect_time').val()) || !isPositiveNum($('#interval_time').val())){
                layer.msg('请输入合法的效果参数', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                result = false;
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
