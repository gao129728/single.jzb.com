<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/online/index.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<link href="/static/admin/iconfont/iconfont.css" rel="stylesheet">
<style>
    #list-attribute .long-td td i{cursor: pointer;}
    #list-attribute .long-td td i:hover{color:#ff6600;}
    #list-attribute .long-td .btn-blue{margin:2px 0 0 10px;}
    .onlineModel .radio img{position: relative; top: -2px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>在线客服</h5>
                </div>
                <div class="ibox-content" style="min-height:660px; position: relative;">
                    <div class="panel blank-panel">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">客服设置</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">显示设置</a></li>
                            </ul>
                        </div>
                        <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal" id="online">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="form-group">
                                        <label style="float:left; padding-left:15px;"></label>
                                        <div class="col-sm-7 input-group">
                                            <div style="padding-bottom:10px;">
                                                <button class="btn btn-primary" id="add-attribute" type="button">新增</button>
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr class="long-tr">
                                                    <th width="4%">排序</th>
                                                    <th width="10%">QQ号码</th>
                                                    <th width="12%">显示文字</th>
                                                    <th width="8%">图标样式</th>
                                                    <th width="8%">是否显示</th>
                                                    <th width="4%"></th>
                                                </tr>
                                                </thead>
                                                <tbody id="list-attribute">
                                                    <?php if(is_array($online_list) || $online_list instanceof \think\Collection || $online_list instanceof \think\Paginator): $i = 0; $__LIST__ = $online_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <tr class="long-td">
                                                        <td>
                                                            <span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span>
                                                            <input type="hidden" name="id[]" value="<?php echo $vo['id']; ?>">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="number[]" value="<?php echo $vo['number']; ?>"></td>
                                                        <td><input type="text" class="form-control kf_name" name="name[<?php echo $key; ?>]" value="<?php echo $vo['name']; ?>"></td>
                                                        <td>
                                                            <input type="hidden" name="show_icon[]" value="<?php echo $vo['show_icon']; ?>">
                                                            <img src="__IMG__/qqicon/<?php echo $vo['show_icon']; ?>.gif">
                                                            <a href="javascript:;" onclick="change_icon(this)" class="btn btn-blue btn-xs btn-outline">更改图标</a>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="state[<?php echo $key; ?>]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($vo['state'] == 1): ?>checked<?php endif; ?>/>
                                                        </td>
                                                        <td><i class="fa fa-times-rectangle fa-lg del-attr-tr"></i></td>
                                                    </tr>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示状态：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[status]" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($config['status'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">顶部标题：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" name="config[title]" id="title" value="<?php echo $config['title']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">标题样式：</label>
                                        <div class="input-group col-sm-10">
                                            <span class="control-label" style="float:left; padding-right:10px;">背景颜色</span>
                                            <div class="iColor-Picker">
                                                <input id="titbgcolor" type="text" class="form-control iColorPicker input_wd1" name="config[titbgcolor]" maxlength="7" value="<?php echo $config['titbgcolor']; ?>">
                                            </div>
                                            <span class="control-label" style="float:left; padding-right:10px;">字体颜色</span>
                                            <div class="iColor-Picker">
                                                <input id="titcolor" type="text" class="form-control iColorPicker input_wd1" name="config[titcolor]" maxlength="7" value="<?php echo $config['titcolor']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示宽度：</label>
                                        <div class="input-group col-sm-10">
                                            <div class="col-sm-1 input_wd3" style="padding-left:0;">
                                                <input type="text" class="form-control" name="config[width]" id="width" value="<?php echo $config['width']; ?>">
                                                <span class="tp-unit">px</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示位置：</label>
                                        <div class="input-group col-sm-6">
                                            <div class="radio i-checks">
                                                <input type="radio" name='config[position]' value="left" <?php if($config['position'] == 'left'): ?>checked<?php endif; ?>/>左侧&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name='config[position]' value="right" <?php if($config['position'] == 'right'): ?>checked<?php endif; ?>/>右侧&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">顶部距离：</label>
                                        <div class="input-group col-sm-10">
                                            <div class="col-sm-1 input_wd3" style="padding-left:0;">
                                                <input type="text" class="form-control" name="config[topSpace]" id="topSpace" value="<?php echo $config['topSpace']; ?>">
                                                <span class="tp-unit">px</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示样式：</label>
                                        <div class="input-group col-sm-10">
                                            <span class="control-label" style="float:left; padding-right:10px;">背景颜色</span>
                                            <div class="iColor-Picker">
                                                <input id="bgcolor" type="text" class="form-control iColorPicker input_wd1" name="config[bgcolor]" maxlength="7" value="<?php echo $config['bgcolor']; ?>">
                                            </div>
                                            <span class="control-label" style="float:left; padding-right:10px;">字体颜色</span>
                                            <div class="iColor-Picker">
                                                <input id="color" type="text" class="form-control iColorPicker input_wd1" name="config[color]" maxlength="7" value="<?php echo $config['color']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">默认展开：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[is_open]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($config['is_open'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示关闭按钮：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[show_btn]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($config['show_btn'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">二维码：</label>
                                        <div class="col-sm-2" style="padding:0;">
                                            <div class="uploadImg-box">
                                                <input type="file" name="qrcode" id="qrcode" class="imgFile" onchange="previewImage(this)"/>
                                                <div class="up-img <?php if($config['qrcode'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                                <?php if($config['qrcode'] != ''): ?>
                                                <input type="checkbox" name="delQrcode" class="input-del" value="1" />
                                                <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $config['qrcode']; ?>"/></div>
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
                                        <label class="col-sm-2 control-label">底部内容：</label>
                                        <div class="input-group col-sm-5">
                                            <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                            <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                            <textarea name="config[content]" id="myEditor1" style="width:100%"><?php echo $config['content']; ?></textarea>
                                            <script type="text/javascript">
                                                var editor1 = UE.getEditor('myEditor1', {
                                                    toolbars: [
                                                        ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','fontfamily','fontsize','lineheight','justifyleft','justifycenter','justifyright','justifyjustify']
                                                    ],
                                                    autoHeightEnabled: true,
                                                    autoFloatEnabled: true,
                                                    initialFrameHeight:150
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2 button-group">
                                    <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-blue btn-outline" href="javascript:;" onclick="kefuShow()" style="padding:6px 20px;"><i class="fa fa-eye"></i> 预览</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--客服预览-->
                    <div class="kefuBox">
                        <div class="kefuBg">
                            <h5>预览效果</h5>
                            <div class="kefu_online">
                                <div class="kf_openBtn"><i class="iconfont icon-kefu-tianchong"></i><p></p></div>
                                <h3 class="l_tit"></h3>
                                <a href="javascript:;" class="close">×</a>
                                <ul class="kefu_ul"></ul>
                                <div class="code"></div>
                                <div class="content"><?php echo $config['content']; ?></div>
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
<div class="onlineModel">
    <div class="ibox-content">
        <form action="" class="form-horizontal">
            <div class="form-group" style="padding:5px 0 5px 20px;">
                <div class="input-group col-sm-12">
                    <div class="radio i-checks">
                        <input type="radio" name='qq_icon' value="1" checked/><img src="__IMG__/qqicon/1.gif">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='qq_icon' value="2" /><img src="__IMG__/qqicon/2.gif">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='qq_icon' value="3" /><img src="__IMG__/qqicon/3.png">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='qq_icon' value="4" /><img src="__IMG__/qqicon/4.gif">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='qq_icon' value="5" /><img src="__IMG__/qqicon/5.gif">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name='qq_icon' value="6" /><img src="__IMG__/qqicon/6.gif">
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group button-group" style="text-align: center; margin-top:30px;">
                <button class="btn btn-warning" type="button" id="changeIcon" data-index="" style="padding:6px 20px;"> 确定 </button>
            </div>
        </form>
    </div>
</div>
<script src="__JS__/iColorPicker.js" type="text/javascript"></script>
<script src="__JS__/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript">
    $("[data-toggle='tooltip']").tooltip();
    $( "#list-attribute" ).sortable();
    $(window).scroll(function () {
        var offset = $(document).scrollTop();
        $('.kefuBg').stop().animate({ top: offset }, 500);
    });
    $(".kefuBox .kefu_online a.close").click(function(){
        var wd = $('#width').val()>260? 260 : $('#width').val();
        if($('input[name="config[position]"]:checked').val() == 'left'){
            $(".kefuBg").animate({left:'-'+wd+'px'});
        }else{
            $(".kefuBg").animate({right:'-'+wd+'px'});
        }
        $(".kf_openBtn").show(300);
    });
    $(".kf_openBtn").click(function(){
        $(this).hide(300);
        if($('input[name="config[position]"]:checked').val() == 'left'){
            $(".kefuBg").animate({left:0});
        }else{
            $(".kefuBg").animate({right:0});
        }
    });
    function kefuShow(){
        if(!$(".kefuBox").hasClass('animated')){
            $(".kefuBox").addClass('animated bounceInRight');
        }
        $('.kf_openBtn p, .kefu_online .l_tit').text($('#title').val());
        $(".kf_openBtn, .kefu_online .l_tit").css({"background-color":$('#titbgcolor').val(), 'color':$('#titcolor').val()});
        $(".kf_openBtn").css('margin-top','-'+$(".kf_openBtn").height()/2+'px');
        if($('input[name="config[show_btn]"]').is(':checked')){
            $('.kefu_online .close').show();
        }else{
            $('.kefu_online .close').hide();
        }
        $(".kefuBg").css({"width":$('#width').val()+'px'});
        if($('input[name="config[is_open]"]').is(':checked')){
            $(".kf_openBtn").hide(0);
            if($('input[name="config[position]"]:checked').val() == 'left'){
                $(".kefuBox").addClass('Psleft');
                $(".kefuBg").css({"left":0,"right":"auto"});
            }else{
                $(".kefuBox").removeClass('Psleft');
                $(".kefuBg").css({"left":'auto',"right":0});
            }
        }else{
            $(".kf_openBtn").show(0);
            var wd = $('#width').val()>260? 260 : $('#width').val();
            if($('input[name="config[position]"]:checked').val() == 'left'){
                $(".kefuBox").addClass('Psleft');
                $(".kefuBg").css('left','-'+wd+'px');
            }else{
                $(".kefuBox").removeClass('Psleft');
                $(".kefuBg").css('right','-'+wd+'px');
            }
        }
        $('.kefu_online').css({"background-color":$('#bgcolor').val(), 'color':$('#color').val()});
        if($('.uploadImg-box .imgView').length > 0){
            var src = $('.uploadImg-box .imgView img').attr('src');
            $('.kefu_online .code').html('<img src="'+src+'">');
        }else{
            $('.kefu_online .code').html('');
        }
        $('.kefu_ul').html('');
        $('#list-attribute .long-td').each(function(){
            var kf_name = $(this).find('.kf_name').val();
            var src = $(this).find('img').attr('src');
            var num = $(this).find('input[name="number[]"]').val();
            var li = '<li><a href="http://wpa.qq.com/msgrd?v=3&uin='+num+'&site=qq&menu=yes" target="_blank"><img src="'+src+'"/><span>'+kf_name+'</span></a></li>';
            $('.kefu_ul').append(li);
        });
        $('.kefu_online .content').html(editor1.getContent());
    }
</script>
<script type="text/javascript">
    $('#add-attribute').click(function(){
        var orderby = 0;
        $('input[name="sortnum[]"]').each(function(){
           if(parseInt($(this).val()) > orderby){
               orderby = parseInt($(this).val());
           }
        });
        sortnum = orderby+10;

        var index   = $("#list-attribute .long-td").length;
        var htmlStr = '';
        htmlStr += '<tr class="long-td">';
        htmlStr += '<td><span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span>';
        htmlStr += '<td><input type="text" class="form-control" name="number[]" value=""></td>';
        htmlStr += '<td><input type="text" class="form-control kf_name" name="name['+ index +']" value=""></td>';
        htmlStr += '<td><input type="hidden" name="show_icon[]" value="1"><img src="__IMG__/qqicon/1.gif">';
        htmlStr += '<a href="javascript:;" onclick="change_icon(this)" class="btn btn-blue btn-xs btn-outline">更改图标</a></td>';
        htmlStr += '<td><input type="checkbox" name="state['+ index +']" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" checked/></td>';
        htmlStr += '<td><i class="fa fa-times-circle fa-2x del-table-tr"></i></td>';
        htmlStr += '</tr>';
        $('#list-attribute').append(htmlStr);
        $('#list-attribute .lcs_check').lc_switch();
    });

    $('.del-attr-tr').click(function(){
        var parent = $(this).parents('.long-td');
        var id = parent.find("input[name='id[]']").val();
        layer.confirm('确认删除此客服吗?', {icon: 3, title:'提示'}, function(index){
            $.getJSON("<?php echo url('online/del_online'); ?>", {'id' : id}, function(res){
                if(res.code == 1){
                    parent.remove();
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        })
    });

    $('#list-attribute').on('click','.del-table-tr', function(){
        $(this).parents('.long-td').remove();
    });

    var model;
    function change_icon(obj){
        //页面层
        model = layer.open({
            type: 1,
            title:'图标样式',
            skin: 'layui-layer-demo', //加上边框
            area: ['630px', '205px'], //宽高
            content: $('.onlineModel')
        });
        var index = $(obj).parents('.long-td').index();
        $('#changeIcon').attr('data-index', index);
    }

    $('#changeIcon').click(function(){
     var val = $('.onlineModel input[name="qq_icon"]:checked').val();
     var index = $(this).attr('data-index');
     var obj = $('#list-attribute .long-td').eq(index);
     obj.find('input[name="show_icon[]"]').val(val);
     obj.find('img').attr("src","__IMG__/qqicon/"+ val +".gif");
     layer.close(model);
     });

    $(function(){
        $('#online').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if($('#title').val() == ''){
                layer.msg('请输入顶部标题', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if(!isPositiveNum($('#width').val())){
                layer.msg('显示宽度输入不正确', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if(!isPositiveNum($('#topSpace').val()) ){
                layer.msg('顶部距离输入不正确', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if (!/^\#[0-9a-fA-F]{6}$/.exec($('#bgcolor').val()) || !/^\#[0-9a-fA-F]{6}$/.exec($('#color').val()) || !/^\#[0-9a-fA-F]{6}$/.exec($('#titbgcolor').val()) || !/^\#[0-9a-fA-F]{6}$/.exec($('#titcolor').val()))
            {
                layer.msg('背景颜色或字体颜色填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
            if($('#qrcode').val() != ''){
                var ext = $('#qrcode').val().substr($('#qrcode').val().length - 3).toLowerCase();
                if (ext != "gif" && ext != "jpg" && ext != "png")
                {
                    layer.msg('图片必须是GIF、JPG或PNG格式！', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }

            var result = true;
            $('#list-attribute .long-td').each(function(){
                if($(this).find('input[name="number[]"]').val() == ''){
                    layer.msg('QQ号码不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
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
