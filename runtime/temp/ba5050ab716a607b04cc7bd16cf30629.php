<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/applet/nav_index.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    .long-td .cate_name .updateText{display:block;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>导航列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">   
                <div class="col-sm-2 ibox-tit">
                    <div class="input-group" >  
                        <a href="<?php echo url('add_nav'); ?>"><button class="btn btn-warning" type="button">添加导航</button></a>
                    </div>
                </div>                                                                    
                </div>
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>

            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                                <th width="6%">ID</th>
                                <th>导航名称</th>
                                <th width="6%">排序</th>
                                <th width="12%">内容来源</th>
                                <th width="12%">所属模型</th>
                                <th width="8%">状态</th>
                                <th width="25%">操作</th>
                            </tr>
                        </thead>
                        <tbody id="article_list">
                            <?php if(is_array($applet_nav) || $applet_nav instanceof \think\Collection || $applet_nav instanceof \think\Paginator): if( count($applet_nav)==0 ) : echo "" ;else: foreach($applet_nav as $key=>$vo): ?>
                                <tr class="long-td">
                                    <td><?php echo $vo['id']; ?></td>
                                    <td class="cate_name edit-td"><div class="updateText" onclick="toggleInput(this,<?php echo $vo['id']; ?>,'name','applet_nav')"><?php echo $vo['name']; ?></div></td>
                                    <td class="edit-td"><div class="updateText" data-check="number" onclick="toggleInput(this,<?php echo $vo['id']; ?>,'sortnum','applet_nav')"><?php echo $vo['sortnum']; ?></div></td>
                                    <td><?php echo $vo['cate_name']; ?></td>
                                    <td><?php echo $vo['cateStyle_name']; ?></td>

                                    <td>
                                        <input type="checkbox" name="status" data-id="<?php echo $vo['id']; ?>" data-table="applet_nav" class="lcs_check lcs_switch lcs_sm" <?php if($vo['status'] == 1): ?>checked<?php endif; ?>/>
                                    </td>
                                    <td>
                                        <a href="<?php echo url('edit_nav',['id'=>$vo['id']]); ?>" class="btn btn-blue btn-outline btn-xs">
                                            <i class="fa fa-pencil"></i> 编辑</a>&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="del_nav(<?php echo $vo['id']; ?>)" class="btn btn-danger btn-outline btn-xs">
                                            <i class="fa fa-trash-o"></i> 删除</a>   
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Panel Other -->
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

function del_nav(id){
    layer.confirm('确认删除此导航?', {icon: 3, title:'提示'}, function(index){
        $.getJSON('./del_nav', {'id' : id}, function(res){
            if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                    window.location.href="<?php echo url('applet/nav_index'); ?>";
                });               
            }else{
                layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
            }
        });
        layer.close(index);
    })
}
</script>
</body>
</html>