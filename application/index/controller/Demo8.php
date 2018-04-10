<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/10 0010
 * Time: 20:47
 */

namespace app\index\controller;


use think\Controller;

class Demo8 extends Controller
{
    public function test1()
    {
        return $this->view->fetch();
    }

    // 模板继承
    public function  test2()
    {
        return $this->view->fetch();
    }
}