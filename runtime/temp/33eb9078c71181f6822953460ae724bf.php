<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/member/group.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/header.html";i:1532138656;s:79:"/www/wwwroot/jzb.ahcfwl.com/public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>会员组列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">   
                    <div  class="col-sm-2 ibox-tit" style="width:100px;">
                        <div class="input-group" >
                            <a href="<?php echo url('add_group'); ?>"><button class="btn btn-primary" type="button">添加会员组</button></a>
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
                                <th>ID</th>
                                <th>会员组名称</th>
                                <th>状态</th>
                                <th width="15%">创建时间</th>
                                <th width="15%">更新时间</th>
                                <th width="28%">操作</th>
                            </tr>
                        </thead>
                        <tbody id="list-content">
                            <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): if( count($group)==0 ) : echo "" ;else: foreach($group as $key=>$vo): ?>
                            <tr class="long-td">
                                <td><?php echo $vo['id']; ?></td>
                                <td><?php echo $vo['group_name']; ?></td>
                                <td><input type="checkbox" name="status" data-id="<?php echo $vo['id']; ?>" data-table="member_group" class="lcs_check lcs_switch lcs_sm" <?php if($vo['status'] == 1): ?>checked<?php endif; ?>/></td>
                                <td><?php echo $vo['create_time']; ?></td>
                                <td><?php echo $vo['update_time']; ?></td>
                                <td>
                                    <a href="javascript:;" onclick="giveColumn(<?php echo $vo['id']; ?>)" class="btn btn-info btn-outline btn-xs">
                                        <i class="fa fa-paste"></i> 设置访问栏目</a>&nbsp;&nbsp;
                                    <a href="<?php echo url('edit_group',['id'=>$vo['id']]); ?>" class="btn btn-blue btn-outline btn-xs">
                                        <i class="fa fa-pencil"></i> 编辑</a>&nbsp;&nbsp;
                                    <?php if($vo['id'] != 1 or $uid == 0): ?>
                                    <a href="javascript:;" onclick="del_group(<?php echo $vo['id']; ?>)" class="btn btn-danger btn-outline btn-xs">
                                        <i class="fa fa-trash-o"></i> 删除</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div id="AjaxPage" style=" text-align: right;"></div>
                    <div id="allpage" style=" text-align: right;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 角色分配 -->
<div class="zTreeDemoBackground left" style="display: none" id="column">
    <input type="hidden" id="nodeid">
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-2" style="margin-bottom:15px;">
            <ul id="treeType" class="ztree"></ul>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4" style="margin-bottom:20px">
            <input type="button" value="确认分配" class="btn btn-warning" id="postform"/>
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
<link rel="stylesheet" href="/static/admin/css/plugins/ztree/ztree.css" type="text/css">
<script type="text/javascript" src="/static/admin/js/plugins/zTree/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="/static/admin/js/plugins/zTree/jquery.ztree.excheck-3.5.js"></script>

<script type="text/javascript">
//删除会员组
function del_group(id){
    layer.confirm('确认删除此会员组?', {icon: 3, title:'提示'}, function(index){
        $.getJSON('./del_group', {'id' : id}, function(res){
            if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                    window.location.href="<?php echo url('member/group'); ?>";
                });
            }else{
                layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
            }
        });
        layer.close(index);
    })
}
zNodes = '';
var index = '';
var index2 = '';
//分配权限
function giveColumn(id){
    $("#nodeid").val(id);
    //加载层
    index2 = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
    //获取权限信息
    $.getJSON('./giveColumn', {'type' : 'get', 'id' : id}, function(res){
        layer.close(index2);
        if(res.code == 1){
            zNodes = JSON.parse(res.data);  //将字符串转换成obj

            //页面层
            index = layer.open({
                type: 1,
                area:['400px', '80%'],
                title:'设置访问栏目',
                skin: 'layui-layer-demo', //加上边框
                content: $('#column')
            });

            //设置zetree
            var setting = {
                check:{
                    enable:true
                },
                data: {
                    simpleData: {
                        enable: true
                    }
                }
            };

            $.fn.zTree.init($("#treeType"), setting, zNodes);
            var zTree = $.fn.zTree.getZTreeObj("treeType");
            zTree.expandAll(true);

        }else{
            layer.alert(res.msg);
        }

    });
}
//确认分配权限
$("#postform").click(function(){
    var zTree = $.fn.zTree.getZTreeObj("treeType");
    var nodes = zTree.getCheckedNodes(true);
    var NodeString = '';
    $.each(nodes, function (n, value) {
        if(n>0){
            NodeString += ',';
        }
        NodeString += value.id;
    });
    var id = $("#nodeid").val();
    //写入库
    $.post('./giveColumn', {'type' : 'give', 'id' : id, 'column' : NodeString}, function(res){
        layer.close(index);
        if(res.code == 1){
            layer.msg(res.msg,{icon:1,time:1500,shade: 0.1}, function(){
                layer.close(index);
            });
        }else{
            layer.msg(res.msg);
        }

    }, 'json')
})
</script>
</body>
</html>