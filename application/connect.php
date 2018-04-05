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
        echo '22222222222222';
        $mysqliRes = new mysqli($host,$user,$password,$db);
        echo '11111111111111';
        print_r($mysqliRes);
    }





}

//$db = new Myconnect(HOST,USER,PASSWORD,DB);