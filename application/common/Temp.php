<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4 0004
 * Time: 22:44
 */
namespace app\common;

class Temp
{

    private $name;

    public function __construct($name = 'Peter')
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return '方法是:'.__METHOD__.'属性是:'.$this->name;
    }
}