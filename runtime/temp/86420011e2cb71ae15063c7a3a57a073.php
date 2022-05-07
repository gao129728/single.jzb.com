<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"E:\php_project\single.jzb.com\public/../application/admin/view/other/edit_cate.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
                    <h5>编辑附加分类</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" name="edit_cate" id="edit_cate" method="post" action="<?php echo url('edit_cate'); ?>">
                        <input type="hidden" name="id" value="<?php echo $cate['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类名称：</label>
                            <div class="input-group col-sm-4">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $cate['name']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排&nbsp;&nbsp;序：</label>
                            <div class="input-group col-sm-4">
                                <input id="sortnum" type="text" class="form-control input_wd1" name="sortnum" value="<?php echo $cate['sortnum']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">编辑选项：</label>
                            <div class="input-group col-sm-6">
                                <div class="radio i-checks">
                                    <input type="checkbox" name='rules[]' value="1" <?php if(in_array((1), is_array($cate['rules'])?$cate['rules']:explode(',',$cate['rules']))): ?>checked<?php endif; ?>/>缩略图&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" name='rules[]' value="2" <?php if(in_array((2), is_array($cate['rules'])?$cate['rules']:explode(',',$cate['rules']))): ?>checked<?php endif; ?>/>链接地址&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" name='rules[]' value="3" <?php if(in_array((3), is_array($cate['rules'])?$cate['rules']:explode(',',$cate['rules']))): ?>checked<?php endif; ?>/>链接栏目

                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">状&nbsp;态：</label>
                            <div class="col-sm-6 input-group">
                                <input type="checkbox" name="status" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" <?php if($cate['status'] == 1): ?>checked<?php endif; ?>/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2 button-group">
                                <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.back();"><i class="fa fa-close"></i> 返回</a>
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
    $(function(){
        $('#edit_cate').ajaxForm({
            beforeSubmit: checkForm, 
            success: complete, 
            dataType: 'json'
        });
        
        function checkForm(){
            if( '' == $.trim($('#name').val())){
                layer.msg('请输入分类名称',{icon:5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if ($.trim($('#sortnum').val()) == '' || $.trim($('#sortnum').val()).match(/\D/))
            {
                layer.msg('请输入合法的序号', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }
        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('other/index_cate'); ?>";
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