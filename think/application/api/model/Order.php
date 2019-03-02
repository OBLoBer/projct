<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/23
 * Time: 11:24
 */

namespace app\api\model;


class Order extends Base
{
    public function InsertInfo($row){
        return $this->save($row);
    }

    public function OrderInstal($row){
        return $this->where('user_id',$row)->select();
    }

    public function queryOne($row){
        return $this->where('id',$row)->find();
    }


    public function OrderUpdate($row,$sel){
        return $this->where('id',$sel['id'])->update($row);
    }

}