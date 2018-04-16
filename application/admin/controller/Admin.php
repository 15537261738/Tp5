<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/16 0016
 * Time: 22:25
 */

namespace app\admin\controller;


use think\Controller;

class Admin extends Controller
{
    public function index(){
        return $this->view->fetch();
    }
}