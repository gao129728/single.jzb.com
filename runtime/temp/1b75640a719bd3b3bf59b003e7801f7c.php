<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"E:\php_project\single.jzb.com\public/../application/admin/view/article/add_cate.html";i:1534923362;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
                    <div class="ibox-title-goback">
                        <a href="javascript:history.back();"><i class="fa fa-reply"></i> 返回</a>
                    </div>
                    <h5>添加分类</h5>
                </div>
                <div class="ibox-content">
                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本设置</a></li>
                            <li><a data-toggle="tab" href="#tab-2" aria-expanded="false">高级设置</a></li>
                        </ul>
                    </div>
                    <form class="form-horizontal" name="add_cate" id="add_cate" method="post" action="<?php echo url('add_cate'); ?>">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">所属父级：</label>
                                    <div class="input-group col-sm-4">
                                        <select name="parent_id" class="form-control">
                                            <option value="0">-- 默认顶级 --</option>
                                            <?php if(is_array($cate_tree) || $cate_tree instanceof \think\Collection || $cate_tree instanceof \think\Paginator): if( count($cate_tree)==0 ) : echo "" ;else: foreach($cate_tree as $key=>$v): if($v['lvl'] < \think\Config::get('max_cate_class')): ?>
                                                <option value="<?php echo $v['id']; ?>" <?php if($cate_id == $v['id']): ?>selected<?php endif; ?> style="margin-left:55px;"><?php echo $v['lefthtml']; ?><?php echo $v['name']; ?></option>
                                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">分类名称：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="name" type="text" class="form-control" name="name" >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">排&nbsp;&nbsp;序：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="orderby" type="text" class="form-control input_wd1" name="orderby" value="<?php echo $orderby; ?>">
                                    </div>
                                </div>
                                <!--<div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">英文名称：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="en_name" type="text" class="form-control" name="en_name" >
                                    </div>
                                </div>-->
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">栏目目录：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="catedir" type="text" class="form-control" name="catedir" >
                                        <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="显示在地址栏url中的栏目名称，目录不要包含‘ / ’，否则链接可能错误"><i class="fa fa-question-circle-o"></i></a></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">栏目Banner：</label>
                                    <div class="input-group col-sm-4">
                                        <div class="uploadImg-box">
                                            <input type="file" name="photo" id="photo" class="imgFile" onchange="previewImage(this)"/>
                                            <div class="up-img"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
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
                                    <label class="col-sm-2 control-label">链接网址：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="website" type="text" class="form-control" name="website" >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="cate-style">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类样式：</label>
                                        <div class="col-sm-10 input-group">
                                            <div class="radio i-checks">
                                                <input type="radio" name='cateStyle' value="0" <?php if($cateStyle == 0): ?>checked<?php endif; ?>/>单页模式&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='cateStyle' value="1" <?php if($cateStyle == 1): ?>checked<?php endif; ?>/>新闻列表&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='cateStyle' value="2" <?php if($cateStyle == 2): ?>checked<?php endif; ?>/>图片列表&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='cateStyle' value="3" <?php if($cateStyle == 3): ?>checked<?php endif; ?>/>图文列表&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='cateStyle' value="4" <?php if($cateStyle == 4): ?>checked<?php endif; ?>/>表单页&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="param-set-box">
                                                <div class="set-item set-item-0 <?php if($cateStyle != 0): ?>hidden-box<?php endif; ?>">
                                                    <input type="hidden" name="paramCnt[0]" value="0">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示方式</label>
                                                        <div class="con">
                                                            <select class="form-control chosen-select input_wd2" name="styleParam[0][0]">
                                                                <option value="0" selected>内容模式</option>
                                                                <option value="1">专题模式</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="set-item set-item-1 <?php if($cateStyle != 1): ?>hidden-box<?php endif; ?>">
                                                    <input type="hidden" name="paramCnt[1]" value="3">
                                                    <div class="item clearfix">
                                                        <label class="item-label">每页显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[1][0]' value="<?php echo $cateParam[1][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[1][1]' value="<?php echo $cateParam[1][1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示简介</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][2]" value="1" class="lcs_check" lcs-text="是|否" <?php if($cateParam[1][2] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">简介字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[1][3]' value="<?php echo $cateParam[1][3]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="set-item set-item-2 <?php if($cateStyle != 2): ?>hidden-box<?php endif; ?>">
                                                    <input type="hidden" name="paramCnt[2]" value="7">
                                                    <div class="item clearfix">
                                                        <label class="item-label">每页显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[2][0]' value="<?php echo $cateParam[2][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">每行显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[2][1]' value="<?php echo $cateParam[2][1]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[2][2]' value="<?php echo $cateParam[2][2]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[2][3]' value="<?php echo $cateParam[2][3]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[2][4]' value="<?php echo $cateParam[2][4]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[2][5]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($cateParam[2][5] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示简介</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[2][6]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($cateParam[2][6] == 1): ?>checked<?php endif; ?>/>
                                                            <span>简介字数</span><input type="text" class="text checknum" name='styleParam[2][7]' value="<?php echo $cateParam[2][7]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="set-item set-item-3 <?php if($cateStyle != 3): ?>hidden-box<?php endif; ?>">
                                                    <input type="hidden" name="paramCnt[3]" value="5">
                                                    <div class="item clearfix">
                                                        <label class="item-label">每页显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[3][0]' value="<?php echo $cateParam[3][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[3][1]' value="<?php echo $cateParam[3][1]; ?>"/>
                                                            <span><i class="fa fa-info-circle"></i> 为0则全部显示</span>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">简介字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[3][2]' value="<?php echo $cateParam[3][2]; ?>"/>
                                                            <span><i class="fa fa-info-circle"></i> 为0则全部显示</span>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[3][3]' value="<?php echo $cateParam[3][3]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[3][4]' value="<?php echo $cateParam[3][4]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[3][5]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($cateParam[3][5] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="set-item set-item-4 <?php if($cateStyle != 4): ?>hidden-box<?php endif; ?>">
                                                    <input type="hidden" name="paramCnt[4]" value="0">
                                                    <div class="item clearfix">
                                                        <label class="item-label">表单选择</label>
                                                        <div class="con">
                                                            <select class="form-control chosen-select input_wd2" name="styleParam[4][0]">
                                                                <?php if(is_array($form_list) || $form_list instanceof \think\Collection || $form_list instanceof \think\Paginator): $i = 0; $__LIST__ = $form_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $key; ?>" <?php if($cateParam[4][0] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-style <?php if($cateStyle == 0): ?>hidden-box<?php endif; ?>">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">详情样式：</label>
                                        <div class="col-sm-10 input-group">
                                            <div class="radio i-checks">
                                                <input type="radio" name='infoStyle' value="0" <?php if($infoStyle == 0): ?>checked<?php endif; ?>/>内容模式&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='infoStyle' value="1" <?php if($infoStyle == 1): ?>checked<?php endif; ?>/>产品模式
                                            </div>
                                            <div class="param-set-box">
                                                <div class="set-item set-item-1 <?php if($infoStyle != 1): ?>hidden-box<?php endif; ?>">
                                                    <input type="hidden" name="infoParamCnt[1]" value="2">
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='setParam[1][0]' value="<?php echo $infoParam[1][0]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='setParam[1][1]' value="<?php echo $infoParam[1][1]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">开启放大镜</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="setParam[1][2]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($infoParam[1][2] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="isForm <?php if($cateStyle == 4): ?>hidden-box<?php endif; ?>">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示留言表单：</label>
                                        <div class="col-sm-10 input-group">
                                            <div class="radio i-checks">
                                                <input type="radio" name='isForm' value="0" checked/>否&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='isForm' value="1" />是
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">状&nbsp;态：</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="checkbox" name="status" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" checked/>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">新窗口打开：</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="checkbox" name="isTarget" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">导航栏显示：</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="checkbox" name="isNav" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" checked/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网页标题：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="seo_title" type="text" class="form-control" name="seo_title">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网页关键字：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="keyword" type="text" class="form-control" name="keyword">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网页描述：</label>
                                    <div class="input-group col-sm-4">
                                        <textarea type="text" rows="3" name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2 button-group">
                                <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
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
    $('input[name="cateStyle"]').on('ifChecked', function(event){
        var val = $(this).val();
        var item = $('.cate-style .set-item-'+val);
        item.show();
        item.siblings().hide();
        if(val == 0 || val == 4){
            $('.info-style').hide();
        }else {
            $('.info-style').show();
        }
        if(val == 4){
            $('.isForm').hide();
        }else{
            $('.isForm').show();
        }

    });

    $('input[name="infoStyle"]').on('ifChecked', function(event){
        var val = $(this).val();
        var item = $('.info-style .set-item-'+val);
        if(val == 0){
            $('.info-style .set-item').hide();
        }else{
            item.show();
            item.siblings().hide();
        }
    });

    $(function(){
        $('#add_cate').ajaxForm({
            beforeSubmit: checkForm, 
            success: complete, 
            dataType: 'json'
        });
        
        function checkForm(){
            if( '' == $.trim($('#name').val())){
                layer.msg('请输入分类名称',{icon:2,time:1500,shade: 0.1}, function(index){
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
            var result = true;
            var cateStyle = $('input[name="cateStyle"]:checked').val();
            if(cateStyle > 0) {
                $('.cate-style .set-item-'+ cateStyle +' .checknum').each(function(){
                    val = $(this).val();
                    if(!isPositiveNum(val)){
                        layer.msg('请输入合法的分类样式设置参数', {icon: 5,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                        });
                        result = false;
                        return false;
                    }
                });
            }
            var infoStyle = $('input[name="infoStyle"]:checked').val();
            if(infoStyle > 0) {
                $('.info-style .set-item-'+ infoStyle +' .checknum').each(function(){
                    val = $(this).val();
                    if(!isPositiveNum(val)){
                        layer.msg('请输入合法的详情样式设置参数', {icon: 5,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                        });
                        result = false;
                        return false;
                    }
                });
            }
            if(!result){
                return false;
            }

        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('article/index_cate'); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1});
                return false;   
            }
        }
     
    });
</script>
</body>
</html>