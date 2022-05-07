<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"E:\php_project\single.jzb.com\public/../application/admin/view/wapmodule/index.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/header.html";i:1532138656;s:84:"E:\php_project\single.jzb.com\public/../application/admin/view/wapmodule/global.html";i:1532138656;s:81:"E:\php_project\single.jzb.com\public/../application/admin/view/public/footer.html";i:1532138656;s:87:"E:\php_project\single.jzb.com\public/../application/admin/view/wapmodule/global_js.html";i:1532138656;}*/ ?>
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
<link href="__JS__/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<style type="text/css">
    .nav-tabs input{display:none;}
    .nav-tabs.nav>li>a{padding:10px 20px; color:#999;}
    .nav.nav-tabs li.hidden-box{display:none;}
    .tab-content > .hidden-box{display:none;}
    .param-set-box .set-item{width:100%; margin:0;}
    .param-set-box .item .lcs_wrap{ vertical-align: top; padding-right:30px;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>首页管理</h5>
                </div>
                <div class="ibox-content clearfix" style="padding-top:20px;">
                    <div class="col-sm-4">
    <form name="update_order" id="update_order" method="post" action="<?php echo url('update_order'); ?>">
        <div class="file-manager" style="overflow:hidden; overflow-y:auto;">
            <div class="homefa"><i class="fa fa-reorder"></i>首页结构示意图</div>
            <ul id="sortable" class="Ulsort">
                <?php if(is_array($module_list) || $module_list instanceof \think\Collection || $module_list instanceof \think\Paginator): $i = 0; $__LIST__ = $module_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li class="ui-state <?php if($module_id == $item['id']): ?>active<?php endif; ?>">
                    <input type="hidden" name="mo_id[]" value="<?php echo $item['id']; ?>">
                    <div class="ui-state-box">
                        <span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span>
                        <span><?php echo $item['title']; ?></span>
                        <span class="pull-right"><i class="chevron fa fa-chevron-right"></i></span>
                        <i class="fa fa-caret-right"></i>
                    </div>
                    <span class="handle-btn">
                        <a href="javascript:;" onclick="show_module(<?php echo $item['id']; ?>,this)"><i class="fa <?php echo !empty($item['status'])?'fa-eye':'fa-eye-slash'; ?>" data-toggle="tooltip" title="<?php echo !empty($item['status'])?'显示':'不显示'; ?>"></i></a>
                        <a href="<?php echo url('wapmodule/edit_module',['id'=>$item['id']]); ?>"><i class="fa fa-pencil" data-toggle="tooltip" title="编辑"></i></a>
                        <a href="javascript:;" onclick="del_module(<?php echo $item['id']; ?>)"><i class="fa fa-trash-o" data-toggle="tooltip" title="删除"></i></a>
                    </span>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="add_module">
                <a href="<?php echo url('index'); ?>">
                    <i class="fa fa-plus"></i>
                    添加首页模块
                </a>
            </div>
        </div>
    </form>
</div>
                    <div class="col-sm-8">
                        <form class="form-horizontal" name="add_module" id="add_module" method="post" action="<?php echo url('index'); ?>">
                            <div class="form-group">
                                <label class="col-sm-2" style="font-weight: 100; padding-left:20px; color:#ff6600;; font-size: 15px;">添加模块</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题：</label>
                                <div class="input-group col-sm-4">
                                    <input type="text" id="title" class="form-control" name="title" value="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">背景颜色：</label>
                                <div class="input-group col-sm-4">
                                    <div class="iColor-Picker">
                                        <input id="bgcolor" type="text" class="form-control iColorPicker input_wd1" name="bgcolor" maxlength="7" value="#FFFFFF">
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">背景图片：</label>
                                <div class="input-group col-sm-4">
                                    <div class="uploadImg-box">
                                        <input type="file" name="bgphoto" id="bgphoto" class="imgFile" onchange="previewImage(this)"/>
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
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上下边距：</label>
                                <div class="input-group col-sm-10">
                                    <span class="control-label" style="float:left;">上边距</span>
                                    <div class="col-sm-1 input_wd3">
                                        <input type="text" class="form-control" id="topSpace" name="topSpace" value="20">
                                        <span class="tp-unit">px</span>
                                    </div>
                                    <span class="control-label" style="float:left; padding-left:60px;">下边距</span>
                                    <div class="col-sm-1 input_wd3">
                                        <input type="text" class="form-control" id="bottomSpace" name="bottomSpace" value="20">
                                        <span class="tp-unit">px</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题样式：</label>
                                <div class="input-group col-sm-8">
                                    <div class="radio i-checks">
                                        <input type="radio" name='titleStyle' value="1" checked/>标题样式1&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="2"/>标签切换&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="3"/>自定义&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="0" />无标题
                                    </div>
                                </div>
                            </div>
                            <div class="tit-pic hidden-box">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">标题图片：</label>
                                    <div class="col-sm-4 input-group">
                                        <div class="uploadImg-box">
                                            <input type="file" name="titPic" id="titPic" class="imgFile" onchange="previewImage(this)"/>
                                            <div class="up-img"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                            <div class="uploadCover">
                                                <div class="ulinfo clearfix">
                                                    <span class="up-btn"><i class="fa fa-cloud-upload"></i></span>
                                                    <span class="up-del"><i class="fa fa-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="help-question"><a data-toggle="tooltip" data-placement="auto right" title="上传自定义标题样式图片"><i class="fa fa-question-circle-o"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容来源：</label>
                                <div class="content-source">
                                    <div class="col-sm-3 input-group">
                                        <select class="form-control" name="cateId" id='cateId'>
                                            <option value="">请选择栏目分类</option>
                                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="title-source hidden-box">
                                    <div class="col-sm-7 input-group">
                                        <table class="table table-bordered table-hover" style="margin-bottom:8px;">
                                            <thead>
                                                <tr class="long-tr">
                                                    <th width="12%">排序</th>
                                                    <th width="38%">标签名称</th>
                                                    <th width="38%">内容来源</th>
                                                    <th width="15%"><a href="javascript:;" id="add-attribute"><i class="fa fa-plus-square"></i></a></th>
                                                </tr>
                                            </thead>
                                            <script id="select-template" type="text/html">
                                                <select class="form-control" name="attr_cate[]">
                                                    <option value="">请选择栏目分类</option>
                                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </script>
                                            <tbody id="list-attribute"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">显示方式：</label>
                                <div class="col-sm-9 input-group">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <?php if(is_array($module_style_param) || $module_style_param instanceof \think\Collection || $module_style_param instanceof \think\Paginator): $i = 0; $__LIST__ = $module_style_param;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <li class="nav-tab-<?php echo $key; if($key == 1): ?> active<?php endif; ?>">
                                                <a data-toggle="tab" href="#tab-<?php echo $key; ?>" aria-expanded="<?php echo !empty($key) && $key==1?'true':'false'; ?>"><?php echo $vo['style']; ?></a>
                                                <input type="radio" name="module_style" value="<?php echo $key; ?>" <?php if($key == 1): ?>checked<?php endif; ?> />
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[1]" value="7">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示个数</label>
                                                        <div class="con">
                                                            <span>总数</span><input type="text" class="text checknum" name='styleParam[1][0]' value="<?php echo $styleParam[1][0]; ?>"/>
                                                            <span style="padding-left:17px;">每行个数</span><input type="text checknum" class="text checknum" name='styleParam[1][1]' value="<?php echo $styleParam[1][1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 若图片滚动，则为滚动可见图片个数</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                           <input type="checkbox" name="styleParam[1][2]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][2] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片标题</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][3]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][3] == 1): ?>checked<?php endif; ?>/>
                                                            <span>标题字数</span><input type="text" class="text checknum" name='styleParam[1][4]' value="<?php echo $styleParam[1][4]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label label-tit">滚动设置</label>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">是否滚动</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][5]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[1][5] == 1): ?>checked<?php endif; ?>/>
                                                            <em><i class="fa fa-info-circle"></i> 标题样式为标签切换时无效</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">可视个数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[1][6]' value="<?php echo $styleParam[1][6]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 滚动可见个数</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">圆点切换</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][7]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][7] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[2]" value="9">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[2][0]' value="<?php echo $styleParam[2][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[2][1]' value="<?php echo $styleParam[2][1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示日期</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[2][2]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][2] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示简介</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[2][3]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][3] == 1): ?>checked<?php endif; ?>/>
                                                            <span>简介字数</span><input type="text" class="text checknum" name='styleParam[2][4]' value="<?php echo $styleParam[2][4]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示左侧图片</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[2][5]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][5] == 1): ?>checked<?php endif; ?>/>
                                                            <span style="display:inline-block; line-height: 40px;">图片边框</span><input type="checkbox" name="styleParam[2][6]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[2][6] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label label-tit">滚动设置</label>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">是否滚动</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[2][7]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][7] == 1): ?>checked<?php endif; ?>/>
                                                            <em><i class="fa fa-info-circle"></i> 标题样式为标签切换时无效</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">可视个数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[2][8]' value="<?php echo $styleParam[2][8]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 滚动可见个数</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">圆点切换</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[2][9]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[2][9] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-3" class="tab-pane">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[3]" value="4">
                                                    <div class="item clearfix">
                                                        <label class="item-label">内容字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[3][0]' value="<?php echo $styleParam[3][0]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">详情按钮</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[3][1]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[3][1] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示图片</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[3][2]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[3][2] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[3][3]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[3][3] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片位置</label>
                                                        <div class="con">
                                                            <div class="radio i-checks">
                                                                <input type="radio" name='styleParam[3][4]' value="left" <?php if($styleParam[3][4] == 'left'): ?>checked<?php endif; ?>/>左侧&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[3][4]' value="center" <?php if($styleParam[3][4] == 'center'): ?>checked<?php endif; ?>/>居中&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[3][4]' value="right" <?php if($styleParam[3][4] == 'right'): ?>checked<?php endif; ?>/>右侧
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-4" class="tab-pane">
                                            <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                            <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                            <div class="col-sm-12" style="padding-bottom:8px;">
                                                <textarea name="styleParam[4]" style="width:100%" id="myEditor"></textarea>
                                                <script type="text/javascript">
                                                    var editor = new UE.ui.Editor();
                                                    editor.render("myEditor");
                                                </script>
                                            </div>
                                        </div>
                                        <div id="tab-5" class="tab-pane">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[5]" value="4">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[5][0]' value="<?php echo $styleParam[5][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">自动切换</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[5][1]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[5][1] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">效果参数</label>
                                                        <div class="con">
                                                            <span>效果时间</span><input type="text" class="text checknum" name='styleParam[5][2]' value="<?php echo $styleParam[5][2]; ?>"/>
                                                            <span style="padding-left:15px;">间隔时间</span><input type="text" class="text checknum" name='styleParam[5][3]' value="<?php echo $styleParam[5][3]; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">圆点切换</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[5][4]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[5][4] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <button class="btn btn-warning" type="submit" style="padding:6px 30px;"><i class="fa fa-save"></i> 保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
<script src="/static/admin/js/iColorPicker.js" type="text/javascript"></script>
<script src="__JS__/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript">
    $("[data-toggle='tooltip']").tooltip();
    $( "#sortable" ).sortable({
        stop: function (event, ui) {
            update_module_order();
        }
    });
    //删除模块
    function del_module(id){
        layer.confirm('确认删除此模块?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_module"); ?>', {'id':id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000,shade: 0.1},function(){
                        layer.close(index);
                        window.location.href='<?php echo url("wapmodule/index"); ?>'
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                    return false;
                }
            });
            layer.close(index);
        })
    }
    //设置模块状态
    function show_module(id, obj){
        $.getJSON('<?php echo url("state_module"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                $(obj).find('i').removeClass('fa-eye').addClass('fa-eye-slash').attr('title','不显示').attr('data-original-title','不显示');
                $(obj).find('.tooltip-inner').text('不显示');
            }else if(res.code == 2){
                $(obj).find('i').removeClass('fa-eye-slash').addClass('fa-eye').attr('title','显示').attr('data-original-title','显示');
                $(obj).find('.tooltip-inner').text('显示');
            }
        });
    }

    function update_module_order(){
        $("#update_order").ajaxSubmit();
    }
