<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:92:"E:\php_project\single.jzb.com\public/../application/admin/view/structure/edit_structure.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:84:"E:\php_project\single.jzb.com\public/../application/admin/view/structure/global.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;s:87:"E:\php_project\single.jzb.com\public/../application/admin/view/structure/global_js.html";i:1532138656;}*/ ?>
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
<link href="__JS__/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>首页管理</h5>
                </div>
                <div class="ibox-content clearfix" style="padding-top:20px;">
                    <div class="col-sm-4">
    <form name="update_order" id="update_order" method="post" action="<?php echo url('update_order'); ?>">
        <div class="file-manager" style="overflow:hidden; overflow-y:auto;">
            <div class="homefa"><i class="fa fa-reorder"></i>首页结构示意图</div>
            <ul id="sortable" class="Ulsort">
                <?php if(is_array($structure_list) || $structure_list instanceof \think\Collection || $structure_list instanceof \think\Paginator): $i = 0; $__LIST__ = $structure_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li class="ui-state <?php if($structure_id == $item['id']): ?>active<?php endif; ?>">
                    <input type="hidden" name="st_id[]" value="<?php echo $item['id']; ?>">
                    <div class="ui-state-box" onmouseup="show_menu(this)">
                        <span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span>
                        <span><?php echo $item['name']; ?></span>
                        <span class="pull-right"><i class="chevron fa <?php if($structure_id == $item['id']): ?>fa-chevron-down<?php else: ?>fa-chevron-right<?php endif; ?>"></i></span>
                        <i class="fa fa-caret-right"></i>
                    </div>
                    <span class="handle-btn">
                        <a href="javascript:;" onclick="show_structure(<?php echo $item['id']; ?>,this)"><i class="fa <?php echo !empty($item['status'])?'fa-eye':'fa-eye-slash'; ?>" data-toggle="tooltip" title="<?php echo !empty($item['status'])?'显示':'不显示'; ?>"></i></a>
                        <a href="<?php echo url('structure/edit_structure',['id'=>$item['id']]); ?>"><i class="fa fa-pencil" data-toggle="tooltip" title="编辑"></i></a>
                        <a href="javascript:;" onclick="del_structure(<?php echo $item['id']; ?>)"><i class="fa fa-trash-o" data-toggle="tooltip" title="删除"></i></a>
                        <a href="<?php echo url('structure/add_module',['st_id'=>$item['id']]); ?>"><span><i class="fa fa-plus" data-toggle="tooltip" title="添加子板块"></i></span></a>
                    </span>
                    <?php if($item['module']): ?>
                    <dl class="ui_dl_menu">
                        <?php if(is_array($item['module']) || $item['module'] instanceof \think\Collection || $item['module'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['module'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <dd class="ui-state <?php if($module_id == $vo['id']): ?>on<?php endif; ?>">
                            <input type="hidden" name="mo_id[<?php echo $item['id']; ?>][]" value="<?php echo $vo['id']; ?>">
                            <div class="son-state clearfix">
                                <span class="column"><span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span><?php echo $vo['title']; ?></span>
                                  <span class="pull-right">
                                    <a href="javascript:;" onclick="show_module(<?php echo $vo['id']; ?>,this)"><i class="fa <?php echo !empty($vo['state'])?'fa-eye':'fa-eye-slash'; ?>" data-toggle="tooltip" title="<?php echo !empty($vo['state'])?'显示':'不显示'; ?>"></i></a>
                                    <a href="<?php echo url('structure/edit_module',['id'=>$vo['id']]); ?>"><i class="fa fa-pencil" data-toggle="tooltip" title="编辑"></i></a>
                                    <a href="javascript:;" onclick="del_module(<?php echo $vo['id']; ?>)"><i class="fa fa-trash-o" data-toggle="tooltip" title="删除"></i></a>
                                  </span>
                            </div>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="add_module">
                <a href="<?php echo url('index'); ?>">
                    <i class="fa fa-plus"></i>
                    添加首页模块
                </a>
            </div>
        </div>
    </form>
</div>
                    <div class="col-sm-8">
                        <form class="form-horizontal" name="edit_structure" id="edit_structure" method="post" action="<?php echo url('edit_structure'); ?>">
                            <input type="hidden" name="id" value="<?php echo $structure['id']; ?>">
                            <div class="form-group">
                                <label class="col-sm-2" style="font-weight: 100; padding-left:20px; color:#ff6600;; font-size: 15px;">编辑模块</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">模块名称：</label>
                                <div class="input-group col-sm-4">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo $structure['name']; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">显示宽度：</label>
                                <div class="input-group col-sm-4">
                                    <div class="radio i-checks">
                                        <input type="radio" name='show_style' value="0" <?php if($structure['show_style'] == 0): ?>checked<?php endif; ?>/>主体居中&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='show_style' value="1" <?php if($structure['show_style'] == 1): ?>checked<?php endif; ?>/>全屏通栏
                                    </div>
                                    <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="主体居中宽度为1200px"><i class="fa fa-question-circle-o"></i></a></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">背景颜色：</label>
                                <div class="input-group col-sm-4">
                                    <div class="iColor-Picker">
                                        <input id="bgcolor" type="text" class="form-control iColorPicker input_wd1" name="bgcolor" maxlength="7" value="<?php echo $structure['bgcolor']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">背景图片：</label>
                                <div class="input-group col-sm-4">
                                    <div class="uploadImg-box">
                                        <input type="file" name="photo" id="photo" class="imgFile" onchange="previewImage(this)"/>
                                        <div class="up-img <?php if($structure['photo'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                        <?php if($structure['photo'] != ''): ?>
                                        <input type="checkbox" name="delPhoto" class="input-del" value="1" />
                                        <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $structure['photo']; ?>"/></div>
                                        <?php endif; ?>
                                        <div class="uploadCover">
                                            <div class="ulinfo clearfix">
                                                <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                                <span class="up-del"><i class="fa fa-close"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="背景图的高度=容器内容高度+上下边距"><i class="fa fa-question-circle-o"></i></a></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上下边距：</label>
                                <div class="input-group col-sm-10">
                                    <span class="control-label" style="float:left;">上边距</span>
                                    <div class="col-sm-1 input_wd3">
                                        <input type="text" class="form-control" id="topSpace" name="topSpace" value="<?php echo $structure['topSpace']; ?>">
                                        <span class="tp-unit">px</span>
                                    </div>
                                    <span class="control-label" style="float:left; padding-left:60px;">下边距</span>
                                    <div class="col-sm-1 input_wd3">
                                        <input type="text" class="form-control" id="bottomSpace" name="bottomSpace" value="<?php echo $structure['bottomSpace']; ?>">
                                        <span class="tp-unit">px</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状&nbsp;态：</label>
                                <div class="col-sm-6 input-group">
                                    <input type="checkbox" name="status" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($structure['status'] == 1): ?>checked<?php endif; ?>/>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2 button-group">
                                    <button class="btn btn-warning" type="submit" style="padding:6px 30px;"><i class="fa fa-save"></i> 保存</button>
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
<script src="/static/admin/js/iColorPicker.js" type="text/javascript"></script>
<script src="__JS__/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript">
    $("[data-toggle='tooltip']").tooltip();
    var mouseButtonFlag = false;//控制是否触发点击事件
    $( "#sortable" ).sortable({
        start: function (event, ui) {
            mouseButtonFlag = true;
        },
        stop: function (event, ui) {
            mouseButtonFlag = false;
            update_structure_order();
        }
    });
    $( ".ui_dl_menu" ).sortable({
        stop: function (event, ui) {
            update_structure_order();
        }
    });
    function show_menu(obj){
        if(mouseButtonFlag){
            return;
        }
        $(obj).siblings('.ui_dl_menu').slideDown();
        $(obj).find('.chevron').removeClass('fa-chevron-right').addClass('fa-chevron-down');
        $(obj).parent().siblings().find('.ui_dl_menu').slideUp();
        $(obj).parent().siblings().find('.chevron').removeClass('fa-chevron-down').addClass('fa-chevron-right');
    }
    //删除模块
    function del_structure(id){
        layer.confirm('确认删除此模块?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_structure"); ?>', {'id':id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000,shade: 0.1},function(){
                        layer.close(index);
                        window.location.href="<?php echo url('structure/index'); ?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                    return false;
                }
            });
            layer.close(index);
        })
    }
    //删除子版块
    function del_module(id){
        layer.confirm('确认删除此子版块?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_module"); ?>', {'id':id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000,shade: 0.1},function(){
                        layer.close(index);
                        window.location.href='<?php echo url("structure/add_module"); ?>?st_id='+res.data
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                    return false;
                }
            });
            layer.close(index);
        })
    }
    //设置模块状态
    function show_structure(id, obj){
        $.getJSON('<?php echo url("state_structure"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                $(obj).find('i').removeClass('fa-eye').addClass('fa-eye-slash').attr('title','不显示').attr('data-original-title', '不显示');
                $(obj).find('.tooltip-inner').text('不显示');
            }else if(res.code == 2){
                $(obj).find('i').removeClass('fa-eye-slash').addClass('fa-eye').attr('title','显示').attr('data-original-title', '显示');
                $(obj).find('.tooltip-inner').text('显示');
            }
        });
    }

    //设置模块状态
    function show_module(id, obj){
        $.getJSON('<?php echo url("state_module"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                $(obj).find('i').removeClass('fa-eye').addClass('fa-eye-slash').attr('title','不显示').attr('data-original-title', '不显示');
                $(obj).find('.tooltip-inner').text('不显示');
            }else if(res.code == 2){
                $(obj).find('i').removeClass('fa-eye-slash').addClass('fa-eye').attr('title','显示').attr('data-original-title', '显示');
                $(obj).find('.tooltip-inner').text('显示');
            }
        });
    }

    function update_structure_order(){
        $("#update_order").ajaxSubmit();
    }
</script>
<script type="text/javascript">
    $(function(){
        $('#edit_structure').ajaxForm({
            beforeSubmit: checkForm, 
            success: complete, 
            dataType: 'json'
        });
        
        function checkForm() {
            if ('' == $.trim($('#name').val())) {
                layer.msg('请输入模块名称', {icon: 2, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
            if (!/^\#[0-9a-fA-F]{6}$/.exec($('#bgcolor').val())) {
                layer.msg('背景颜色填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
            if (!isPositiveNum($('#topSpace').val()) || !isPositiveNum($('#bottomSpace').val())) {
                layer.msg('请输入正确的上下边距', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    location.reload();
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