<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/22
 * Time: 15:06
 */

namespace app\api\controller;


use app\extra\message;
use think\Controller;
use think\Model;
use think\Request;
use think\Session;

class Login extends Controller
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
        $data = Model('user')->where('phone',$result['phone'])->find();
        return Errors($data);
    }
    /**
     * @return mixed|string
     *  用户注册
     *   phone  电话号码
     *   password   密码
     *   name   用户名
     *   qq qq号码
     *   code  微信注册码
     *   Verification   短信验证码
     */
    public function dologin(){
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
            'name' => $result['name'],
            'qq' => $result['qq'],
            'code' => $result['code'],
            'time'  =>time()
        );

        $data = Model('user')->whole($data);
        return json_encode($data);
    }

    /**
     * @return array|mixed
     * 用户登录(用户名密码登录)
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
        $rows = Model('user')->QueryOne($data);
        if(!empty($rows)){
            Session('username',$rows);
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
     * @return array|mixed
     * 验证码登录
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
            $data = Model('user')->PhoneSet($result['phone']);
            if(!empty($data)){
                Session('username',$data);
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
     *
     * 退出
     */
    public function outPut(){
        Session('username',null);
    }


    /**
     * @return mixed
     * 获取验证码
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