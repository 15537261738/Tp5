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
}