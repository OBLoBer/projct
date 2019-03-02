<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 17:55
 */
namespace app\extra;

class Tool {
function InfoIg($data){
        if($data){
            return json_encode($stl = array(
                $data
            ));
        }else{
            return json_encode($stl = array(
                'code'  => 0,
                'msg'   => lang('Add failed')
            ));
        }
    }

}

