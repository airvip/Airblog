<?php
return array(
	//'配置项'=>'配置值'
    //数据库配置信息
    'DB_TYPE'   => 'mysql',          // 数据库类型
    'DB_HOST'   => 'localhost',     // 服务器地址
    'DB_NAME'   => 'thinkphp',      // 数据库名
    'DB_USER'   => 'root',          // 用户名
    'DB_PWD'    => '123456',        // 密码
    'DB_PORT'   => 3306,             // 端口
    'DB_PREFIX' => 'think_',       // 数据库表前缀
    'DB_CHARSET'=> 'utf8',         // 字符集


    //'DEFAULT_TIMEZONE'      =>  'UTC/GMT +9',                    //set timezone
    'URL_MODEL'             =>    2,
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Api'),
    'DEFAULT_MODULE'       =>    'Home',  // Default module


    'LOAD_EXT_CONFIG'		=>'system',//加载扩展配置
);