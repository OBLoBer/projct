<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 10:56
 */

namespace app\api\controller;


class Task extends Base
{

    /**
     * @return mixed|string
     *
     *      plant_id     任务平台ID
     *      class_id    下单类型ID （之前页面接口有返回）
     *      order_id    订单ID  （选择订单时会有返回）
     *
     */
    public function TaskOrder(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $userId = Session('username');
        $data = array(
            'plant_id'     => $result['plant_id'],
            'classtask_id'     => $result['class_id'],
            'order_id'   => $result['order_id'],
            'user_id'   => $userId,
            'time'      => time()
        );
        $row = Model('task')->XsHell($data);
        $rows = Model('task')->where('order_id',$result['order_id'])->select();
        $sun = count(Model('task')->where('order_id',$result['order_id'])->select());
        for($i = 0 ; $i<$sun;$i++){
                $r[] = $rows[$i]['id'];
        }
        $pp = join(',',$r);
        Model('order')->where('id',$result['order_id'])->setField('plan_id',$pp);
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



}