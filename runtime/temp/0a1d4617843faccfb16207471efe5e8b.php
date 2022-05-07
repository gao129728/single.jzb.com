<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/other/add_other.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/admin/webUploader/css/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/webUploader/css/style.css" />
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight" style="overflow-y:auto;">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-title-goback">
                        <a href="<?php echo $backUrl; ?>"><i class="fa fa-reply"></i> 返回</a>
                    </div>
                    <h5>添加<?php echo $cate['name']; ?></h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" name="add" id="add" method="post" action="add_article">
                        <input type="hidden" name="otherId" value="<?php echo $cate['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题：</label>
                            <div class="input-group col-sm-4">
                                <input id="title" type="text" class="form-control" name="title"  placeholder="请输入标题" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">序号：</label>
                            <div class="input-group col-sm-4">
                                <input id="sortnum" type="text" class="form-control input_wd1" name="sortnum" value="<?php echo $sortnum; ?>">
                            </div>
                        </div>
                        <?php if(in_array((1), is_array($cate['rules'])?$cate['rules']:explode(',',$cate['rules']))): ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">缩略图：</label>
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
                        <?php endif; if(in_array((2), is_array($cate['rules'])?$cate['rules']:explode(',',$cate['rules']))): ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">链接地址：</label>
                            <div class="input-group col-sm-4">
                                <input id="url" type="text" class="form-control" name="url" placeholder="请输入连接地址" >
                                <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="输入完整的连接地址，包含http://"><i class="fa fa-question-circle-o"></i></a></span>
                            </div>
                        </div>
                        <?php endif; if(in_array((3), is_array($cate['rules'])?$cate['rules']:explode(',',$cate['rules']))): ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">链接栏目：</label>
                            <div class="input-group col-sm-2">
                                <select class="form-control" name="cateId">
                                    <option value="">请选择栏目分类</option>
                                    <?php if(is_array($article_cate) || $article_cate instanceof \think\Collection || $article_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $article_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="链接到所选栏目分类"><i class="fa fa-question-circle-o"></i></a></span>
                            </div>
                        </div>
                        <?php endif; ?>
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
                                <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="<?php echo $backUrl; ?>"><i class="fa fa-close"></i> 返回</a>
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
        $('#add').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#title').val())){
                layer.msg('标题不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
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
            if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.href="<?php echo $backUrl; ?>";
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
