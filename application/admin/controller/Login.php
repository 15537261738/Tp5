<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/15 0015
 * Time: 10:36
 */
namespace app\admin\controller;

use think\Controller;
use think\model;
use app\admin\model\User;

class Login extends Controller
{
    public function login(){
        if($_POST){
            print_r($_POST);exit;
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            //print_r($_POST);
            $res = User::where([['username',$username],['password',$password]])->select();
            return $res;
        }else {
            return $this->fetch();
        }


    }
}