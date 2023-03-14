<?php
namespace core;
class Controller{
    protected $smarty;

    public function __construct(){
        include VENDOR_PATH . 'smarty/Smarty.class.php';
        $this->smarty = new \Smarty();
        $this->smarty->template_dir = APP_PATH . P . '/view/' . C . '/';
        $this->smarty->compile_dir = RESOURCES_PATH . 'views';

        if(P == 'admin'){
            @session_start();
            if(strtolower(C) !== 'privilege' && !isset($_SESSION['user'])){
                if(isset($_COOKIE['id'])){
                    $userModel = new \admin\model\UserModel();
                    $user = $userModel->getById((int)$_COOKIE['id']);
                    if($user){
                        $_SESSION['user'] = $user;
                        $this->success('欢迎回到博客项目后台！', P, A, C);
                    }
	            }

                $this->error('请先登录！', '', 'privilege', 'index');
            }
        }

    }

    protected function assign($name, $value = '')
    {
        $this->smarty->assign($name, $value);
    }
    protected function display($template = '')
    {
        $this->smarty->display($template);
    }

    protected function success($msg, $platform, $controller, $action, $time = 3)
    {
        // 没有指定调转地址,则跳转到默认地址
        if(!$platform) $platform = P;
        if(!$controller) $controller = C;
        if(!$action) $action = A;
        $refresh = 'Refresh:' . $time . ';url=' . URL . 'index.php?p=' . $platform . '&c=' . $controller . '&a=' . $action;
        header($refresh);
        echo $msg;
        exit;
    }

    protected function error($msg, $platform, $controller, $action, $time = 3)
    {
        // 没有指定调转地址,则跳转到默认地址
        if(!$platform) $platform = P;
        if(!$controller) $controller = C;
        if(!$action) $action = A;
        $refresh = 'Refresh:' . $time . ';url=' . URL . 'index.php?p=' . $platform . '&c=' . $controller . '&a=' . $action;
        header($refresh);
        echo $msg;
        exit;
    }

    protected function back($msg,$time = 3){
        $url = $_SERVER['HTTP_REFERER'];
        header('Refresh:' . $time . ';url=' . $url);
        echo $msg;
        exit;
    }

}
