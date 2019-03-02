<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/1
 * Time: 12:07
 */

namespace app\user\model;


use think\Model;

class UserUser extends Model
{
    public function register($row){
        return $this->save($row);
    }

    public function UserPhone($row){
        return $this->where('username',$row)->find();
    }
}