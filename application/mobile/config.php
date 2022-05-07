<?php
return [
    //模板参数替换
    'view_replace_str' => array(
        '__CSS__' => '/static/mobile/css',
        '__JS__'  => '/static/mobile/js',
        '__IMG__' => '/static/mobile/images',
        '__UPLOAD_PATH__' => '/uploads/images',
    ),

    //分页配置
    'paginate'               => [
        'type'      => 'page\Mobilepage',
        'var_page'  => 'page'
    ],

    //默认错误跳转对应的模板文件
    'dispatch_error_tmpl' => APP_PATH.'mobile/view/public/error.tpl',
    //默认成功跳转对应的模板文件
    'dispatch_success_tmpl' => APP_PATH.'mobile/view/public/success.tpl',
];
