<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/15 0015
 * Time: 10:36
 */
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User;
use think\facade\Session;
class Login extends Controller
{
    public function login(){
        if($_POST){

            $username = addslashes($_POST['username']);
            $password = addslashes(md5($_POST['password']));
            $role = $_POST['role'];
            //print_r($_POST);
            $res = User::where([['username','=',$username],['password','=',$password],['role','=',$role]])->find();
            if (!empty($res)){  //说明查到该用户信息
                Session::set('username',$username);
                Session::set('password',$password);
                Session::set('role',$role);
                return Session::get('role');
                //return $res['role'];

            } else {
                $res = User::field('username')->where([['username','=',$username],['role','=',$role]])->find();
                if(!empty($res)){
                    return -2;
                } else {
                    return -1;
                }
            }


        }else {
            return $this->view->fetch();
        }


    }


    public function register()
    {
        if($_POST){


        } else {

            $role['name'] = ['学生','教师','管理员'];
            $this->assign('role',$role);
            return $this->view->fetch('login');

        }
    }
}