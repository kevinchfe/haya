<?php
return array(
	//'配置项'=>'配置值'
    //'配置项'=>'配置值'
    'MULTI_MODULE'          =>  true, // 是否允许多模块 如果为false 则必须设置 DEFAULT_MODULE
    'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),    // 允许访问的模块列表
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_TIMEZONE'      =>  'PRC',  // 默认时区
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码

    /**
     * 数据库设置
     */
//     'DB_TYPE'               =>  'mysql',     // 数据库类型
//     'DB_HOST'               =>  '192.168.0.62', // 服务器地址
//     'DB_NAME'               =>  'hyshop',          // 数据库名
//     'DB_USER'               =>  'dev',      // 用户名
//     'DB_PWD'                =>  'dev',          // 密码
//     'DB_PORT'               =>  '3306',        // 端口
//     'DB_PREFIX'             =>  'hy_',    // 数据库表前缀


    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'hyshop',    // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',      // 端口
    'DB_PREFIX'             =>  'hy_',       // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8





    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

    'URL_MODEL'             => 3,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

    //'SHOW_PAGE_TRACE' =>true,

);

