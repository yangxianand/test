<?php
namespace admin\controller;

use core\Controller;

class PrivilegeController extends Controller
{
    public function index(){
        //加载登录表单模板
        $this->display('login.html');
    }

    public function check(){
        $username = trim($_POST['u_username']);
        $password = trim($_POST['u_password']);
        $captcha  = trim($_POST['captcha']);

//        $username = 'admin';
//        $password = 'adminw';

        if(empty($username) || empty($password)){
            $this->error('用户名和或密码不能为空!', '','','index');
        }

        if(empty($captcha)){
            $this->error('验证码不能为空！', '', '', 'index');
        }

        if(!\vendor\Captcha::checkCaptcha($captcha)){
            $this->error('验证码错误！', '', '', 'index');
        }


        $userModel = new \admin\model\UserModel();
        $user = $userModel->getUserByUsername($username);
        if(!$user){
            $this->error('当前用户名：' . $username . ' 不存在！','','','index');
        }
        if($user['u_password'] !== md5($password)){
            $this->error('密码错误！','','','index');
        }

        @session_start();
        $_SESSION['user'] = $user;

        if(isset($_POST['rememberMe'])){
            setcookie('id',$user['id'],time() + 7 * 24 * 3600);
        }

        $this->success('欢迎登录博客后台系统!', '', 'index', 'Index');
    }

    public function logout(){
        //删除session
        session_destroy();
        //清除可能存在的cookie
        setcookie('id','',1);
        //提示：退出成功
        $this->success('退出成功！','', '', 'index');
    }

    public function captcha(){
        \vendor\Captcha::getCaptcha();
    }


}
