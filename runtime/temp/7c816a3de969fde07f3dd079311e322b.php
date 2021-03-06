<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/apply/join_index.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    .input-span{float:left; line-height: 34px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>加盟申请列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">
                    <form name="admin_list_sea" class="form-search" method="get" action="<?php echo url('join_index'); ?>">
                        <span class="input-span">姓名：</span>
                        <div class="col-sm-2" style="padding:0; margin-right:20px;">
                            <input type="text" id="name" class="form-control" name="name" value="<?php echo $name; ?>"  />
                        </div>
                        <span class="input-span">联系电话：</span>
                        <div class="col-sm-2" style="padding:0; margin-right:20px;">
                            <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $phone; ?>" />
                        </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-blue" style="border-radius:3px;"><i class="fa fa-search"></i> 搜索</button>
                    </span>
                    </form>
                </div>
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>
            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                                <th width="4%">&nbsp;</th>
                                <th width="4%">序号</th>
                                <th width="9%">姓名</th>
                                <th width="9%">联系电话</th>
                                <th width="9%">邮箱</th>
                                <th width="12%">所在地区</th>
                                <th width="20%">详细地址</th>
                                <th width="12%">申请时间</th>
                                <th width="7%">状态</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                                <tr class="long-td">
                                    <td><input class="ids i-checks" type="checkbox" name="ids[]" data-page="{{d[i].page}}" value="{{d[i].id}}"></td>
                                    <td class="edit-td"><div class="updateText" data-check="number" onclick="toggleInput(this,{{d[i].id}},'sortnum','join')">{{d[i].sortnum}}</div></td>
                                    <td>{{d[i].name}}</td>
                                    <td>{{d[i].phone}}</td>
                                    <td>{{d[i].email}}</td>
                                    <td>{{d[i].province}} {{d[i].city}} {{d[i].county? d[i].county: ''}}</td>
                                    <td>{{d[i].address}}</td>
                                    <td>{{d[i].create_time}}</td>
                                    <td>
                                        {{# if(d[i].state==1){ }}
                                        已查看
                                        {{# }else{ }}
                                        <span style='color:#f60;'>未查看</span>
                                        {{# } }}
                                    </td>
                                    <td>
                                        <a href="javascript:;" onclick="view_join({{d[i].id}},{{d[i].page}})" class="btn btn-blue btn-xs btn-outline">
                                            <i class="fa fa-eye"></i> 查看</a>&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="del_join({{d[i].id}},{{d[i].page}})" class="btn btn-danger btn-xs btn-outline">
                                            <i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                            {{# } }}
                            <tr>
                               <td colspan="10" class="handle-tr">
                                   <a href="javascript:;" onclick="all_select()" class="btn btn-blue btn-sm">全选</a>
                                   <a href="javascript:;" onclick="inverse_select()" class="btn btn-blue btn-sm">反选</a>
                                   <a href="javascript:;" onclick="cancel_select()" class="btn btn-blue btn-sm">取消</a>
                                   <a href="javascript:;" onclick="batch_delete()" class="btn btn-blue btn-sm">
                                       <i class="fa fa-trash-o"></i> 批量删除</a>
                               </td>
                            </tr>
                        </script>
                        <tbody id="list-content"></tbody>
                    </table>
                    <div id="AjaxPage"></div>
                    <div class="pageInfo">
                        共<?php echo $count; ?>条数据<span id="allpage"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 加载动画 -->
<div class="spiner-example">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
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
    //全选
    function all_select(){
        $('input[name="ids[]"]').iCheck('check');
    }

    //反选
    function inverse_select(){
        $('input[name="ids[]"]').iCheck('toggle');
    }

    //取消
    function cancel_select(){
        $('input[name="ids[]"]').iCheck('uncheck');
    }

    //批量删除
    function batch_delete(){
        var ids = '';
        var page = '';
        var flag=false;
        $('input[name="ids[]"]').each(function(){
            if($(this).is(':checked')){
                ids += ',' + $(this).val();
                page = $(this).attr('data-page');
                flag=true;
            }
        });
        if(!flag){
            layer.msg('请选择需要操作的记录', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                layer.close(index);
            });
            return false;
        }
        layer.confirm('确认删除所选记录吗?', {icon: 3, title:'提示'}, function(index){
            ids = ids.substring(1);
            $.getJSON('<?php echo url("apply/all_del_join"); ?>', {'ids' : ids}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                        refresh_page(page);
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });
            layer.close(index);
        })
    }
    /**
     * [Ajaxpage laypage分页]
     * @param {[type]} curr [当前页]
     */

    Ajaxpage(<?php echo $cur_page; ?>);

    function Ajaxpage(curr){
        var name=$('#name').val();
        var phone = $('#phone').val();
        $.getJSON('<?php echo url("apply/join_index"); ?>', {
            page: curr || 1,name:name,phone:phone
        }, function(data){      //data是后台返回过来的JSON数据
			$(".spiner-example").css('display','none'); //数据加载完关闭动画
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:14px;text-align:center">暂无数据</td>');
            }else{
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function(html){
                    document.getElementById('list-content').innerHTML = html;
                });
                $('#list-content').find("input[name='ids[]']").iCheck({checkboxClass:"icheckbox_square-green"});
                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages:'<?php echo $allpage; ?>',//总页数
                    skip: true,//是否开启跳页
                    skin: '#1AB5B7',//分页组件颜色
                    curr: curr || 1,
                    groups: 10,//连续显示分页数
                    jump: function(obj, first){
                        if(!first){
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('，第'+ obj.curr +'页，共'+ obj.pages +'页');
                    }
                });
            }
        });
    }
//查看
function view_join(id, page){
    var name=$('#name').val();
    var phone = $('#phone').val();
    location.href = '<?php echo url("apply/view_join"); ?>?id='+id+'&name='+name+'&phone='+phone+'&cur_page='+page;
}

//删除
function del_join(id, page){
    layer.confirm('确认删除此记录?', {icon: 3, title:'提示'}, function(index){
        $.getJSON('<?php echo url("del_join"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                    refresh_page(page);
                });
            }else{
                layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
            }
        });
        layer.close(index);
    })
}

//刷新当前页
function refresh_page(page){
    var name=$('#name').val();
    var phone = $('#phone').val();
    location.href = '<?php echo url("apply/join_index"); ?>?name='+name+'&phone='+phone+'&cur_page='+page;
}

</script>
</body>
</html>