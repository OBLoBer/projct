<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/22
 * Time: 16:59
 */

namespace app\api\model;


class User extends Base
{
    public function whole($row){
        $result = $this->save($row);
        if($result == true){
            return $data = array(
                'code' => 1,
                'msg'  => lang('Add succeed')
            );
        }
        return $data = array(
            'code' => 0,
            'msg'  => lang('Add failed')
        );
    }

    public function QueryOne($row){
        return $result = $this->where('phone',$row['phone'])->where('password',$row['password'])->find();
    }
    public function PhoneSet($row){
        return  $result = $this->where('phone',$row)->select();
    }
}