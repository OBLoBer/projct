<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/1
 * Time: 12:05
 */

namespace app\user\controller;


use app\extra\message;

class Login extends  Base
{
    /**
     * 电话号码验证
     * @return mixed|string
     *      phone   电话号码
     *
     */
    public function Verification(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $data = Model('UserUser')->where('phone',$result['phone'])->find();
        return Errors($data);
    }

    /**
     * 用户注册
     * @return mixed|string
     *
     *   phone  电话号码
     *   password   密码
     *   name   用户名
     *   qq qq号码
     *   Verification   短信验证码
     */
    public function UserLogin(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        // 验证码数据
        if(!$result['Verification'] == Session('nuber'))
        {
            return json_encode($data = array(
                'code'  => 0,
                'msg'   =>  lang('Captcha error')
            ));
        }
        Session('nuber',null);
        $data = array(
            'phone' => $result['phone'],
            'password' => md5($result['password']),
            'qq' => $result['qq'],
            'time'  =>time()
        );
        $data = Model('UserUser')->register($data);
        return InfoMsage($data);
    }

    /**
     * 验证码登录
     * @return array|mixed
     *         Verification  验证码
     *          phone    电话号码
     */
    public function loginmessage(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        if($result['Verification'] == Session('nuber')){
            Session('nuber',null);
            $data = Model('UserUser')->where('phone',$result['phone'])->find();
            if(!empty($data)){
                Session('name',$data);
                return $row = array(
                    'code'  => 1,
                    'msg'   => lang('Login succeed')
                );
            }else{
                return $row = array(
                    'code'  => 0,
                    'msg'   => lang('Login failed')
                );
            }
        }
    }

    /**
     * 用户登录(用户名密码登录)
     * @return array|mixed
     *
     *    phone  电话号码
     *    password  密码
     */
    public function loginup(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $row = input();
        $data = array(
            'phone' => $row['phone'],
            'password' => md5($row['password']),
        );
        $rows = Model('UserUser')->where('phone',$data['phone'])->where('password',$data['password'])->find();
        if(!empty($rows)){
            Session('name',$rows);
            return json_encode($result = array(
                'code' => 1,
                'msg'  => lang('You entered the account or password is incorrect, please again')
            ));
        }else{
            return json_encode($result = array(
                'code' => 0,
                'msg'  => lang('Login succeed')
            ));
        }
    }

    /**
     * 退出
     */
    public function outPut(){
        Session('name',null);
    }

    /***
     *     提现手机验证
     * @return mixed|string
     *      Verification   手机验证码
     */
    public function Cash(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        if($result['Verification'] == Session('nuber'))
        {
            Session('nuber',null);
            return json_encode($data = array(
                'code'  => 0,
                'msg'   =>  lang('Captcha error')
            ));
        }else{
            return json_encode($data = array(
                'code'  => 1,
                'msg'   =>  lang('succeed')
            ));
        }
    }

    /**
     *  提现密码接口
     * @return mixed|string
     *      cash    提现密码
     */
    public function CashInstal(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $data = array(
            'phone' =>  Session('name')['phone'],
            'password' =>  Session('name')['password'],
            'qq' =>  Session('name')['qq'],
            'cash' =>  md5($result['cash']),
            'time'  => time()
        );
        $rows = Model('UserUser')->where('id',Session('name')['id'])->update($data);
        return Errors($rows);

    }

    /**
     *  修改密码
     * @return mixed|string
     *      password    前端校验后传过来
     */
    public function PsdInstal(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $rows = Model('UserUser')->where('id',Session('name')['id'])->setField('password',md5($result['password']));
        return Errors($rows);
    }

    /**
     *  修改密码
     * @return mixed|string
     *      qq    前端校验后传过来
     */
    public function QqInstal(){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $result = input();
        $rows = Model('UserUser')->where('id',Session('name')['id'])->setField('qq',$result['qq']);
        return Errors($rows);
    }

    /**
     * 获取验证码
     * @return mixed
     *
     *      phone   电话号码
     *
     */
    public function message (){
        if(!request()->isPost()){
            return lang('Request type error');
        }
        $row = input();
        $nuber = rand(1000, 9000);
        $message = new message('https://sms_developer.zhenzikj.com','100771','550134a4-5115-4fca-a80a-d074a4884500');
        $result = $message->send($row['phone'],"您的验证码为" . $nuber . ",有效时间为5分钟");
        if(!empty($result)){
            Session('nuber',$nuber);
        }
    }

}