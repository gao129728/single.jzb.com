<?php
return [
    'type'           => 'mysql',	     // 数据库类型
    'hostname'       => '127.0.0.1',     // 服务器地址
    'database'       => 'my_jzb_com',// 数据库名
    'username'       => 'root',	         // 用户名
    'password'       => '123456',	    // 密码
    'hostport'       => '3306',	         // 端口
    'dsn'            => '',	             // 连接dsn
    'params'         => [],	             // 数据库连接参数
    'charset'        => 'utf8',	         // 数据库编码默认采用utf8
    'prefix'         => 'cms_',	         // 数据库表前缀
    'debug'          => true,	         // 数据库调试模式
    'resultset_type' => '\think\Collection',	     // 数据集返回类型 array 数组 collection Collection对象
];

