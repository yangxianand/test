<?php

namespace admin\controller;
use \core\Controller;

class CommentController extends Controller{

    public function index(){
        $page = $_GET['page'] ?? 1;
        global $config;
        $pagecount = $config['admin']['comment_pagecount'] ?? 5;

        $c = new \admin\model\CommentModel();
        $comments = $c->getAllComments($pagecount,$page);

        $counts = $c->getCounts();
        $cond = array('a'=>A,'c'=>C,'p'=>P);
        $pagestr = \vendor\Page::clickPage(URL . 'index.php',$counts,
            $pagecount,$page,$cond);
        $this->assign('pagestr',$pagestr);

        $this->assign('comments',$comments);
        $this->display('index.html');
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $c = new \admin\model\CommentModel();
        if($c->deleteById($id)){
            $this->success('评论删除成功！','','','index');
        }else{
            $this->error('评论删除失败！','','','index');
        }
    }

}
