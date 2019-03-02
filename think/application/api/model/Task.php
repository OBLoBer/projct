<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 11:02
 */

namespace app\api\model;


class Task extends Base
{
    public function XsHell($row){

        return $this->save($row);

    }
}