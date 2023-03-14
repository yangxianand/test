<?php

namespace home\controller;
use \core\Controller;

class CommentController extends Controller{
    public function insert(){
        $data['a_id'] = (int)$_POST['a_id'];
        $data['c_comment'] = trim($_POST['c_comment']);
        if(empty($data['c_comment'])){
            $this->back('评论不能为空！');
        }
        @session_start();
        $data['u_id'] = $_SESSION['user']['id'];
        $data['c_time'] = time();
        $c = new  \home\model\CommentModel();
        if($c->autoInsert($data)){
            $this->back('评论成功！');
        }else{
            $this->back('评论失败！');
        }
    }
}
