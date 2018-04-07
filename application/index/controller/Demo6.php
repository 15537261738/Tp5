<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7 0007
 * Time: 21:45
 */

namespace app\index\controller;
use app\index\model\User;
//模型是和一张数据表绑定的
class Demo6
{
    //单条查询
    public function get()
    {
        //使用模型返回一个对象
        dump(User::get(3));
        //用查询构造器创建更复杂的查询
        $res = User::field('id,username')->find();
        dump($res);
    }
    //多条查询
    public function all()
    {
        //dump(User::all());
        //dump(User::all([1,2,3]));
        //用查询构造器创建更加复杂的查询
        dump(User::field(['username'=>'用户名'])->where('id','in','2,3')->select());

    }

}