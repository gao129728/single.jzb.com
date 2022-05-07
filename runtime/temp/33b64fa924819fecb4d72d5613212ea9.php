<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\php\single.jzb.com\public/../application/admin/view/log/operate_log.html";i:1535959318;s:73:"E:\php\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:73:"E:\php\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>日志列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12" style="padding-left:0;">
                    <form name="admin_list_sea" class="form-search" method="get" action="<?php echo url('operate_log'); ?>">
                        <div class="col-sm-3">
                            <div class="input-group">
                                 <select class="form-control m-b chosen-select" name="adminId" id='adminId'>
                                    <option value="0">选择管理员</option>
                                    <?php if(is_array($search_user) || $search_user instanceof \think\Collection || $search_user instanceof \think\Paginator): $i = 0; $__LIST__ = $search_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $key; ?>" <?php if($adminId == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <span class="input-group-btn"> 
                                    <button type="submit" class="btn btn-blue"><i class="fa fa-search"></i> 搜索</button> 
                                </span>
                            </div>
                        </div>
                    </form>
                    <div style="float:right;">
                        <div class="input-group" >
                            <a href="javascript:;" onclick="empty_log();"><button class="btn btn-danger btn-outline" type="button">清空日志</button></a>
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
                                <th width="4%">&nbsp;</th>
                                <th width="5%">序号</th>
                                <th width="5%">用户ID</th>
                                <th width="5%">操作用户</th>
                                <th width="15%">描述</th>
                                <th width="8%">操作IP</th>
                                <th width="10%">地址</th>
                                <th width="6%">状态</th>
                                <th width="10%">操作时间</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                                <tr class="long-td">
                                    <td><input class="ids i-checks" type="checkbox" name="ids[]" data-page="{{d[i].page}}" value="{{d[i].log_id}}"></td>
                                    <td>{{d[i].log_id}}</td>
                                    <td>{{d[i].admin_id}}</td>
                                    <td>{{d[i].admin_name}}</td> 
                                    <td>{{d[i].description}}</td>  
                                    <td>{{d[i].ip}}</td> 
                                    <td>{{d[i].ipaddr.country}}{{d[i].ipaddr.area}}</td> 
                                    <td>
                                        {{# if(d[i].status==1){ }}
                                            操作成功
                                        {{# }else{ }}
                                            <span style="color: red">操作失败<span>
                                        {{# } }}
                                    </td> 
                                    <td>{{d[i].add_time}}</td>
                                </tr>
                            {{# } }}
                            <tr>
                                <td colspan="9" class="handle-tr">
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
                    <div id="AjaxPage" style="text-align:right;"></div>
                    <div style="text-align: right;">
                        共<?php echo $count; ?>条数据，<span id="allpage"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Panel Other -->
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
            $.getJSON('<?php echo url("log/del_log"); ?>', {'ids' : ids}, function(res){
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

    //laypage分页
    Ajaxpage(<?php echo $cur_page; ?>);
    function Ajaxpage(curr){
        var adminId=$('#adminId').val();
        $.getJSON('<?php echo url("log/operate_log"); ?>', {page: curr || 1,adminId:adminId}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画 
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
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
                    skin: '#20A0FF',//分页组件颜色
                    curr: curr || 1,
                    groups: 3,//连续显示分页数
                    jump: function(obj, first){
                        if(!first){
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('第'+ obj.curr +'页，共'+ obj.pages +'页');
                    }
                });
            }
        });
    }


    //刷新当前页
    function refresh_page(page){
        var adminId=$('#adminId').val();
        location.href = '<?php echo url("log/operate_log"); ?>?adminId='+adminId+'&cur_page='+page;
    }

    //清空全部
    function empty_log(){
        var adminId=<?php echo !empty($adminId)?$adminId: '""'; ?>;
        if(adminId){
            tip_text = '确认清空所选管理员日志?';
        }else{
            tip_text = '确认清空全部日志?';
        }
        layer.confirm(tip_text, {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("log/empty_log"); ?>', {adminId:adminId}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                        layer.close(index);
                        location.reload();
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1},function(){
                        layer.close(index);
                    });
                }
            });
        })
    }

</script>
</body>
</html>