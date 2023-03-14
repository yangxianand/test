<?php
namespace core;
if(!defined('ACCESS')){
    header('location:../public/index.php');
    exit;
}
class App{
    private static function set_path(){
        define('CORE_PATH', ROOT_PATH . 'core/');
        define('APP_PATH', ROOT_PATH . 'app/');
        define('HOME_PATH', ROOT_PATH . 'home/');
        define('ADMIN_PATH', ROOT_PATH . 'admin/');
        define('CONFIG_PATH', ROOT_PATH . 'config/');
        define('VENDOR_PATH', ROOT_PATH . 'vendor/');
        define('RESOURCES_PATH', ROOT_PATH . 'resources/');
        define('UPLOAD_PATH',   ROOT_PATH . 'public/uploads/');
        define('URL', 'http://www.blog.com/');
    }

    public static function start(){
        self::set_path();
        self::set_config();
        self::set_error();
        self::set_url();
        self::set_autoload();
        self::set_dispatch();
    }

    private static function set_config(){
        global $config;
        $config = include CONFIG_PATH . 'config.php';
    }

    private static function set_error(){
        global $config;
        @ini_set('error_reporting', $config['system']['error_reporting']);
        @ini_set('display_errors', $config['system']['display_errors']);
    }

    private static function set_url(){
        $p = $_REQUEST['p'] ?? 'home';
        $c = $_REQUEST['c'] ?? 'Index';
        $a = $_REQUEST['a'] ?? 'index';
        define('P', $p);
        define('C', $c);
        define('A', $a);
    }


    private static function set_autoload_file($class){
        $class = basename($class);
        $core_file = CORE_PATH . $class . '.php';
        if(file_exists($core_file)) include $core_file;
        $controller_file = APP_PATH . P . '/controller/' . $class . '.php';
        if(file_exists($controller_file)) include $controller_file;
        $model_file = APP_PATH . P . '/model/' . $class . '.php';
        if(file_exists($model_file)) include $model_file;
        $vendor_file = VENDOR_PATH . $class . '.php';
        if(file_exists($vendor_file)) include $vendor_file;
    }

    private static function set_autoload(){
        spl_autoload_register([__CLASS__, 'set_autoload_file']);
    }


    private static function set_dispatch(){
        $controller = '\\' . P . '\\controller\\' . C . 'Controller';
        $action = A;
        $object = new $controller();
        $object->$action();
    }


}
