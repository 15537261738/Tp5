<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26 0026
 * Time: 0:51
 */

namespace app\admin\controller;


use think\Controller;

class Category extends Controller
{
    public function index(){
        return $this->view->fetch();
    }
    public function add()
    {
        return $this->view->fetch();
    }

    public function update()
    {
        return $this->view->fetch();
    }

    public function delete()
    {
        return $this->view->fetch();
    }
}