</script>
<script type="text/javascript">
    $( "#list-attribute" ).sortable();
    $('input[name="titleStyle"]').on('ifChecked', function(event){
        var val = $(this).val();
        if(val==2){
            $('.title-source').show();
            $('.content-source').hide();
            $('.nav-tab-4, #tab-4, .nav-tab-5, #tab-5').addClass('hidden-box');
        }else{
            $('.title-source').hide();
            $('.content-source').show();
            $('.nav-tab-4, #tab-4, .nav-tab-5, #tab-5').removeClass('hidden-box');
        }
        if(val == 3){
            $('.tit-pic').show();
        }else{
            $('.tit-pic').hide();
        }
    });

    $('#add-attribute').click(function(){
        var select = $('#select-template').html();
        var htmlStr = '';
        htmlStr += '<tr class="long-td">';
        htmlStr += '<td><span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span></td>';
        htmlStr += '<td><input type="text" class="form-control" name="attr_name[]" value=""></td>';
        htmlStr += '<td>'+ select +'</td>';
        htmlStr += '<td><i class="fa fa-times-circle fa-lg del-table-tr"></i></td>';
        htmlStr += '</tr>';
        $('#list-attribute').append(htmlStr);
        $("#list-attribute .fa-arrows").tooltip();
    });

    $('#list-attribute').on('click','.del-table-tr', function(){
        $(this).parents('.long-td').remove();
    });

    $('.nav-tabs li').click(function(){
        $(this).find('input').prop('checked', true);
        $(this).siblings().find('input').prop('checked', false);
    });

    $(function(){
        $('#add_module').ajaxForm({
            beforeSubmit: checkForm, 
            success: complete, 
            dataType: 'json'
        });
        
        function checkForm() {
            if ('' == $.trim($('#title').val())) {
                layer.msg('请输入模块标题', {icon: 2, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            if (!/^\#[0-9a-fA-F]{6}$/.exec($('#bgcolor').val())) {
                layer.msg('背景颜色填写不正确', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
            if (!isPositiveNum($('#topSpace').val()) || !isPositiveNum($('#bottomSpace').val())) {
                layer.msg('请输入正确的上下边距', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            var result = true;
            var module_style = $('input[name="module_style"]:checked').val();

            if($('input[name="titleStyle"]:checked').val() == 2){
                if($("input[name='attr_name[]']").length < 1){
                    layer.msg('请增加标题切换标签', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
                $("input[name='attr_name[]']").each(function(){
                    if($.trim($(this).val()) == ''){
                        layer.msg('标签名称不能为空', {icon: 5,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                        });
                        result = false;
                        return false;
                    }
                });
                if(!result){
                    return false;
                }
                $("select[name='attr_cate[]']").each(function(){
                    if($.trim($(this).val()) == ''){
                        layer.msg('请选择内容来源', {icon: 5,time:1500,shade: 0.1}, function(index){
                            layer.close(index);
                        });
                        result = false;
                        return false;
                    }
                });
                if(!result){
                    return false;
                }
                if(module_style == 4 || module_style == 5){
                    layer.msg('请选择显示方式', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    return false;
                }
            }else if(module_style != 4){
                if ($('#cateId').val() == '') {
                    layer.msg('请选择内容来源', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                        layer.close(index);
                    });
                    return false;
                }
            }

            $('#tab-'+ module_style +' .checknum').each(function(){
                val = $(this).val();
                if(!isPositiveNum(val)){
                    layer.msg('请输入合法的显示方式设置参数', {icon: 5,time:1500,shade: 0.1}, function(index){
                        layer.close(index);
                    });
                    result = false;
                    return false;
                }
            });
            if(!result){
                return false;
            }
        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    layer.close(index);
                    window.location.href='<?php echo url("wapmodule/edit_module"); ?>?id='+data.data;
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1});
                return false;   
            }
        }
     
    });
</script>
</body>
</html>