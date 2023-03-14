<?php
namespace core;
class Controller{
    protected $smarty;

    public function __construct(){
        include VENDOR_PATH . 'smarty/Smarty.class.php';
        $this->smarty = new \Smarty();
        $this->smarty->template_dir = APP_PATH . P . '/view/' . C . '/';
        $this->smarty->compile_dir = RESOURCES_PATH . 'views';
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


}
