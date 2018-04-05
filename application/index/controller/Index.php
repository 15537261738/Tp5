<?php
namespace app\index\controller;

use app\index\controller\Connect;
use app\index\controller\Begin;
class Index
{
    public function index()
    {
        include_once '../../Db.php';
        $db = new Connect(HOST,USER,PASSWORD,DB);
        $sql = 'SELECT * from user';
        $result = $db -> query($sql);
        $data = $db -> fetch_all($result);
        dump($data);




    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
