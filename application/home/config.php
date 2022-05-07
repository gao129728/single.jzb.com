<?php
return [
    //模板参数替换
    'view_replace_str' => array(
        '__CSS__' => '/static/home/css',
        '__JS__'  => '/static/home/js',
        '__IMG__' => '/static/home/images',
        '__UPLOAD_PATH__' => '/uploads/images',
    ),

    //分页配置
    'paginate'               => [
        'type'      => 'page\Homepage',
        'var_page'  => 'page'
    ],
];
