<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/ad/index.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;}*/ ?>
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
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>广告列表</h5>
        </div>
        <div class="ibox-content">        
            <div class="row">
                <div class="col-sm-12">   
                <div  class="col-sm-2 ibox-tit" style="width: 100px">
                    <div class="input-group" >  
                        <a href="<?php echo url('add_ad'); ?>"><button class="btn btn-primary" type="button">添加广告</button></a>
                    </div>
                </div>                                            
                    <form name="admin_list_sea" class="form-search" method="get" action="<?php echo url('index'); ?>">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="输入需查询广告标题" />   
                                <span class="input-group-btn"> 
                                    <button type="submit" class="btn btn-blue"><i class="fa fa-search"></i> 搜索</button> 
                                </span>
                            </div>
                        </div>
                    </form>                         
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                                <th width="4%">序号</th>
                                <th width="14%">标题</th>
                                <th width="5%">广告图</th>
                                <th width="10%">链接地址</th>
                                <th width="6%">广告类型</th>
                                <th width="6%">显示方式</th>
                                <th width="6%">开始时间</th>
                                <th width="6%">结束时间</th>
                                <th width="5%">状态</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td lightBoxGallery">
                                <td>{{d[i].orderby}}</td>
                                <td>{{d[i].title}}</td>
                                <td>
                                    <a href="/uploads/images/{{d[i].photo}}" title="" data-gallery=""><img src="/uploads/images/{{d[i].photo}}" class="sm-img" onerror="this.src='/static/admin/images/no_img.jpg'"/></a>
                                </td>
                                <td>{{d[i].link_url}}</td>
                                <td>{{d[i].mode_name}}</td>
                                <td>
                                    {{# if(d[i].ad_position==1){ }}
                                    全部页面显示
                                    {{# }else{ }}
                                    首页显示
                                    {{# } }}
                                </td>
                                <td>{{d[i].start_date? d[i].start_date:''}}</td>
                                <td>{{d[i].end_date? d[i].end_date:''}}</td>
                                <td>
                                    <input type="checkbox" name="status" data-id="{{d[i].id}}" data-table="ad" class="lcs_check lcs_switch lcs_sm" {{d[i].status==1?'checked':''}}/>
                                </td>                              
                                <td>
                                    <a href="javascript:;" onclick="edit_ad({{d[i].id}})" class="btn btn-blue btn-xs btn-outline">
                                        <i class="fa fa-pencil"></i> 编辑</a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="del_ad({{d[i].id}})" class="btn btn-danger btn-xs btn-outline">
                                        <i class="fa fa-trash-o"></i> 删除</a>
                                </td>
                            </tr>
                            {{# } }}
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
    function Ajaxpage(curr){
        var key=$('#key').val();
        $.getJSON('<?php echo url("Ad/index"); ?>', {
            page: curr || 1,key:key
        }, function(data){      //data是后台返回过来的JSON数据
            $(".spiner-example").css('display','none'); //数据加载完关闭动画           
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            }else{
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function(html){
                    document.getElementById('list-content').innerHTML = html;
                });
                $('.lcs_check').lc_switch();

                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages:'<?php echo $allpage; ?>',//总页数
                    skip: true,//是否开启跳页
                    skin: '#1AB5B7',//分页组件颜色
                    curr: curr || 1,
                    groups: 8,//连续显示分页数
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

    Ajaxpage();

function edit_ad(id){
    location.href = './edit_ad/id/'+id+'.html';
}

function del_ad(id){
    layer.confirm('确认删除此广告?', {icon: 3, title:'提示'}, function(index){
        $.getJSON('./del_ad', {'id' : id}, function(res){
            if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                Ajaxpage()
            }else{
                layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
            }
        });

        layer.close(index);
    })

}
</script>
<link href="/static/admin/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<script src="/static/admin/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
</body>
</html>