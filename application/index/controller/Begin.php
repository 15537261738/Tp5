<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/1 0001
 * Time: 16:10
 */

namespace app\index\controller;

use app\index\controller\Connect;
class Begin
{
    public function run()
    {
        $db = new Connect(HOST,USER,PASSWORD,DB);

    }
}