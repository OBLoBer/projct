<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/2
 * Time: 18:46
 */

namespace app\user\controller;


class Index extends Base
{
    public function UserData(){
//        if(!request()->isPost()){
//            return lang('Request type error');
//        }
        $User_id = Session('name')['id'];
        $row = Model('UserUser')->find();
        dump($row);
    }
}