<?php
// +----------------------------------------------------------------------
// | YFCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2016 http://www.rainfer.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: rainfer <81818832@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\common\controller\Common;
use think\Db;

class Database extends Common
{
    public $db2;
    public function __construct()
    {
        parent::__construct();
        //方法一:表前缀没有用
        $this->db2 = Db::connect([
            // 数据库类型
            'type' => 'mysql',
            // 数据库连接DSN配置
            'dsn' => '',
            // 服务器地址
            'hostname' => '49.232.164.248',
            // 数据库名
            'database' => 'amazon',
            // 数据库用户名
            'username' => 'root',
            // 数据库密码
            'password' => '510efb9e78b483b5',
            // 数据库连接端口
            'hostport' => '3306',
            // 数据库连接参数
            'params' => [],
            // 数据库编码默认采用utf8
            'charset' => 'utf8',
            // 数据库表前缀
            'prefix' => '',
        ]);
    }
}