<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7 0007
 * Time: 18:49
 */
/*
 *
 * 数据库的连接方式
 * 1.全局配置，config/database.php中
 * 2.动态配置，think\Db\query.php中有一个connect方法
 * 3.dsn连接：数据库连接：//用户名：密码@数据库地址：端口号/数据库名称#字符集
 *
 * */


namespace app\index\controller;

use think\Db;
class Demo4
{
    public function conn1()
    {
        return Db::table('user')->where('id',1)->value('username');
    }

    public function conn2()
    {
        return Db::connect([
            'type'=>'mysql',
            'hostname'=>'127.0.0.1',
            'username'=>'root',
            'password'=>'123456',
            'database'=>'mydbtest'

        ])->table('user')->where('id',1)->value('username');
    }

    public function conn3()
    {
       $dsn = 'mysql://root:123456@127.0.0.1:3306/mydbtest#utf8';
       return Db::connect($dsn)->table('user')->where('id',3)->value('username');
    }
}