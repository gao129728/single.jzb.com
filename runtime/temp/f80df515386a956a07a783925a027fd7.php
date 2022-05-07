<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:85:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/structure/edit_module.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/header.html";i:1532138656;s:80:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/structure/global.html";i:1532138656;s:77:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/public/footer.html";i:1532138656;s:83:"E:\php\testjzb.ahcfwl.com\public/../application/admin/view/structure/global_js.html";i:1532138656;}*/ ?>
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
                <?php if(is_array($structure_list) || $structure_list instanceof \think\Collection || $structure_list instanceof \think\Paginator): $i = 0; $__LIST__ = $structure_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li class="ui-state <?php if($structure_id == $item['id']): ?>active<?php endif; ?>">
                    <input type="hidden" name="st_id[]" value="<?php echo $item['id']; ?>">
                    <div class="ui-state-box" onmouseup="show_menu(this)">
                        <span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span>
                        <span><?php echo $item['name']; ?></span>
                        <span class="pull-right"><i class="chevron fa <?php if($structure_id == $item['id']): ?>fa-chevron-down<?php else: ?>fa-chevron-right<?php endif; ?>"></i></span>
                        <i class="fa fa-caret-right"></i>
                    </div>
                    <span class="handle-btn">
                        <a href="javascript:;" onclick="show_structure(<?php echo $item['id']; ?>,this)"><i class="fa <?php echo !empty($item['status'])?'fa-eye':'fa-eye-slash'; ?>" data-toggle="tooltip" title="<?php echo !empty($item['status'])?'显示':'不显示'; ?>"></i></a>
                        <a href="<?php echo url('structure/edit_structure',['id'=>$item['id']]); ?>"><i class="fa fa-pencil" data-toggle="tooltip" title="编辑"></i></a>
                        <a href="javascript:;" onclick="del_structure(<?php echo $item['id']; ?>)"><i class="fa fa-trash-o" data-toggle="tooltip" title="删除"></i></a>
                        <a href="<?php echo url('structure/add_module',['st_id'=>$item['id']]); ?>"><span><i class="fa fa-plus" data-toggle="tooltip" title="添加子板块"></i></span></a>
                    </span>
                    <?php if($item['module']): ?>
                    <dl class="ui_dl_menu">
                        <?php if(is_array($item['module']) || $item['module'] instanceof \think\Collection || $item['module'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['module'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <dd class="ui-state <?php if($module_id == $vo['id']): ?>on<?php endif; ?>">
                            <input type="hidden" name="mo_id[<?php echo $item['id']; ?>][]" value="<?php echo $vo['id']; ?>">
                            <div class="son-state clearfix">
                                <span class="column"><span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span><?php echo $vo['title']; ?></span>
                                  <span class="pull-right">
                                    <a href="javascript:;" onclick="show_module(<?php echo $vo['id']; ?>,this)"><i class="fa <?php echo !empty($vo['state'])?'fa-eye':'fa-eye-slash'; ?>" data-toggle="tooltip" title="<?php echo !empty($vo['state'])?'显示':'不显示'; ?>"></i></a>
                                    <a href="<?php echo url('structure/edit_module',['id'=>$vo['id']]); ?>"><i class="fa fa-pencil" data-toggle="tooltip" title="编辑"></i></a>
                                    <a href="javascript:;" onclick="del_module(<?php echo $vo['id']; ?>)"><i class="fa fa-trash-o" data-toggle="tooltip" title="删除"></i></a>
                                  </span>
                            </div>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <?php endif; ?>
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
                        <form class="form-horizontal" name="edit_module" id="edit_module" method="post" action="<?php echo url('edit_module'); ?>">
                            <input type="hidden" name="id" value="<?php echo $module_id; ?>">
                            <div class="form-group">
                                <label class="col-sm-2" style="font-weight: 100; padding-left:20px; color:#ff6600;; font-size: 15px;">编辑子版块</label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">所属模块：</label>
                                <div class="input-group col-sm-4">
                                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $structure_name; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">子版块标题：</label>
                                <div class="input-group col-sm-4">
                                    <input type="text" id="title" class="form-control" name="title" value="<?php echo $module['title']; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">子版块宽度：</label>
                                <div class="input-group col-sm-1">
                                    <input id="width" type="text" class="form-control input_wd1" name="width" value="<?php echo $module['width']; ?>">
                                    <span style="position: absolute; line-height: 30px; top:0; right:-20px;">px</span>
                                    <span class="help-question" style="left:120%;"><a data-toggle="tooltip" data-placement="auto right" title="为0则表示宽度100%"><i class="fa fa-question-circle-o"></i></a></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题样式：</label>
                                <div class="input-group col-sm-8">
                                    <div class="radio i-checks">
                                        <input type="radio" name='titleStyle' value="1" <?php if($module['titleStyle'] == 1): ?>checked<?php endif; ?>/>标题样式1&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="2" <?php if($module['titleStyle'] == 2): ?>checked<?php endif; ?>/>标题样式2&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="3" <?php if($module['titleStyle'] == 3): ?>checked<?php endif; ?>/>标签切换&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="4" <?php if($module['titleStyle'] == 4): ?>checked<?php endif; ?>/>自定义&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name='titleStyle' value="0" <?php if($module['titleStyle'] == 0): ?>checked<?php endif; ?>/>无标题
                                    </div>
                                </div>
                            </div>
                            <div class="tit-sub <?php if($module['titleStyle'] != 1): ?>hidden-box<?php endif; ?>">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">副标题：</label>
                                    <div class="input-group col-sm-4">
                                        <input type="text" class="form-control" name="sub_title" value="<?php echo $module['sub_title']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tit-more <?php if($module['titleStyle'] != 2 and $module['titleStyle'] == 3): ?>hidden-box<?php endif; ?>">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">显示"更多"：</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="checkbox" name="isMore" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($module['isMore'] == 1): ?>checked<?php endif; ?>/>
                                    </div>
                                </div>
                            </div>
                            <div class="tit-pic <?php if($module['titleStyle'] != 4): ?>hidden-box<?php endif; ?>">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">标题图片：</label>
                                    <div class="col-sm-4 input-group">
                                        <div class="uploadImg-box">
                                            <input type="file" name="titPic" id="titPic" class="imgFile" onchange="previewImage(this)"/>
                                            <div class="up-img <?php if($module['titPic'] != ''): ?>hidden-box<?php endif; ?>"><i class="fa fa-cloud-upload"></i><p>点击上传图片</p></div>
                                            <?php if($module['titPic'] != ''): ?>
                                            <input type="checkbox" name="deltitPic" class="input-del" value="1" />
                                            <div class="imgView"><img src="__UPLOAD_PATH__/<?php echo $module['titPic']; ?>"/></div>
                                            <?php endif; ?>
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
                                <div class="content-source <?php if($module['titleStyle'] == 3): ?>hidden-box<?php endif; ?>">
                                    <div class="col-sm-3 input-group">
                                        <select class="form-control" name="cateId" id='cateId'>
                                            <option value="">请选择栏目分类</option>
                                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $vo['id']; ?>" <?php if($module['cateId'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="title-source <?php if($module['titleStyle'] != 3): ?>hidden-box<?php endif; ?>">
                                    <div class="col-sm-7 input-group">
                                        <table class="table table-bordered table-hover">
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
                                            <tbody id="list-attribute">
                                                <?php if($module['title_source']): if(is_array($module['title_source']) || $module['title_source'] instanceof \think\Collection || $module['title_source'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module['title_source'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                                    <tr class="long-td">
                                                        <td><span class="fa fa-arrows" data-toggle="tooltip" title="拖拽我"></span></td>
                                                        <td><input type="text" class="form-control" name="attr_name[]" value="<?php echo $item['name']; ?>"></td>
                                                        <td class="select-cate">
                                                            <select class="form-control" name="attr_cate[]">
                                                                <option value="">请选择栏目分类</option>
                                                                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $vo['id']; ?>" <?php if($item['cate'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </td>
                                                        <td><i class="fa fa-times-circle fa-lg del-table-tr"></i></td>
                                                    </tr>
                                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                            </tbody>
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
                                            <li class="nav-tab-<?php echo $key; if(($key == 4 or $key == 5) and $module['titleStyle'] == 3): ?> hidden-box<?php elseif($module['module_style'] == $key): ?> active<?php endif; ?>">
                                            <a data-toggle="tab" href="#tab-<?php echo $key; ?>" aria-expanded="<?php echo !empty($module['module_style']) && $module['module_style']==$key?'true':'false'; ?>"><?php echo $vo['style']; ?></a>
                                            <input type="radio" name="module_style" value="<?php echo $key; ?>" <?php if($module['module_style'] == $key): ?>checked<?php endif; ?> />
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane <?php if($module['module_style'] == 1): ?>active<?php endif; ?>">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[1]" value="12">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示个数</label>
                                                        <div class="con">
                                                            <span>总数</span><input type="text" class="text checknum" name='styleParam[1][0]' value="<?php echo $styleParam[1][0]; ?>"/>
                                                            <span style="padding-left:17px;">每行个数</span><input type="text checknum" class="text checknum" name='styleParam[1][1]' value="<?php echo $styleParam[1][1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 若图片滚动，则为滚动可见图片个数</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[1][2]' value="<?php echo $styleParam[1][2]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[1][3]' value="<?php echo $styleParam[1][3]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][4]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][4] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片标题</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][5]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][5] == 1): ?>checked<?php endif; ?>/>
                                                            <span>标题字数</span><input type="text" class="text checknum" name='styleParam[1][6]' value="<?php echo $styleParam[1][6]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">简介</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[1][7]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][7] == 1): ?>checked<?php endif; ?>/>
                                                            <span>简介字数</span><input type="text" class="text checknum" name='styleParam[1][8]' value="<?php echo $styleParam[1][8]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">详情按钮</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[1][9]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[1][9] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label label-tit">滚动设置</label>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">是否滚动</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[1][10]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[1][10] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">滚动方式</label>
                                                        <div class="con">
                                                            <div class="radio i-checks">
                                                                <input type="radio" name='styleParam[1][11]' value="0" <?php if($styleParam[1][11] == 0): ?>checked<?php endif; ?>/>间断滚动&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[1][11]' value="1" <?php if($styleParam[1][11] == 1): ?>checked<?php endif; ?>/>连续滚动
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示左右按钮</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[1][12]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[1][12] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane <?php if($module['module_style'] == 2): ?>active<?php endif; ?>">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[2]" value="11">
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
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[2][7]' value="<?php echo $styleParam[2][7]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[2][8]' value="<?php echo $styleParam[2][8]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label label-tit">滚动设置</label>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">是否滚动</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[2][9]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[2][9] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">滚动方式</label>
                                                        <div class="con">
                                                            <div class="radio i-checks">
                                                                <input type="radio" name='styleParam[2][10]' value="0" <?php if($styleParam[2][10] == 0): ?>checked<?php endif; ?>/>间断滚动&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[2][10]' value="1" <?php if($styleParam[2][10] == 1): ?>checked<?php endif; ?>/>连续滚动
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">可视个数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[2][11]' value="<?php echo $styleParam[2][11]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 滚动可见个数</em>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-3" class="tab-pane <?php if($module['module_style'] == 3): ?>active<?php endif; ?>">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[3]" value="8">
                                                    <div class="item clearfix">
                                                        <label class="item-label">内容标题</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[3][0]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[3][0] == 1): ?>checked<?php endif; ?>/>
                                                            <span>标题字数</span><input type="text" class="text checknum" name='styleParam[3][1]' value="<?php echo $styleParam[3][1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">内容字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[3][2]' value="<?php echo $styleParam[3][2]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">详情按钮</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[3][3]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[3][3] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示图片</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[3][4]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[3][4] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[3][5]' value="<?php echo $styleParam[3][5]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[3][6]' value="<?php echo $styleParam[3][6]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[3][7]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[3][7] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片位置</label>
                                                        <div class="con">
                                                            <div class="radio i-checks">
                                                                <input type="radio" name='styleParam[3][8]' value="left" <?php if($styleParam[3][8] == 'left'): ?>checked<?php endif; ?>/>左侧&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[3][8]' value="center" <?php if($styleParam[3][8] == 'center'): ?>checked<?php endif; ?>/>居中&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[3][8]' value="right" <?php if($styleParam[3][8] == 'right'): ?>checked<?php endif; ?>/>右侧
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-4" class="tab-pane <?php if($module['module_style'] == 4): ?>active<?php endif; ?>">
                                            <script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
                                            <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
                                            <div class="col-sm-12" style="padding-bottom:8px;">
                                                <textarea name="styleParam[4]" style="width:100%" id="myEditor"><?php echo $module['module_content']; ?></textarea>
                                                <script type="text/javascript">
                                                    var editor = new UE.ui.Editor();
                                                    editor.render("myEditor");
                                                </script>
                                            </div>
                                        </div>
                                        <div id="tab-5" class="tab-pane <?php if($module['module_style'] == 5): ?>active<?php endif; ?>">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[5]" value="9">
                                                    <div class="item clearfix">
                                                        <label class="item-label">栏目个数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[5][0]' value="<?php echo $styleParam[5][0]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix custom-tab-cate">
                                                        <label class="item-label">自定义栏目分类</label>
                                                        <div class="con">
                                                            <select class="form-control input_wd2" id="tab-switch-cate">
                                                                <option value="">请选择栏目分类</option>
                                                                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $vo['id']; ?>"><?php echo $vo['lefthtml']; ?><?php echo $vo['name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                            <a href="javascript:;" class="add-tab-cate" title="添加栏目分类"><i class="fa fa-plus-square"></i></a>
                                                            <div class="custom-cate-list clearfix <?php if($styleParam[5][1]): ?>has-cate-single<?php endif; ?>">
                                                                <?php if(is_array($styleParam[5][1]) || $styleParam[5][1] instanceof \think\Collection || $styleParam[5][1] instanceof \think\Paginator): $i = 0; $__LIST__ = $styleParam[5][1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <div class="single"><i class="fa fa-window-close fa-lg"></i><input type="hidden" name="styleParam[5][1][]" value="<?php echo $vo; ?>"/></div>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片个数</label>
                                                        <div class="con">
                                                            <span>总数</span><input type="text" class="text checknum" name='styleParam[5][2]' value="<?php echo $styleParam[5][2]; ?>"/>
                                                            <span style="padding-left:17px;">每行个数</span><input type="text" class="text checknum" name='styleParam[5][3]' value="<?php echo $styleParam[5][3]; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片标题</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[5][4]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[5][4] == 1): ?>checked<?php endif; ?>/>
                                                            <span>标题字数</span><input type="text" class="text checknum" name='styleParam[5][5]' value="<?php echo $styleParam[5][5]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[5][6]' value="<?php echo $styleParam[5][6]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[5][7]' value="<?php echo $styleParam[5][7]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片边框</label>
                                                        <div class="con">
                                                            <input type="checkbox" name="styleParam[5][8]" value="1" class="lcs_check" lcs-text="显示|隐藏" autocomplete="off" <?php if($styleParam[5][8] == 1): ?>checked<?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">自动切换</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[5][9]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[5][9] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-6" class="tab-pane <?php if($module['module_style'] == 6): ?>active<?php endif; ?>">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[6]" value="8">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[6][0]' value="<?php echo $styleParam[6][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">图片尺寸</label>
                                                        <div class="con">
                                                            <span>宽度</span><input type="text" class="text checknum" name='styleParam[6][1]' value="<?php echo $styleParam[6][1]; ?>"/><b>px</b>
                                                            <span>高度</span><input type="text" class="text checknum" name='styleParam[6][2]' value="<?php echo $styleParam[6][2]; ?>"/><b>px</b>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">自动切换</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[6][3]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[6][3] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">切换效果</label>
                                                        <div class="con">
                                                            <div class="radio i-checks">
                                                                <input type="radio" name='styleParam[6][4]' value="fold" <?php if($styleParam[6][4] == 'fold'): ?>checked<?php endif; ?>/>柔和渐变&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[6][4]' value="fade" <?php if($styleParam[6][4] == 'fade'): ?>checked<?php endif; ?>/>淡入淡出&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[6][4]' value="leftLoop" <?php if($styleParam[6][4] == 'leftLoop'): ?>checked<?php endif; ?>/>向左滑动&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[6][4]' value="topLoop" <?php if($styleParam[6][4] == 'topLoop'): ?>checked<?php endif; ?>/>向上滑动
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">效果参数</label>
                                                        <div class="con">
                                                            <span>效果时间</span><input type="text" class="text checknum" name='styleParam[6][5]' value="<?php echo $styleParam[6][5]; ?>"/>
                                                            <span style="padding-left:15px;">间隔时间</span><input type="text" class="text checknum" name='styleParam[6][6]' value="<?php echo $styleParam[6][6]; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示左右按钮</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[6][7]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[6][7] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示圆点按钮</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[6][8]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[6][8] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-7" class="tab-pane <?php if($module['module_style'] == 7): ?>active<?php endif; ?>">
                                            <div class="param-set-box">
                                                <div class="set-item">
                                                    <input type="hidden" name="paramCnt[7]" value="5">
                                                    <div class="item clearfix">
                                                        <label class="item-label">显示个数</label>
                                                        <div class="con"><input type="text" class="text checknum" name='styleParam[7][0]' value="<?php echo $styleParam[7][0]; ?>"/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">标题字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[7][1]' value="<?php echo $styleParam[7][1]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">内容字数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[7][2]' value="<?php echo $styleParam[7][2]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 为0则全部显示</em>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label label-tit">滚动设置</label>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">是否滚动</label>
                                                        <div class="con"><input type="checkbox" name="styleParam[7][3]" value="1" class="lcs_check" lcs-text="是|否" autocomplete="off" <?php if($styleParam[7][3] == 1): ?>checked<?php endif; ?>/></div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">滚动方式</label>
                                                        <div class="con">
                                                            <div class="radio i-checks">
                                                                <input type="radio" name='styleParam[7][4]' value="0" <?php if($styleParam[7][4] == 0): ?>checked<?php endif; ?>/>间断滚动&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name='styleParam[7][4]' value="1" <?php if($styleParam[7][4] == 1): ?>checked<?php endif; ?>/>连续滚动
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <label class="item-label">可视个数</label>
                                                        <div class="con">
                                                            <input type="text" class="text checknum" name='styleParam[7][5]' value="<?php echo $styleParam[7][5]; ?>"/>
                                                            <em><i class="fa fa-info-circle"></i> 滚动可见个数</em>
                                                        </div>
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
                                    <input type="checkbox" name="state" value="1" class="lcs_check" lcs-text="开启|关闭" autocomplete="off" checked/>
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
    var mouseButtonFlag = false;//控制是否触发点击事件
    $( "#sortable" ).sortable({
        start: function (event, ui) {
            mouseButtonFlag = true;
        },
        stop: function (event, ui) {
            mouseButtonFlag = false;
            update_structure_order();
        }
    });
    $( ".ui_dl_menu" ).sortable({
        stop: function (event, ui) {
            update_structure_order();
        }
    });
    function show_menu(obj){
        if(mouseButtonFlag){
            return;
        }
        $(obj).siblings('.ui_dl_menu').slideDown();
        $(obj).find('.chevron').removeClass('fa-chevron-right').addClass('fa-chevron-down');
        $(obj).parent().siblings().find('.ui_dl_menu').slideUp();
        $(obj).parent().siblings().find('.chevron').removeClass('fa-chevron-down').addClass('fa-chevron-right');
    }
    //删除模块
    function del_structure(id){
        layer.confirm('确认删除此模块?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_structure"); ?>', {'id':id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000,shade: 0.1},function(){
                        layer.close(index);
                        window.location.href="<?php echo url('structure/index'); ?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                    return false;
                }
            });
            layer.close(index);
        })
    }
    //删除子版块
    function del_module(id){
        layer.confirm('确认删除此子版块?', {icon: 3, title:'提示'}, function(index){
            $.getJSON('<?php echo url("del_module"); ?>', {'id':id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:2000,shade: 0.1},function(){
                        layer.close(index);
                        window.location.href='<?php echo url("structure/add_module"); ?>?st_id='+res.data
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
    function show_structure(id, obj){
        $.getJSON('<?php echo url("state_structure"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                $(obj).find('i').removeClass('fa-eye').addClass('fa-eye-slash').attr('title','不显示').attr('data-original-title', '不显示');
                $(obj).find('.tooltip-inner').text('不显示');
            }else if(res.code == 2){
                $(obj).find('i').removeClass('fa-eye-slash').addClass('fa-eye').attr('title','显示').attr('data-original-title', '显示');
                $(obj).find('.tooltip-inner').text('显示');
            }
        });
    }

    //设置模块状态
    function show_module(id, obj){
        $.getJSON('<?php echo url("state_module"); ?>', {'id':id}, function(res){
            if(res.code == 1){
                $(obj).find('i').removeClass('fa-eye').addClass('fa-eye-slash').attr('title','不显示').attr('data-original-title', '不显示');
                $(obj).find('.tooltip-inner').text('不显示');
            }else if(res.code == 2){
                $(obj).find('i').removeClass('fa-eye-slash').addClass('fa-eye').attr('title','显示').attr('data-original-title', '显示');
                $(obj).find('.tooltip-inner').text('显示');
            }
        });
    }

    function update_structure_order(){
        $("#update_order").ajaxSubmit();
    }
</script>
<script type="text/javascript">
    $( "#list-attribute" ).sortable();
    $('input[name="titleStyle"]').on('ifChecked', function(event){
        var val = $(this).val();
        if(val==1){
            $('.tit-sub').show();
        }else{
            $('.tit-sub').hide();
        }
        if(val==2||val==3){
            $('.tit-more').show();
        }else{
            $('.tit-more').hide();
        }
        if(val==3){
            $('.title-source').show();
            $('.content-source').hide();
            $('.nav-tab-4, #tab-4, .nav-tab-5, #tab-5').addClass('hidden-box');
        }else{
            $('.title-source').hide();
            $('.content-source').show();
            $('.nav-tab-4, #tab-4, .nav-tab-5, #tab-5').removeClass('hidden-box');
        }
        if(val == 4){
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

    if($('.custom-cate-list .single').length>0){
        $('.custom-cate-list .single').each(function(){
            var val = $(this).find('input').val();
            var op_text = $('#tab-switch-cate option[value="'+val+'"]').text();
            var single_name = $.trim(op_text.replace(/—/g,''));
            $(this).prepend(single_name);
        });
    }
    $('.add-tab-cate').click(function(){
        var sel_val =  $('#tab-switch-cate').val();
        if(sel_val == ''){
            layer.msg('请选择栏目分类', {icon: 2, time: 1500, shade: 0.1}, function (index) {
                layer.close(index);
            });
            return false;
        }
        var result = true;
        $('.custom-cate-list .single').each(function(){
            var cate_val = $(this).find('input').val();
            if(cate_val == sel_val){
                result = false;
                return false;
            }
        });
        if(!result) return false;
        var text = $('#tab-switch-cate option:selected').text();
        var name = $.trim(text.replace(/—/g,''));
        var html = '<div class="single">'+name+'<i class="fa fa-window-close fa-lg"></i><input type="hidden" name="styleParam[5][1][]" value="'+sel_val+'"/></div>'
        if(!$('.custom-cate-list').hasClass('has-cate-single')){
            $('.custom-cate-list').addClass('has-cate-single');
        }
        $('.custom-cate-list').append(html);
    });

    $('.custom-cate-list').on('click',"i", function(){
        $(this).parent().remove();
        if($('.custom-cate-list .single').length < 1){
            $('.custom-cate-list').removeClass('has-cate-single');
        }
    });

    $(function(){
        $('#edit_module').ajaxForm({
            beforeSubmit: checkForm, 
            success: complete, 
            dataType: 'json'
        });
        
        function checkForm() {
            if ('' == $.trim($('#title').val())) {
                layer.msg('请输入子版块标题', {icon: 2, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
            if (!isPositiveNum($('#width').val())) {
                layer.msg('请输入正确的子版块宽度', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            var result = true;
            var module_style = $('input[name="module_style"]:checked').val();
            if($('input[name="titleStyle"]:checked').val() == 3){
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
            }else if(module_style == 5){
                if ($('#cateId').val() == '' && $('.custom-cate-list .single').length < 1) {
                    layer.msg('请选择内容来源或添加自定义栏目分类', {icon: 5, time: 1500, shade: 0.1}, function (index) {
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
                    location.reload();
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