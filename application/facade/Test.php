<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/7 0007
 * Time: 10:16
 */

namespace app\facade;
use think\Facade;

class Test extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\Test';
    }
}