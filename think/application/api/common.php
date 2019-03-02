<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 18:02
 */
function info($msg = '', $code = '', $url = '',  $data = '', $wait = 3 )
{
    if (is_numeric($msg)) {
        $code = $msg;
        $msg  = '';
    }
    if (is_null($url) && isset($_SERVER["HTTP_REFERER"])) {
        $url = $_SERVER["HTTP_REFERER"];
    } elseif ('' !== $url) {
        $url = preg_match('/^(https?:|\/)/', $url) ? $url : Url::build($url);
    }
    $result = [
        'code' => $code,
        'msg'  => $msg,
        'data' => $data,
        'url'  => $url,
        'wait' => $wait,
    ];
    return $result;
}

function InfoMsage($row){
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

function Error($data){
    if(!empty($data)){
        return json_encode($row = array(
            'code'  => 1,
            'msg'   => lang('succeed'),
            'data'    => $data
        ));
    }else{
        return json_encode($data = array(
            'code'  => 0,
            'msg'   => lang('failed')
        ));
    }
}



