<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7 0007
 * Time: 22:27
 */

namespace app\index\controller;

use think\Controller;
use think\facade\View;
use app\index\model\User;
class Demo7 extends Controller
{
    public function test1()
    {
        //直接将内容输出到页面，不通过模板
        $content = '<h2 style="color:yellow" >HELLO,ThinkPhp！</h2>';
        //return $this->display($content);
        return $this->view->display($content);
        // return View::display($content);

    }
    public function test2()
    {
        //模板变量赋值，assign()
        //1.普通变量
        $this->view->assign('name','muxi');
        $this->view->assign('age','22');
        //批量赋值
        $this->view->assign([
            'salary'=>'3000',
            'sex'=>'女'
        ]);
        //2.array
        $this->view->assign('goods',[
            'name'=>'iphone',
            'price'=>'5999'

        ]);
        //3.对象
        $obj = new \stdClass();
        $obj->course = 'PHP';
        $obj->greade = '89';
        $this->view->assign('info',$obj);

        //常量,方法中不能使用const定义常量
        define('SITE_NAME','xiyou.site');
        //$this->view->assign('Think');

        return $this->view->fetch();
    }

    public function test3()
    {
        $info = User::all();
        $this->view->assign('info',$info);
        return $this->view->fetch();
    }
    public function test4()
    {
        $info = User::paginate(5);
        $this->view->assign('info',$info);
        return $this->view->fetch();

    }


}