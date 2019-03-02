<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/1
 * Time: 18:06
 */

namespace app\user\controller;


class Bank extends Base
{
    /**
     * 银行卡信息绑定
     * @return mixed|string
     *
    `name`      '持卡人姓名',
    `card`       '银行卡号',
    `cardid`     '身份证号码',
    `phone`      '开户手机',
    `bank`       '银行',
    `city`       '开户地址',   (前后拼接在一起)
    `branch`     '开户支行名称',
     */
    public function CashNuber(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $result['time'] = time();
        $result['user_id'] = Session('name')['id'];
        $row = Model('UserCard')->where('user_id',$result['user_id'])->find();
        if(!$row){
            return Errors(Model('UserCard')->save($result));
        }else{
            return Errors(Model('UserCard')->where('id',$row['id'])->update($result));
        }
    }



}