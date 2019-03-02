<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 14:34
 */

namespace app\api\controller;


class Plat extends Base
{
    /**
     * 返回平台信息及当前用户绑定的店铺总数
     * @return mixed|string
     *         id
     *        name      平台名称
     *        最后面数组是用户绑定店铺数目
     */
    public function QueryAll(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $t = Session('username');
        $rows = Model('platform')->setAll();
        $sun1 = Model('platform')->select();
        $sun2 = count(Model('platform')->select());
        for($i = 0; $i<$sun2; $i++){
                $rst = count(Model('shop')
                ->where('user_id',$t['id'])
                ->where('uset',$sun1[$i]['name'])
                ->select());
            $sdt[] = $rst;
        }
        $rows[] = $sdt;
        if(!empty($rows)){
            return json_encode($row = array(
                'code'  => 1,
                'msg'   => lang('succeed'),
                'data'    => $rows
            ));
        }else{
            return json_encode($rows = array(
                'code'  => 0,
                'msg'   => lang('failed')
            ));
        }
    }



}