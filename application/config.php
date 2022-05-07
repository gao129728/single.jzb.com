<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
return [
    'url_domain_deploy' =>  true,

    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------
    'url_route_on' => true,     //开启路由功能
    'route_config_file' =>  ['route'],   // 设置路由配置文件列表

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'app_trace' =>  false,      //开启应用Trace调试
    'trace' => [
        'type' => 'html',       // 在当前Html页面显示Trace信息,显示方式console、html
    ],
    'sql_explain' => false,     // 是否需要进行SQL性能分析  
    'extra_config_list' => ['database'],//各模块公用配置
    'app_debug' => true,
	'default_module' => 'home',//默认模块
    //'default_filter' => ['strip_tags', 'htmlspecialchars'],

    //默认错误跳转对应的模板文件
    'dispatch_error_tmpl' => APP_PATH.'admin/view/public/error.tpl',
    //默认成功跳转对应的模板文件
    'dispatch_success_tmpl' => APP_PATH.'admin/view/public/success.tpl',
    // 异常页面的模板文件
    //'exception_tmpl'        => THINK_PATH . 'tpl' . DS . 'run_think_exception.tpl',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------
    'log'       => [       
        'type'  => 'test',// 日志记录方式，内置 file socket 支持扩展
        'path'  => LOG_PATH,// 日志保存目录      
        'level' => [],// 日志记录级别
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------
    'cache' => [
        'type'   => 'file',// 驱动方式
        'path'   => CACHE_PATH,// 缓存保存目录
        'prefix' => '',// 缓存前缀
        'expire' => 0,// 缓存有效期 0表示永久缓存
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------
    'session'            => [
        'id'             => '',
        'var_session_id' => '',// SESSION_ID的提交变量,解决flash上传跨域
        'prefix'         => '',// SESSION 前缀
        'type'           => '',// 驱动方式 支持redis memcache memcached
        'auto_start'     => true,// 是否自动开启 SESSION
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'        => [      
        'prefix'    => '',// cookie 名称前缀      
        'expire'    => 0,// cookie 保存时间      
        'path'      => '/',// cookie 保存路径      
        'domain'    => '',// cookie 有效域名      
        'secure'    => false,//  cookie 启用安全传输      
        'httponly'  => '',// httponly设置      
        'setcookie' => true,// 是否使用 setcookie
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
];