<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/26
 * Time: 17:07
 */

namespace app\api\controller;


class Plan extends Base
{

    /**
     * 方案添加
     *
     * 参数名称  以json数组形式上传  数组名称为 sites
    `prog`   '方案名称',
    `app_crux`   'app关键词',
    `app_command`   'app口令',
    `app_rwm`   'app二维码',
    `app_service`    '折扣服务',
    `app_screen`    '筛选分类',
    `app_sort`    '排序方式',
    `app_price`   '价格',
    `app_delivery`   '发货地',
    `pc_crux`   'pc关键词',
    `pc_service`    'pc服务',
    `pc_sort`    'pc排序方式',
    `pc_screen`    'pc筛选分类',
    `pc_price`    'pc价格',
    `roder_id`  '关联订单id',
    `pc_delivery`    'pc发货地',
     *
     */
    public function Sotp(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = input();
        for($i = 0; $i<count($data['sites']);$i++){
            $un = Model('plan')->insert($data['sites'][$i]);
        }
        if($un == true){
            return json_encode($un = array(
                'code'  => 1,
                'msg'   => lang('succeed')
            ));
        }else{
            return json_encode($un = array(
                'code'  => 0,
                'msg'   => lang('failed')
            ));
        }
    }

    /**
     * 方案修改
     *
     * 参数名称  以json数组形式上传  数组名称为 sites
     `prog`   '方案名称',
    `app_crux`   'app关键词',
    `app_command`   'app口令',
    `app_rwm`   'app二维码',
    `app_service`    '折扣服务',
    `app_screen`    '筛选分类',
    `app_sort`    '排序方式',
    `app_price`   '价格',
    `app_delivery`   '发货地',
    `pc_crux`   'pc关键词',
    `pc_service`    'pc服务',
    `pc_sort`    'pc排序方式',
    `pc_screen`    'pc筛选分类',
    `pc_price`    'pc价格',
    `roder_id`  '关联订单id',
    `pc_delivery`    'pc发货地',
     *
     */
    public function ShopUpdate()
    {
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = input();
        for($i = 0; $i<count($data['sites']);$i++){
            $un = Model('plan')->where('id',$data['sites'][0]['id'])->update($data['sites'][$i]);
        }
        if($un == true){
            return json_encode($un = array(
                'code'  => 1,
                'msg'   => lang('succeed')
            ));
        }else{
            return json_encode($un = array(
                'code'  => 0,
                'msg'   => lang('No information has been modified')
            ));
        }
    }

    /**
     * 删除方案
     * @return mixed
     *
     */
    public function ShtpDel(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = input();
       $row = Model('plan')->where('id',$data['id'])->delete();
        if($row == true){
            return json_encode($un = array(
                'code'  => 1,
                'msg'   => lang('succeed')
            ));
        }else{
            return json_encode($un = array(
                'code'  => 0,
                'msg'   => lang('failed')
            ));
        }
    }

    /**
     *     显示该订单所有方案
     * @return mixed|string
     *      传入订单id   (order_id)
     */
    public function ShtpSelet(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = input();
        $row = Model('plan')->where('order_id',$data['order_id'])->select();
        if($row){
            return json_encode($un = array(
                'code'  => 1,
                'msg'   => lang('succeed'),
                'data'  =>$row
            ));
        }else{
            return json_encode($un = array(
                'code'  => 0,
                'msg'   => lang('failed')
            ));
        }
    }

}