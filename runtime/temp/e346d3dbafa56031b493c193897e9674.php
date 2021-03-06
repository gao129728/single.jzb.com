<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/article/add_article.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
                    <h5>添加内容</h5>
                </div>
                <div class="ibox-content">
                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本设置</a></li>
                            <?php if($isMultiple == 1): ?>
                            <li><a data-toggle="tab" href="#tab-3" aria-expanded="false">产品设置</a></li>
                            <?php endif; ?>
                            <li><a data-toggle="tab" href="#tab-2" aria-expanded="false">高级设置</a></li>
                        </ul>
                    </div>
                    <form class="form-horizontal m-t" name="add" id="add" method="post" action="add_article">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">所属分类：</label>
                                    <div class="input-group col-sm-4">
                                        <select class="form-control m-b chosen-select" name="cate_id" id="cate_id">
                                            <option value="">==请选择==</option>
                                            <?php if(!empty($cateList)): if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): if( count($cateList)==0 ) : echo "" ;else: foreach($cateList as $key=>$vo): ?>
                                            <option value="<?php echo $vo['id']; ?>" <?php if($cate_id == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
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
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">发布日期：</label>
                                    <div class="input-group col-sm-4">
                                        <input type="text" class="form-control input_wd2" id="create_time" name="create_time" value="<?php echo $create_time; ?>" readonly="readonly" style="background:url(__IMG__/WdatePicker.jpg) no-repeat 97% center">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">访问量：</label>
                                    <div class="input-group col-sm-4">
                                        <input type="text" name="views" id="views" class="form-control input_wd1" value="0">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">置&nbsp;顶：</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="checkbox" name="isTop" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off"/>
                                    </div>
                                </div>
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
                                <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label " for="myEditor">详细内容：</label>
                                    <div class="input-group col-sm-7">
                                        <textarea name="content" style="width:100%" id="myEditor"></textarea>
                                        <script type="text/javascript">
                                            var editor = new UE.ui.Editor();
                                            editor.render("myEditor");
                                        </script>
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
                                        <textarea type="text" rows="5" name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">链接网址：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="website" type="text" class="form-control" name="website">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">作者：</label>
                                    <div class="input-group col-sm-4">
                                        <input type="text" name="writer" id="writer" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">来源：</label>
                                    <div class="input-group col-sm-4">
                                        <input type="text" name="source" id="source" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php if($isMultiple == 1): ?>
                            <div id="tab-3" class="tab-pane">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label " for="myEditor">产品简介：</label>
                                    <div class="input-group col-sm-7">
                                        <textarea name="intro" id="myEditor1" style="width:100%"></textarea>
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
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">多&nbsp;图：</label>
                                    <div class="col-sm-7 input-group">
                                        <ul class="multi-img" id="multi-img-sortable"></ul>
                                        <div id="wrapper">
                                            <div id="container">
                                                <div id="uploader">
                                                    <div class="queueList">
                                                        <div id="dndArea" class="placeholder">
                                                            <div id="filePicker"></div>
                                                            <p class="tips">或将照片拖到这里，单次最多可选100张</p>
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
                            <?php endif; ?>
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
<?php if($isMultiple == 1): ?>
    <script type="text/javascript" src="/static/admin/webUploader/webuploader.min.js"></script>
    <script type="text/javascript" src="/static/admin/webUploader/upload_img.js"></script>
    <script type="text/javascript" src="/static/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript">
            $("#multi-img-sortable").sortable();
            $("#multi-img-sortable").disableSelection();
            $('#multi-img-sortable').on('click','.status-move', function(){
                var _this = $(this);
                layer.confirm('确认删除此图片吗?', {icon: 3, title:'提示'}, function(index){
                    var img_id = _this.siblings('.img_id').val();
                    var img_src = _this.siblings('.img_src').val();
                    $.getJSON("<?php echo url('article/del_article_img'); ?>", {'img_id':img_id,'img_src':img_src}, function(res){
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
    </script>
<?php endif; ?>
<script type="text/javascript">
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        laydate.render({
            elem: '#create_time'
            ,type:'datetime'
        });
    });
    $(function(){
        $('#add').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if ($.trim($('#cate_id').val()) == '')
            {
                layer.msg('请选择所属分类', {icon: 5,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                });
                return false;
            }

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

            if( '' == $.trim($('#create_time').val())){
                layer.msg('发布日期不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
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
