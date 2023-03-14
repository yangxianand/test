<?php

namespace home\controller;

use core\Controller;

class UserController extends Controller{

    public function check(){
        $u_username = trim($_POST['u_username']);
        $u_password = trim($_POST['u_password']);
        if(empty($u_username) || empty($u_password)){
            $this->error('用户名和密码都不能为空！','','index','index');
        }
        $u = new \home\model\UserModel();
        if(!$user = $u->checkUsername($u_username)){
            $this->error('当前用户：' . $u_username . ' 不存在！','','index','index');
        }
        if(md5($u_password) !== $user['u_password']){
            $this->error('密码错误！','','index','index');
        }
        @session_start();
        $_SESSION['user'] = $user;
        $this->success('登录成功！','','index','index');
    }

    public function captcha(){
        \vendor\Captcha::getCaptcha();
    }

    public function register(){
        $data['u_username'] = trim($_POST['u_username']);
        $data['u_password'] = trim($_POST['u_password']);
        $captcha = trim($_POST['captcha']);
        if(empty($captcha)){
            $this->error('验证码不能为空！','','inde','index');
        }
        if(empty($data['u_username']) || empty($data['u_password'])){
            $this->back('用户名和密码都不能为空！');
        }
        if(!\vendor\Captcha::checkCaptcha($captcha)){
            $this->back('验证码错误！');
        }
        $u = new \home\model\UserModel();
        if($u->checkUsername($data['u_username'])){
            $this->back('用户名：' . $data['u_username'] . ' 已经存在！');
        }
        $data['u_password'] = md5($data['u_password']);
        $data['u_regtime'] = time();
        if($u->autoInsert($data)){
            $this->success('用户注册成功！','','index','index');
        }else{
            $this->error('用户注册失败！','','index','index');
        }
    }

    public function logout(){
        @session_start();
        session_destroy();
        $this->success('欢迎下次登录系统！','', 'index','index');
    }


}