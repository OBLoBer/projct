<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/26
 * Time: 11:30
 */

namespace app\api\model;


class Classtion extends Base
{
    public function ClassTion()
    {
        return $this->select();
    }
}