<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/6 0006
 * Time: 20:27
 */

namespace app\index\controller;
use app\facade\Test;

class Demo2
{

    public function index($name = 'www.php.cn')
    {
        return Test::hello('muxi');
    }

}