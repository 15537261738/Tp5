<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/22 0022
 * Time: 19:41
 */

namespace app\admin\controller;
use think\Controller;

class Book extends Controller
{
    public function index(){
        return $this->view->fetch();
    }

    public function borrow(){
        return $this->view->fetch();
    }

    public function add(){
        return $this->view->fetch();
    }
    public function update(){
        return $this->view->fetch();
    }
    public function delete(){
        return $this->view->fetch();
    }


}