<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/batch/replace.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
                    <h5>批量替换</h5>
                </div>
                <div class="ibox-content">
                    <form action="<?php echo url('replace'); ?>" method="post" class="form-horizontal" id="replace">
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
                            <label class="col-sm-2 control-label">替换类别：</label>
                            <div class="input-group col-sm-8">
                                <div class="checkbox-box clearfix">
                                    <span><input type='checkbox' class="i-checks" name='classes[title]' value='1'> 标题</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[intro]' value='1'> 简介</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[content]' value='1'> 详细内容</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[source]' value='1'> 来源</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[writer]' value='1'> 作者</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[website]' value='1'> 链接网址</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[seo_title]' value='1'> 网页标题</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[keyword]' value='1'> 网页关键字</span>
                                    <span><input type='checkbox' class="i-checks" name='classes[description]' value='1'> 网页描述</span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">替换内容：</label>
                            <div class="input-group col-sm-10">
                                <span class="control-label" style="float:left;">原始内容</span>
                                <div class="col-sm-3"><textarea class="form-control" type="text" rows="2" name="oldtext" id="oldtext"></textarea></div>
                                <span class="control-label" style="float:left; padding-left:50px;">替换内容</span>
                                <div class="col-sm-3"><textarea class="form-control" type="text" rows="2" name="newtext" id="newtext"></textarea></div>
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
                                        <p>1、如原始内容为空，则替换内容将覆盖原始内容。</p>
                                        <p>2、如替换内容为空，则将原内容替换为空。</p>
                                        <p>3、如原内容在信息中未找到，则不会替换。</p>
                                        <p>4、信息替换后不可恢复，请慎重。</p>
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
    $(function(){
        $('#replace').ajaxForm({
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
                layer.msg('请选择替换类别', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            if ($.trim($('#oldtext').val()) == '' && $.trim($('#newtext').val()) == '')
            {
                layer.msg('原始内容和替换内容不能都为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

            load = layer.load(0, {
                shade: [0.5,'#000'],
                content:'替换中...'
            });
        }

        function complete(data){
            layer.close(load);
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
