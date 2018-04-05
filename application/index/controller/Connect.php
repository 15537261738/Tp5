<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/1 0001
 * Time: 12:09
 */

namespace app\index\controller;


class Connect
{
    private $link;

    public function __construct($host,$user,$password,$db)
    {
        $this -> link = mysqli_connect($host,$user,$password,$db);
        if ($this -> link -> connect_errno){
            die('Connect Error :)' . $this -> link -> connect_errno .$this -> link -> connect_error);
        }
        //echo 'success...' . $this->link -> host_info;
        //print_r($mysqli);
    }

    public function query($sql)
    {
        $result = $this -> link ->query($sql);
        return $result;
    }

    public function fetch_all($result)
    {
        return $result -> fetch_all();
    }

    public function fetch_assoc()
    {
        return $result -> fetch_assoc();
    }



}