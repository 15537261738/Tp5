<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7 0007
 * Time: 11:05
 */


/*
 * 基类控制器可以不用继承controller.php,推荐继承，可以使用父类中的方法和属性
 * 控制器中字符串的输出，全部用return，不用echo
 * 复杂类型的输出，使用dump(),默认格式为html，可以使用json
 *
 * 请求对象的使用方法
 * 1，传统方式，new request
 * 2，静态代理
 * 3，父类controller中的受保护属性
 * 4，依赖注入
 *
 *
 *
 * */
namespace app\index\controller;
use think\Controller;

class Demo3 extends Controller
{
    public function test1()
    {
        $request = new Request();
        //use think\Request;

        //url实例如下：http://tp5.com/index.php/Index/Demo3/test1/?name=123
        dump($request->get());
    }

    public function test2()
    {
        //use think\facade\Request;
        //url实例如下：http://tp5.com/index.php/Index/Demo3/test2/?name=123&sex=女
        dump(Request::get());
    }

    public function test3()
    {
        //class Demo3 extends Controller
        //use think\Controller;
        dump($this->request->get());
    }

    public function test4(\think\Request $request)
    {
        dump($request->get());
    }

}