<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/22
 * Time: 15:05
 */

namespace app\api\controller;


use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller
{


//    public function __construct(Request $request = null)
//    {
//        parent::__construct($request);
//        if(empty(Session::has('username'))){
//            $this->redirect('/index.php/api/Login/dologin');
//        }
//    }

}