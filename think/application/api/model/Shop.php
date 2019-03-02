<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 11:22
 */

namespace app\api\model;


class Shop extends Base
{
    public function InsTall($row){
        return $this->save($row);
    }

    public function AlreaDy($result){
        return $this->where('user_id',$result['user_id'])->where('uset',$result['uset'])->select();
    }

    public function OrderShop($row){
        return $this->where('user_id',$row)->column('name');
    }

}