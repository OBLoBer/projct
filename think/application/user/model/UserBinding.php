<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/2
 * Time: 11:03
 */

namespace app\user\model;


class UserBinding extends Base
{
    public function PlanSelect($rows,$sessionid){
        return count($this->where('user_id',$sessionid)
            ->where('lpatform_id',$rows)
            ->select());
    }

    public function PlatSave($row){
        return $this->save($row);
    }
}