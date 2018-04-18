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
use app\admin\model\Adminer;
use app\admin\model\Teacher;
use app\admin\model\Student;
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
        if ($_POST){
            $usernum = strval($_POST['usernum']); //强制转换成字符串型是为了避免以0开始的字符串0不显示的问题
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $role = $_POST['role'];

            //注册前检查用户是否已注册过
            $userNum = User::field('usernum','username')->where('usernum',$usernum)->find();
            if (empty($userNum)) {
                $insertData = ['usernum' => $usernum, 'username' => $username, 'password' => $password, 'email' => $email, 'tel' => $tel, 'role' => $role];
                $userId = User::insertGetId($insertData);
                if (!empty($userId)){ //说明注册成功
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return -1;  //已注册过
            }





        } else {
            return $this->view->fetch();
        }

    }


}