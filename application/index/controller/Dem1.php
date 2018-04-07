<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4 0004
 * Time: 22:30
 */

namespace app\index\controller;
/*
 * 容器与依赖注入的原理
 *
 * 任何url的访问，最终都是定位到控制器，由控制器中某个具体的方法来执行
 * 一个控制器对应着一个类，如果这些类需要统一管理，怎么办？
 * 容器来进行管理，还可以将类的实例（对象）作为参数，自动触发依赖注入
 * 依赖注入：就是将对象类型的数据，以参数的方式传到方法的参数列表
 * url访问：通过get方式将数据传到控制器指定的方法中，但是只能传字符串，数值
 * 如果要穿一个对象到当前方法中？怎么办
 * 依赖注入：解决了向类中的方法穿对象的问题
 *
 *
 * */

class Dem1
{
    //可以通过字符串，数值用get方式传值到类方法中
    public function getName($name = 'Peter')
    {
        return 'Hello '.$name;
    }

    //\app\common\Temp $temp,将会触发依赖注入
    public function getMethod(\app\common\Temp $temp)
    {
        //\app\common\Temp $temp等价于：$temp = new \app\common\Temp;
        $temp->setName('PHP中文网');
        return $temp->getName();
    }

    //绑定一个类到容器（进去的时候是一个类，出来的是对象）
    public function bindClass()
    {
        //把一个类放到容器中，相当于注册到容器中（别名，类）
        \think\Container::set('temp','\app\common\Temp');
        //上述方法可以使用助手函数，相当于以下方法
        //bind('temp','\app\common\Temp');

        //将容器中的类实例化，并取出来用，实例化的同时可以进行初始化（调用构造器）
        $temp = \think\Container::get('temp',['name'=>'gw']);
        //助手函数
        //$temp = app('temp',['name'=>'temp']);
        return $temp->getName();
    }

    //绑定一个闭包到容器，此处闭包可以暂时理解为匿名函数
    public function bindClosure()
    {
        //将一个闭包放到容器中，相当于注册到容器中(别名，匿名函数)
        \think\Container::set('close',function($domain)
        {
            return $domain.'是世界上最好的语言';
        });
        //将容器中的闭包取出来（别名，参数）
        return \think\Container::get('close',['domain'=>'PHP']);
    }
}