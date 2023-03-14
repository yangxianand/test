<?php

namespace admin\controller;
use \core\Controller;

class IndexController extends Controller{

    public function index(){
        @session_start();

        $userModel = new \admin\model\UserModel();
        $counts = $userModel->getCounts();
        $this->assign('counts',$counts);

        $this->display('index.html');
    }
}
