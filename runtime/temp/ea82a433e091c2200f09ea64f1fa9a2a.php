<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:73:"E:\php\single.jzb.com\public/../application/admin/view/sidebar/index.html";i:1535082570;s:73:"E:\php\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:74:"E:\php\single.jzb.com\public/../application/admin/view/sidebar/global.html";i:1535012368;s:73:"E:\php\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;s:77:"E:\php\single.jzb.com\public/../application/admin/view/sidebar/global_js.html";i:1535012348;}*/ ?>
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
<style type="text/css">
    .panel-options{padding-bottom:30px;}
    .param-set-box{padding-top:15px;}
    .param-set-box .set-item{width:100%; margin:0; border-top:none;}
    .param-set-box .item .lcs_wrap{ vertical-align: top; padding-right:30px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>内页配置</h5>
                </div>
                <div class="ibox-content clearfix" style="padding-top:20px;">
                    <div class="panel blank-panel">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li <?php if($nav_menu == 'inside'): ?>class="active"<?php endif; ?>><a href="<?php echo url('website/inside'); ?>">基本设置</a></li>
                                <li <?php if($nav_menu == 'sidebar'): ?>class="active"<?php endif; ?>><a href="<?php echo url('sidebar/index'); ?>">侧边栏设置</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
    <form name="update_order" id="update_order" method="post" action="<?php echo url('update_order'); ?>">
        <div class="file-manager" style="overflow:hidden; overflow-y:auto;">
            <div class="homefa"><i class="fa fa-reorder"></i>侧边栏结构示意图</div>
            <ul id="sortable" class="Ulsort">
                <?php if(is_array($module_list) || $module_list instanceof \think\Collection || $module_list instanceof \think\Paginator): $i = 0; $__LIST__ = $module_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li class="ui-state <?php if($module_id == $item['id']): ?>active<?php endif; ?>">
                    <input type="hidden" name="mo_id[]" value="<?php echo $item['id']; ?>">
                    <div class="ui-state-box">
                        <span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span>
                        <span><?php echo $item['title']; ?></span>
                        <span class="pull-right"><i class="chevron fa fa-chevron-right"></i></span>
                        <i class="fa fa-caret-right"></i>
                    </div>
                    <span class="handle-btn">
                        <a href="javascript:;" onclick="show_module(<?php echo $item['id']; ?>,this)"><i class="fa <?php echo !empty($item['status'])?'fa-eye':'fa-eye-slash'; ?>" data-toggle="tooltip" title="<?php echo !empty($item['status'])?'显示':'不显示'; ?>"></i></a>
                        <a href="<?php echo url('sidebar/edit_module',['id'=>$item['id']]); ?>"><i class="fa fa-pencil" data-toggle="tooltip" title="编辑"></i></a>
                        <a href="javascript:;" onclick="del_module(<?php echo $item['id']; ?>)"><i class="fa fa-trash-o" data-toggle="tooltip" title="删除"></i></a>
                    </span>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="add_module">
                <a href="<?php echo url('index'); ?>">
                    <i class="fa fa-plus"></i>
                    添加侧边栏模块
                </a>
            </div>
        </div>
    </form>
</div>
                    <div class="col-sm-8">
                        <form class="form-horizontal" name="add_module" id="add_module" method="post" action="<?php echo url('index'); ?>">
                            <div class="form-group">
                                <label class="col-sm-2" style="font-weight: 100; padding-left:20px; color:#ff6600;; font-size: 15px;">添加模块</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题：</label>
                                <div class="input-group col-sm-4">
                                    <input type="text" id="title" class="form-control" name="title" value="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">显示"更多"：</label>
                                <div class="col-sm-6 input-group">
                                    <input type="checkbox" name="isMore" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容来源：</label>
                                <div class="content-source">
                                    <div class="col-sm-3 input-group">
                                        <select class="form-control" name="cateId" id='cateId'>
                                            <option value="">请选择栏目分类</option>
                                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">显示方式：</label>
                                <div class="col-sm-9 input-group">
                                    <div class="radio i-checks">
                                        <?php if(is_array($module_style_param) || $module_style_param instanceof \think\Collection || $module_style_param instanceof \think\Paginator): $i = 0; $__LIST__ = $module_style_param;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <input type="radio" name='module_style' value="<?php echo $key; ?>" <?php if($key == 1): ?>checked<?php endif; ?>/><?php echo $vo['style']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                    <div class="param-set-box">
                                        <div class="set-item set-item-1">
                                            <input type="hidden" name="paramCnt[1]" value="4">
                                            <div class="item clearfix">
                                                <label class="item-label">显示个数</label>
                                                <div class="con">
                                                    <input type="text" class="text checknum" name='styleParam[1][0]' value="<?php echo $styleParam[1][0]; ?>"/>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">图片尺寸</label>
                                                <div class="con">
                                                    <span>宽度</span><input type="text" class="text checknum img_wd" name='styleParam[1][1]' value="<?php echo $styleParam[1][1]; ?>"/><b>px</b>
                                                    <span>高度</span><input type="text" class="text checknum" name='styleParam[1][2]' value="<?php echo $styleParam[1][2]; ?>"/><b>px</b>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">图片边框</label>
                                                <div class="con">
                                                    <input type="checkbox" name="styleParam[1][3]" value="1" class="lcs_check img_bd" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][3] == 1): ?>checked<?php endif; ?>/>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">图片标题</label>
                                                <div class="con">
                                                    <input type="checkbox" name="styleParam[1][4]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][4] == 1): ?>checked<?php endif; ?>/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="set-item set-item-2 hidden-box">
                                            <input type="hidden" name="paramCnt[2]" value="5">
                                            <div class="item clearfix">
                                                <label class="item-label">显示个数</label>
                                                <div class="con"><input type="text" class="text checknum" name='styleParam[2][0]' value="<?php echo $styleParam[2][0]; ?>"/></div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">标题字数</label>
                                                <div class="con">
                                                    <input type="text" class="text checknum" name='styleParam[2][1]' value="<?php echo $styleParam[2][1]; ?>"/>
                                                    <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">显示简介</label>
                                                <div class="con">
                                                    <input type="checkbox" name="styleParam[2][2]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][2] == 1): ?>checked<?php endif; ?>/>
                                                    <span>简介字数</span><input type="text" class="text checknum" name='styleParam[2][3]' value="<?php echo $styleParam[2][3]; ?>"/>
                                                    <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">显示左侧图片</label>
                                                <div class="con">
                                                    <input type="checkbox" name="styleParam[2][4]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][4] == 1): ?>checked<?php endif; ?>/>
                                                    <span style="display:inline-block; line-height: 40px;">图片边框</span><input type="checkbox" name="styleParam[2][5]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[2][5] == 1): ?>checked<?php endif; ?>/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="set-item set-item-3 hidden-box">
                                            <input type="hidden" name="paramCnt[3]" value="6">
                                            <div class="item clearfix">
                                                <label class="item-label">显示个数</label>
                                                <div class="con"><input type="text" class="text checknum" name='styleParam[3][0]' value="<?php echo $styleParam[3][0]; ?>"/></div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">图片尺寸</label>
                                                <div class="con">
                                                    <span>宽度</span><input type="text" class="text checknum img_wd" name='styleParam[3][1]' value="<?php echo $styleParam[3][1]; ?>"/><b>px</b>
                                                    <span>高度</span><input type="text" class="text checknum" name='styleParam[3][2]' value="<?php echo $styleParam[3][2]; ?>"/><b>px</b>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">图片标题</label>
                                                <div class="con">
                                                    <input type="checkbox" name="styleParam[3][3]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[3][3] == 1): ?>checked<?php endif; ?>/>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">自动切换</label>
                                                <div class="con"><input type="checkbox" name="styleParam[3][4]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[3][4] == 1): ?>checked<?php endif; ?>/></div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">切换效果</label>
                                                <div class="con">
                                                    <div class="radio i-checks">
                                                        <input type="radio" name='styleParam[3][5]' value="leftLoop" <?php if($styleParam[3][5] == 'leftLoop'): ?>checked<?php endif; ?>/>向左滑动&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name='styleParam[3][5]' value="fold" <?php if($styleParam[3][5] == 'fold'): ?>checked<?php endif; ?>/>柔和渐变&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name='styleParam[3][5]' value="fade" <?php if($styleParam[3][5] == 'fade'): ?>checked<?php endif; ?>/>淡入淡出
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item clearfix">
                                                <label class="item-label">显示左右按钮</label>
                                                <div class="con"><input type="checkbox" name="styleParam[3][6]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[3][6] == 1): ?>checked<?php endif; ?>/></div>
                                            </div>
                                        </div>
                                        <div class="set-item set-item-4 hidden-box">
                                            <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                            <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                            <textarea name="styleParam[4]" style="width:100%" id="myEditor"></textarea>
                                            <script type="text/javascript">
                                                UE.getEditor('myEditor', {
                                                    autoHeightEnabled: true,
                                                    autoFloatEnabled: true,
                                                    initialFrameHeight:200
                                                });
                                            </script>
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
<script src="__JS__/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript">
    $("[data-toggle='tooltip']").tooltip();
    $( "#sortable" ).sortable({
        stop: function (event, ui) {
            update_module_order();
        }
    });
    //删除模块
    function del_module(id){
        layer.confirm('确认删除此模块?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_module"); ?>', {'id':id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000,shade: 0.1},function(){
                        layer.close(index);
                        window.location.href='<?php echo url("sidebar/index"); ?>'
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
    function show_module(id, obj){
        $.getJSON('<?php echo url("state_module"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                $(obj).find('i').removeClass('fa-eye').addClass('fa-eye-slash').attr('title','不显示').attr('data-original-title','不显示');
                $(obj).find('.tooltip-inner').text('不显示');
            }else if(res.code == 2){
                $(obj).find('i').removeClass('fa-eye-slash').addClass('fa-eye').attr('title','显示').attr('data-original-title','显示');
                $(obj).find('.tooltip-inner').text('显示');
            }
        });
    }

    function update_module_order(){
        $("#update_order").ajaxSubmit();
    }
</script>
<script type="text/javascript">
    $('input[name="module_style"]').on('ifChecked', function(event){
        var val = $(this).val();
        var item = $('.param-set-box .set-item-'+val);
        item.show();
        item.siblings().hide();
    });

    $(function(){
        $('#add_module').ajaxForm({
            beforeSubmit: checkForm, 
            success: complete, 
            dataType: 'json'
        });
        
        function checkForm() {
            if ('' == $.trim($('#title').val())) {
                layer.msg('请输入标题', {icon: 2, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            var result = true;
            var module_style = $('input[name="module_style"]:checked').val();

            if(module_style != 4 && $('#cateId').val() == ''){
                layer.msg('请选择内容来源', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            $('.set-item-'+ module_style +' .checknum').each(function(){
                val = $(this).val();
                if(!isPositiveNum(val)){
                    layer.msg('请输入合法的显示方式设置参数', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    result = false;
                    return false;
                }
            });
            if(!result){
                return false;
            }

            if(module_style == 1 || module_style == 3){
                $max_width = 268;
                if(module_style == 1 && $(".img_bd").is(':checked'))  $max_width = 266;
                if($('.set-item-'+ module_style +' .img_wd').val() > $max_width){
                    layer.msg('图片宽度不能大于'+$max_width+'px', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
            }
        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.href='<?php echo url("sidebar/edit_module"); ?>?id='+data.data;
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