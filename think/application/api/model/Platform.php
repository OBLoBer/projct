<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/23
 * Time: 16:26
 */

namespace app\api\model;


class Platform extends Base
{
    public function setAll(){
        return $this->select();
    }
    public function QuerLan(){
        return $this->alias('p')
            ->join('shop s','p.id = s.uset_id')
            ->where('p.id','>',0)
            ->select();
    }
}