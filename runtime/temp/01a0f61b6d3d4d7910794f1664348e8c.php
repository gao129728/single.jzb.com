<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/article/index_cate.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
            <h5>分类列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">   
                <div class="col-sm-2 ibox-tit">
                    <div class="input-group" >  
                        <a href="<?php echo url('add_cate'); ?>"><button class="btn btn-primary" type="button">添加分类</button></a>
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
                                <th>分类名称</th>
                                <th width="8%">排序</th>
                                <th width="12%">所属模型</th>
                                <th width="8%">导航显示</th>
                                <th width="8%">状态</th>
                                <th width="25%">操作</th>
                            </tr>
                        </thead>
                        <tbody id="article_list">
                            <?php if(is_array($cate_tree) || $cate_tree instanceof \think\Collection || $cate_tree instanceof \think\Paginator): if( count($cate_tree)==0 ) : echo "" ;else: foreach($cate_tree as $key=>$vo): ?>
                                <tr class="long-td" id="<?php echo $vo['lvl']; ?>_<?php echo $vo['id']; ?>">
                                    <td><?php echo $vo['id']; ?></td>
                                    <td class="cate_name edit-td"><span class="fa fa-minus-square-o <?php if($vo['hasChild'] == 1): ?>hasChild<?php endif; ?>" style="margin-left:<?php echo $vo['leftpin']; ?>px;"></span><div class="updateText" onclick="toggleInput(this,<?php echo $vo['id']; ?>,'name','article_cate')"><?php echo $vo['name']; ?></div></td>
                                    <td class="edit-td"><div class="updateText" data-check="number" onclick="toggleInput(this,<?php echo $vo['id']; ?>,'orderby','article_cate')"><?php echo $vo['orderby']; ?></div></td>
                                    <td><?php echo $vo['cateStyle_name']; ?></td>
                                    <td>
                                        <input type="checkbox" name="isNav" data-id="<?php echo $vo['id']; ?>" data-table="article_cate" class="lcs_check lcs_switch lcs_sm" <?php if($vo['isNav'] == 1): ?>checked<?php endif; ?>/>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="status" data-id="<?php echo $vo['id']; ?>" data-table="article_cate" class="lcs_check lcs_switch lcs_sm" <?php if($vo['status'] == 1): ?>checked<?php endif; ?>/>
                                    </td>
                                    <td>
                                        <?php if($vo['lvl'] < \think\Config::get('max_cate_class')): ?>
                                        <a href="<?php echo url('add_cate',['id'=>$vo['id']]); ?>" class="btn btn-warning btn-outline btn-xs">
                                            <i class="fa fa-plus"></i> 添加子类</a>&nbsp;&nbsp;
                                        <?php endif; ?>
                                        <a href="<?php echo url('edit_cate',['id'=>$vo['id']]); ?>" class="btn btn-blue btn-outline btn-xs">
                                            <i class="fa fa-pencil"></i> 编辑</a>&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="del_cate(<?php echo $vo['id']; ?>)" class="btn btn-danger btn-outline btn-xs">
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
$(function(){
    $('.hasChild').click(function(){
        if($(this).hasClass('fa-minus-square-o')){
            $(this).removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
        }else{
            $(this).removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
        }
        rowClicked(this);
    });

    var wd = $('.cate_name').width();
    var span_wd = $('.cate_name span').outerWidth(true);
    $('.cate_name .updateText').width((wd-span_wd)*0.7);
});

function rowClicked(obj){
    var parent = $(obj).parents('.long-td');
    var is_show = $(obj).hasClass('fa-minus-square-o')? true : false;
    var cur_lvl = parent.attr('id').split("_");

    parent.nextAll().each(function(){
        $arr = $(this).attr('id').split("_");
        $lvl = $arr[0];
        if($lvl <= cur_lvl[0]){
            return false;
        }else{
            if(is_show){
                $(this).removeClass('hidden');
                $(this).find('.fa').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
            }else{
                $(this).addClass('hidden');
            }
        }
    });
}

function del_cate(id){
    layer.confirm('确认删除此分类?', {icon: 3, title:'提示'}, function(index){
        $.getJSON('./del_cate', {'id' : id}, function(res){
            if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                    window.location.href="<?php echo url('article/index_cate'); ?>";
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