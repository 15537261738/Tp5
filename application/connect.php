<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28 0028
 * Time: 21:31
 */
include_once 'Db.php';
class Myconnect{
    //private $mysqliRes;

    public function __construct($host,$user,$password,$db)
    {
        $mysqli = new mysqli($host,$user,$password,$db);
        if($mysqli->errno){
            die('Connect Error:'.$mysqli->errno.':'.$mysqli->error);
        }
    }








}

//$db = new Myconnect(HOST,USER,PASSWORD,DB);