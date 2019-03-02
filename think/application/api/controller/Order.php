<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/23
 * Time: 11:22
 */

namespace app\api\controller;


use think\Request;
use think\Session;

class Order extends Base
{

    /**
     * @return array|mixed
     * link  商品链接
     * shop  绑定店铺
     * name  商品名称
     * pictures  商品图片
     * stals    下单规格
     * price    商品价格
     * number   数量
     * prices   展示价格
     * coupon   优惠途径
     * postage  包邮  0(不包邮) 1(包邮)
     * ordernb  订单号自动生成
     * state    支付状态 0(未支付) 1(支付成功) 2(其他)
     */
    public function PlaceOrder (){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $userId = Session('username');
        $data = array(
            'link'  => $result['link'],
            'shop'  => $result['shop'],
            'name'  => $result['name'],
            'pictures'  => $result['pictures'],
            'names'  => $result['names'],
            'price'  => $result['price'],
            'number'  => $result['number'],
            'prices'  => $result['prices'],
            'postage'  => $result['postage'],
            'coupon'  => $result['coupon'],
            'user_id'  => $userId['id'],
            'ordernb'  => "PRECOOD".rand(10000,9999999),
            'time'  => time()
        );
        $row = Model('order')->InsertInfo($data);
        if($row == true){
            return json_encode($stl = array(
                'code'  => 1,
                'msg'   => lang('Add succeed')
            ));
        }else{
            return json_encode($stl = array(
                'code'  => 0,
                'msg'   => lang('Add failed')
            ));
        }
    }

    /**
     * @return mixed|string
     *  获取该用户所有订单
     *
     */
    public function OrderInStal(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $userId = Session('username');
        $data = Model('order')->OrderInstal($userId['id']);
        if(!count($data) == 0){
            return json_encode(
                $data
            );
        }else{
            return json_encode($stl = array(
                'code'  => 0,
                'msg'   => lang('Add failed')
            ));
        }
    }

    /**
     * @return mixed
     * 修改订单
     * * link  商品链接
     * shop  绑定店铺
     * name  商品名称
     * pictures  商品图片
     * stals    下单规格
     * price    商品价格
     * number   数量
     * prices   展示价格
     * coupon   优惠途径
     * postage  包邮  0(不包邮) 1(包邮)
     * ordernb  订单号自动生成
     * state    支付状态 0(未支付) 1(支付成功) 2(其他)
     *
     */
    public function UpdateSetAll(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $row = Model('order')->queryOne($result['id']);
        $data = array(
            'link'  => $result['link'],
            'shop'  => $result['shop'],
            'name'  => $result['name'],
            'pictures'  => $result['pictures'],
            'names'  => $result['names'],
            'price'  => $result['price'],
            'number'  => $result['number'],
            'prices'  => $result['prices'],
            'postage'  => $result['postage'],
            'coupon'  => $result['coupon'],
            'user_id'  => $row['user_id'],
            'ordernb'  => $row['ordernb'],
            'time'  => time()
        );
        $rst = Model('order')->OrderUpdate($data,$row);
        if($rst == 1){
            return json_encode(
                $da = array(
                    'code'  => 1,
                    'msg'   => lang('Edit succeed'),
                )
            );
        }else{
            return json_encode($stl = array(
                'code'  => 0,
                'msg'   => lang('Edit failed')
            ));
        }
    }


    /**
     * @return mixed|string
     *  删除
     */
    public function DelOrder(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $row = Model('order')->where('id',$result['id'])->delete();
        if($row == 1){
            return json_encode(
                $da = array(
                    'code'  => 1,
                    'msg'   => lang('Delete succeed'),
                )
            );
        }else{
            return json_encode($stl = array(
                'code'  => 0,
                'msg'   => lang('Delete failed')
            ));
        }
    }

}