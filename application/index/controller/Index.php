<?php
namespace app\index\controller;

use \think\Controller;
use \think\view;
class Index extends Controller
{
    public function index()
    {
        return $this->view->fetch();

    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
