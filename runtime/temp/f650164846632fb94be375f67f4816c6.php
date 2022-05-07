<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/baimusen.cn/public/../application/admin/view/website/config.html";i:1534988232;s:76:"/www/wwwroot/baimusen.cn/public/../application/admin/view/public/header.html";i:1532138656;s:76:"/www/wwwroot/baimusen.cn/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    .radio{position:relative; display: inline-block; padding-right:20px;}
    .radio .group_item{float:left; white-space: nowrap; padding-right:30px;}
    .member_group .help-question{margin-top:-8px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>网站配置</h5>
                </div>
                <div class="ibox-content">       
                    <div class="panel blank-panel">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本设置</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">高级设置</a></li>
                            </ul>
                        </div>
                        <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal" id="config">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站Logo：</label>
                                        <div class="col-sm-2" style="padding:0;">
                                            <div class="uploadImg-box">
                                                <input type="file" name="web_site_logo" id="web_site_logo" class="imgFile" onchange="previewImage(this)"/>
                                                <div class="up-img <?php if($config['web_site_logo'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                                <?php if($config['web_site_logo'] != ''): ?>
                                                <input type="checkbox" name="delLogo" class="input-del" value="1" />
                                                <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_logo']; ?>"/></div>
                                                <?php endif; ?>
                                                <div class="uploadCover">
                                                    <div class="ulinfo clearfix">
                                                        <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                                        <span class="up-del"><i class="fa fa-close"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="tips-text">仅支持jpg、png、gif</p>
                                        </div>
                                        <label class="col-sm-1 control-label">二维码：</label>
                                        <div class="col-sm-2" style="padding:0;">
                                            <div class="uploadImg-box">
                                                <input type="file" name="web_site_qrcode" id="web_site_qrcode" class="imgFile" onchange="previewImage(this)"/>
                                                <div class="up-img <?php if($config['web_site_qrcode'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                                <?php if($config['web_site_qrcode'] != ''): ?>
                                                <input type="checkbox" name="delQrcode" class="input-del" value="1" />
                                                <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_qrcode']; ?>"/></div>
                                                <?php endif; ?>
                                                <div class="uploadCover">
                                                    <div class="ulinfo clearfix">
                                                        <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                                        <span class="up-del"><i class="fa fa-close"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="tips-text">仅支持jpg、png、gif，推荐尺寸：100*100px</p>
                                        </div>
                                        <label class="col-sm-1 control-label">网站Ico：</label>
                                        <div class="col-sm-2" style="padding:0;">
                                            <div class="uploadImg-box sm-uploadImg">
                                                <input type="file" name="web_site_ico" id="web_site_ico" class="imgFile" onchange="previewImage(this,'ico')"/>
                                                <div class="up-img <?php if($config['web_site_ico'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>上传ico</p></div>
                                                <?php if($config['web_site_ico'] != ''): ?>
                                                <input type="checkbox" name="delIco" class="input-del" value="1" />
                                                <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $config['web_site_ico']; ?>"/></div>
                                                <?php endif; ?>
                                                <div class="uploadCover">
                                                    <div class="ulinfo clearfix">
                                                        <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                                        <span class="up-del"><i class="fa fa-close"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="tips-text">仅支持ico，<a href="http://www.bitbug.net" target="_blank">推荐格式在线转换地址</a></p>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站名称：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" id="web_site_name" name="config[web_site_name]" value="<?php echo $config['web_site_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站标题：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" id="web_site_title" name="config[web_site_title]" value="<?php echo $config['web_site_title']; ?>">
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="网站首页SEO标题"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站关键字：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" name="config[web_site_keyword]" value="<?php echo $config['web_site_keyword']; ?>">
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="网站SEO关键字"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站描述：</label>
                                        <div class="input-group col-sm-4">
                                            <textarea class="form-control" type="text" rows="3" name="config[web_site_description]"><?php echo $config['web_site_description']; ?></textarea>
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="网站SEO描述"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">服务热线：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control input_wd2" name="config[web_service_line]" value="<?php echo $config['web_service_line']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站备案号：</label>
                                        <div class="input-group col-sm-4">
                                            <input type="text" class="form-control" name="config[web_site_icp]" value="<?php echo $config['web_site_icp']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">联系我们：</label>
                                        <div class="input-group col-sm-6">
                                            <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                            <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                            <textarea name="config[web_site_contact]" id="myEditor1" style="width:100%"><?php echo $config['web_site_contact']; ?></textarea>
                                            <script type="text/javascript">
                                                var editor1 = UE.getEditor('myEditor1', {
                                                    toolbars: [
                                                        ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','fontfamily','fontsize','lineheight','justifyleft','justifycenter','justifyright','justifyjustify', '|','link','unlink']
                                                    ],
                                                    autoHeightEnabled: true,
                                                    autoFloatEnabled: true,
                                                    initialFrameHeight:200
                                                });
                                            </script>
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="网站底部联系信息"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">版权信息：</label>
                                        <div class="input-group col-sm-6">
                                            <textarea name="config[web_site_copy]" id="myEditor2" style="width:100%"><?php echo $config['web_site_copy']; ?></textarea>
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
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="设置在网站底部显示的版权信息"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站风格：</label>
                                        <div class="col-sm-8 input-group">
                                            <input type="hidden" id="web_site_style" name="config[web_site_style]" value="<?php echo $config['web_site_style']; ?>"/>
                                            <div class="web-style-option clearfix">
                                                <span class="theme color1 <?php if($config['web_site_style'] == 1): ?>active<?php endif; ?>" data-value="1"></span>
                                                <span class="theme color2 <?php if($config['web_site_style'] == 2): ?>active<?php endif; ?>" data-value="2"></span>
                                                <span class="theme color3 <?php if($config['web_site_style'] == 3): ?>active<?php endif; ?>" data-value="3"></span>
                                                <span class="theme color4 <?php if($config['web_site_style'] == 4): ?>active<?php endif; ?>" data-value="4"></span>
                                                <span class="theme color5 <?php if($config['web_site_style'] == 5): ?>active<?php endif; ?>" data-value="5"></span>
                                                <span class="theme color6 <?php if($config['web_site_style'] == 6): ?>active<?php endif; ?>" data-value="6"></span>
                                                <span class="theme color7 <?php if($config['web_site_style'] == 7): ?>active<?php endif; ?>" data-value="7"></span>
                                                <span class="theme color8 <?php if($config['web_site_style'] == 8): ?>active<?php endif; ?>" data-value="8"></span>
                                                <span class="theme color9 <?php if($config['web_site_style'] == 9): ?>active<?php endif; ?>" data-value="9"></span>
                                                <span class="theme color10 <?php if($config['web_site_style'] == 10): ?>active<?php endif; ?>" data-value="10"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">导航样式：</label>
                                        <div class="col-sm-10 input-group">
                                            <div class="radio i-checks clearfix">
                                                <span class="group_item"><input type="radio" name='config[web_nav_style]' value="1" <?php if($config['web_nav_style'] == 1): ?>checked<?php endif; ?>/>导航样式1</span>
                                                <span class="group_item"><input type="radio" name='config[web_nav_style]' value="2" <?php if($config['web_nav_style'] == 2): ?>checked<?php endif; ?>/>导航样式2</span>
                                                <span class="group_item"><input type="radio" name='config[web_nav_style]' value="3" <?php if($config['web_nav_style'] == 3): ?>checked<?php endif; ?>/>导航样式3</span>
                                                <span class="group_item"><input type="radio" name='config[web_nav_style]' value="4" <?php if($config['web_nav_style'] == 4): ?>checked<?php endif; ?>/>导航样式4</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示导航下拉：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[web_subnav]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($config['web_subnav'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站屏蔽右键：</label>
                                        <div class="col-sm-6 input-group">
                                            <input type="checkbox" name="config[web_rightbutton]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($config['web_rightbutton'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站会员功能：</label>
                                        <div class="col-sm-6 input-group site_member">
                                            <input type="checkbox" name="config[web_site_member]" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($config['web_site_member'] == 1): ?>checked<?php endif; ?>/>
                                        </div>
                                    </div>
                                    <?php if($member_group): ?>
                                    <div class="member_group <?php if($config['web_site_member'] != 1): ?>hidden-box<?php endif; ?>">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">开启会员注册：</label>
                                            <div class="col-sm-6 input-group site_member">
                                                <input type="checkbox" name="config[web_member_reg]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($config['web_member_reg'] == 1): ?>checked<?php endif; ?>/>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">默认会员等级：</label>
                                            <div class="col-sm-10 input-group">
                                                <div class="radio i-checks clearfix">
                                                    <?php if(is_array($member_group) || $member_group instanceof \think\Collection || $member_group instanceof \think\Paginator): $i = 0; $__LIST__ = $member_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <span class="group_item"><input type="radio" name='config[web_member_group]' value="<?php echo $vo['id']; ?>" <?php if($config['web_member_group'] == $vo['id']): ?>checked<?php endif; ?>/><?php echo $vo['group_name']; ?></span>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="会员注册时默认的会员等级"><i class="fa fa-question-circle-o"></i></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">头部Javascript代码：</label>
                                        <div class="input-group col-sm-4">
                                            <textarea class="form-control" type="text" rows="3" name="config[web_head_javascript]"><?php echo $config['web_head_javascript']; ?></textarea>
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="加在页面头部head标签中，请确保代码的安全性"><i class="fa fa-question-circle-o"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">底部Javascript代码：</label>
                                        <div class="input-group col-sm-4">
                                            <textarea class="form-control" type="text" rows="3" name="config[web_footer_javascript]"><?php echo $config['web_footer_javascript']; ?></textarea>
                                            <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="加在页面底部，请确保代码的安全性"><i class="fa fa-question-circle-o"></i></a></span>
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
    $(".web-style-option .theme").click(function(){
        var val = $(this).attr('data-value');
        $(this).addClass('active').siblings().removeClass('active');
        $('#web_site_style').val(val);
    });

    $('.site_member').delegate('.lcs_check', 'lcs-statuschange', function() {
        var status = $(this).is(':checked');
        if(status){
            $('.member_group').show();
        }else{
            $('.member_group').hide();
        }
    });

    $(function(){
        $('#config').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if($('#web_site_name').val() == ''){
                layer.msg('请输入网站名称！', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if($('#web_site_title').val() == ''){
                layer.msg('请输入网站标题！', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if($('#web_site_logo').val() != ''){
                var ext = $('#web_site_logo').val().substr($('#web_site_logo').val().length - 3).toLowerCase();
                if (ext != "gif" && ext != "jpg" && ext != "png")
                {
                    layer.msg('图片必须是GIF、JPG或PNG格式！', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }
            if($('#web_site_qrcode').val() != ''){
                var ext = $('#web_site_qrcode').val().substr($('#web_site_qrcode').val().length - 3).toLowerCase();
                if (ext != "gif" && ext != "jpg" && ext != "png")
                {
                    layer.msg('图片必须是GIF、JPG或PNG格式！', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
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
