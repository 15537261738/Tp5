<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/6 0006
 * Time: 20:27
 */

/*
 * 说的直白一点，Facade功能可以让类无需实例化而直接进行静态方式调用。
 *bind方法支持批量绑定，因此你可以在应用的公共函数文件中统一进行绑定操作，例如：
 *Facade::bind([
 *	'app\facade\Test' => 'app\common\Test',
 *   'app\facade\Info' => 'app\common\Info',
 *]);
 *
 * */
namespace app\index\controller;
use think\Facade;
class Demo2
{

    public function index($name = 'www.php.cn')
    {
       Facade::bind('app\facade\Test','app\common\Test');
       echo \app\facade\Test::hello('haha');
    }

}