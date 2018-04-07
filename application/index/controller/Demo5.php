<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7 0007
 * Time: 20:13
 */

namespace app\index\controller;
use function Sodium\crypto_box_publickey_from_secretkey;
use think\Db;

class Demo5
{
    public function find()
    {
        //table()，选择数据表，必须是完整的数据表名，where方法中不使用操作符时默认为=
        //field()方法可以选择返回的字段
        //find()返回一维数组,如果没找到会抛出异常
        //$res = Db::table('user')->where('id','3')->find();   SELECT * FROM `user` WHERE `id` = '3' LIMIT 1
        //$res = Db::table('user')->where('id','>','500')->find();
        $res = Db::table('user')->field('id,username')->where('id','>','50')->find();

        dump(!empty($res) ? $res : '没有找到数据' );
    }
    //多条件查询
    public function select()
    {
        //select()返回二维数组，没找到返回空数组
        //SELECT `id`,`password` FROM `user` WHERE `id` > '2'
        //$res = Db::table('user')->field('id,password')->where('id','>','2')->select();
        //SELECT * FROM `user` WHERE `id` > '3' AND `username` = '3'
        //$res = Db::table('user')->where([['id','>',3],['username','=','3']])->select();
        //SELECT `id` AS `编号`,`username` AS `用户名`,`password` AS `密码` FROM `user` WHERE `id` > '4'
        $res = Db::table('user')->field(['id'=>'编号','username'=>'用户名','password'=>'密码'])->where('id','>','4')->select();
        if(empty($res))
        {
            return '没有满足条件的查询';
        }else{
            foreach ($res as $row){
                dump($row);
            }
        }
    }

    public function insert()
    {
        $data = [
           'username'=>'gezi',
           'password'=>'2222'
        ];
        //INSERT INTO `user` (`username` , `password`) VALUES ('gezi' , '2222')
        //return Db::table('user')->insert($data);
        // REPLACE INTO `user` (`username` , `password`) VALUES ('gezi' , '2222') 类似于insert set方法，效率会更高一些，只有数据库类型为mysql时才支持此方式
        //return Db::table('user')->insert($data,true);
        // INSERT INTO `user` (`username` , `password`) VALUES ('gezi' , '2222'),此方式不支持传入ture，其中的data方法可以对传入的数据进行过滤，较为安全
        //return Db::table('user')->data($data)->insert();
        //返回插入的主键id
        return Db::table('user')->insertGetId($data);


    }
    //多条插入
    public function insertAll()
    {
        $data = [
            ['username'=>'1111111111', 'password'=>'555555'],
            ['username'=>'2222211', 'password'=>'555555']
        ];
        //INSERT INTO `user` (`username` , `password`) VALUES ( '1111111111','555555' ) , ( '2222211','555555' ),
        //也支持data方式，true,返回插入的行数
        return Db::table('user')->insertAll($data);
    }

    //更新操作
    public function update()
    {
        //update()必须有条件，
        return Db::table('user')->where('id', '5')->update(['username' => 'mmmmm']);
        //如果更新条件是主键的话可以直接把主键写到更新数组中
        //return Db::table('user')->update(['username'=>'hhhhhh','id'=>9]);
    }

    public function delete()
    {
        //return Db::table('user')->delete(20);
        return Db::table('user')->where('id',40)->delete();
    }
    //原生查询
    public function query()
    {
        $sql ="SELECT `username`,`password` FROM `user` WHERE `Id` IN (4,5,6)";
        dump(Db::query($sql));
    }

    public function execute()
    {
        //return Db::execute("UPDATE `user` SET `username`='6660' WHERE Id = 5");
        //return Db::execute("INSERT `user` SET `username`='6661'");
        return Db::execute("DELETE FROM `user` WHERE `username`='6661'");
    }
}

