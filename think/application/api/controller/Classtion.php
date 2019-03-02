<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/26
 * Time: 10:59
 */

namespace app\api\controller;


use think\Error;

class Classtion extends Base
{


    /**
     * @return mixed|string
     *      平台请求
     */
    public function StartPlan(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = Model('Platform')->select();
        return Error($data);
    }

    /***
     * @return mixed|string
     *  分类数据
     */
    public function StartClass(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $data = Model('classtion')->select();
        return Error($data);
    }


    /***
     * @return mixed|string
     *  平台请求接口
     *  单击选择平台时需要传值 （返回数据中id）
     */
    public function ClassTion(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $row = input();
        $sun2 = Model('Platform')->where('id',$row['id'])->column('class_id');
        $data = Model('Platform')->where('id',$row['id'])->select();
        $str = $sun2[0];
        $arr = explode(",", $str);
        foreach($arr as $v){
            $sun = Model('Classtion')->where('id',$v)->select();
            $sun1[] = $sun;
        }
        $data[] = $sun1;
        return Error($data);
    }

    /***
     * 分类请求
     * @return mixed|string
     *  分类请求
     *  传入ID
     */
    public function ClassPlan(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $row = input();
        $sun2 = Model('Platform')->select();
        $sun = count(Model('Platform')->select());
        for($i = 0 ; $i<$sun; $i++){
            $arr = explode(",", $sun2[$i]['class_id']);
            $u[] = in_array($row['id'],$arr);
            if(in_array($row['id'],$arr)){
                $sid[] =  $sun2[$i]['id'];
            }
        }
        for($u = 0 ; $u <$sun;$u++){
            $sun1 = Model('Platform')->where('id',$sid[$u])->select();
            $data[] = $sun1;
        }
        return Error($data);
    }
}