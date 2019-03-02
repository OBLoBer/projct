<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/2
 * Time: 11:04
 */

namespace app\user\controller;


class Binding extends Base
{

    /**
     *     返回用户绑定的店铺总数
     * @return mixed|string
     *  lpatform_id     平台id
     */
    public function BinData(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $row = Model('UserBinding')->PlanSelect($result['lpatform_id'],Session('name')['id']);
        return Error($row);
    }

    /**
     * 添加买号
     * @return mixed|string
     *  
    `name`           '会员名',
    `max`            '性别/图片',
    `address`        '常用登录地  值1  /  值2',
    `address_ip`     'IP所在地截图',
    `naughty`        '淘气值截图',
    `huab`           '花呗截图',
    `shop`           '购物记录截图',
    `username`       '收货人姓名',
    `addre_dq`       '所在地区',
    `addre_dz`       '街道地址',
    `phone`          '收货人手机',
    `name_zfb`       '支付宝认证姓名',
    `picture_zfb`    '支付宝实名认证截图',
    `user_id`        '绑定用户',
    `lpatform_id`    '平台',
     */
    public function BinPlan(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $result['user_id'] = Session('name')['id'];
        $result['time'] =time();
        $row = Model('UserBinding')->PlatSave($result);
        return Errors($row);
    }

}