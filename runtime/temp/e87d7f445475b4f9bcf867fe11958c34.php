<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/data/import.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<link href="__CSS__/plugins/iCheck/custom.css" rel="stylesheet">
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>数据库还原</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form id="export-form" method="post" action="<?php echo url('export'); ?>">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="long-tr">
                                <th >备份名称</th>
                                <th >卷数</th>
                                <th >压缩</th>
                                <th >数据大小</th>
                                <th >备份时间</th>
                                <th >状态</th>
                                <th >操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr class="long-td">
                                        <td><?php echo date('Ymd-His',$vo['time']); ?></td>
                                        <td><?php echo $vo['part']; ?></td>
                                        <td><?php echo $vo['compress']; ?></td>
                                        <td><?php echo format_bytes($vo['size']); ?></td>
                                        <td><?php echo $key; ?></td>
                                        <td>-</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs btn-outline db-import" href="<?php echo url('revert',['time'=>$vo['time']]); ?>">还原</a>
                                            <a class="btn btn-danger btn-xs btn-outline" href="javascript:;" onclick="del_backup(<?php echo $vo['time']; ?>)">删除</a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                <td colspan="7" class="text-center"> 暂无备份数据</td>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Panel Other -->
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
    $(function () {
    
        $(".db-import").click(function () {
            var self = this, status = ".";
            $.get(self.href, success, "json");
            window.onbeforeunload = function () { return "正在还原数据库，请不要关闭！";};
            return false;
            function success(data) {
                if (data.code) {
                    if (data.data.gz) {
                        data.msg += status;
                        if (status.length === 5) {
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().prev().text(data.msg);
                    if (data.data.part) {
                        $.get(self.href, {"part": data.data.part, "start": data.data.start}, success, "json");
                    } else {
                        window.onbeforeunload = function () {return null;};
                    }
                } else {
                    layer.alert(data.msg,0);
                }
            }
        });
    });
    
    function del_backup(time){
        layer.confirm('确认删除此数据备份?', {icon: 3, title:'提示'}, function(index){
            layer.close(index);
            location.href = '<?php echo url("del"); ?>?time='+time;
        })
    }
</script>
</body>
</html>