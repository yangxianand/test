<?php

namespace home\controller;

use core\Controller;
use core\Dao;
use home\model\StudentModel;

class IndexController extends Controller{
    public function index(){
        echo "欢迎访问MVC自定义框架!";
    }

    public function test()
    {
//        // 调用assign()方法为模板中的变量赋值，格式为assign(变量名, 值)
//        $this->assign('title', 'Smarty');
//        $this->assign('desc', 'Smarty是一个PHP的模板引擎');
//        // 调用fetch()方法渲染模板文件，返回渲染的HTML结果字符串
//        $this->display('test.html');
//        global $config;
//        $dao = new Dao($config['database']);
        //print_r($dao);
//        $sql = "INSERT INTO `student` (`name`, `mid`) VALUES ('张三', 1)";
// 	    $dao->dao_exec($sql);
// 	    echo $dao->lastInsertId();
//        $sql = 'SELECT * FROM `student`';
//        $row = $dao->dao_query($sql);
//        echo $row['name'];		// 输出结果：Allen
//        $all = $dao->dao_query($sql,true);  // 获取所有数据
//        print_r($all);
        $studentModel = new StudentModel();
        //print_r($studentModel);
//        $studentModel->getTable('aa');
        $all = $studentModel->getById(1);
        print_r($all);

    }

    public function login()
    {
        $this->success('登录成功', '','', 'test');
    }

}