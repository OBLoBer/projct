<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 11:15
 */

namespace app\api\controller;


use think\Session;

class Shop extends Base
{

    /**
     *  新增店铺
     * @return mixed
     *      category_one     店铺类目1
     *      category_tow     店铺类目2
     *      name            店铺名称
     *      link            店铺链接
     *      parts           发件人
     *      phone           发件人电话
     *      address_province    省 (地区)
     *      address_city        城市
     *      shopclass        店铺验证码
     *      address             地区
     *      address_detailed    详细发货地址
     *      uset             对应平台
     *      wangwang            旺旺
     */


    public function InserTion(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $user_id = Session('username');
        $data = array(
            'category_one'  => $result['category_one'],
            'category_tow'  => $result['category_tow'],
            'name'  => $result['name'],
            'link'  => $result['link'],
            'parts'  => $result['parts'],
            'phone'  => $result['phone'],
            'address_province'  => $result['address_province'],
            'address_city'  => $result['address_city'],
            'address'  => $result['address'],
            'address_detailed'  => $result['address_detailed'],
            'shopclass'  => $result['shopclass'],
            'uset'  => $result['uset'],
            'wangwang'  => $result['wangwang'],
            'user_id'   =>  $user_id[0]['id'],
            'time'      =>time()
        );
        $row = Model('shop')->InsTall($data);
        if($row == true){
            return json_encode($row = array(
                'code'  => 1,
                'msg'   => lang('succeed')
            ));
        }else{
            return json_encode($row = array(
                'code'  => 0,
                'msg'   => lang('failed')
            ));
        }
    }

    /**
     * 返回绑定店铺
     * @return mixed|string
     *      uset    对应平台 （获取汉字）
     *
     */
    public function Already(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $user_id = Session('username');
        $rows = array(
            'uset'  => $result['uset'],
            'user_id'   => $user_id['id'],
        );
        $row = Model('shop')->AlreaDy($rows);
        if(!count($row) == 0){
            return json_encode(
                $row
            );
        }else{
            return json_encode(
                $data = array(
                    'code' => 0,
                    'msg'  => lang('succeed')
                )
            );
        }

    }


    /**
     *
     *  获取所有该用户绑定店铺
     */
    public function setShop()
    {
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $user_id = Session('username');
        $data = Model('shop')->OrderShop($user_id['id']);
        if(!count($data) == 0){
            return json_encode(
                $data
            );
        }else{
            return json_encode(
                $data = array(
                    'code'  => 0,
                    'msg'   => lang('Add failed')
                )
            );
        }
    }
}