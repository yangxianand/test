<?php

namespace home\controller;

use core\Controller;
use core\Dao;
use home\model\StudentModel;

class IndexController extends Controller{
    public function index(){
        $page = $_GET['page'] ?? 1;
        global $config;
        $pagecount = $config['home']['article_pagecount'] ?? 5;

        $cond = array();
        if(isset($_GET['c_id']) && $_GET['c_id'] != 0) $cond['c_id'] =
            (int)$_GET['c_id'];
        if(isset($_REQUEST['a_title']) && !empty(trim($_REQUEST['a_title'])))
            $cond['a_title'] = trim($_REQUEST['a_title']);

        session_start();
        //获取分类
        $c = new \home\model\CategoryModel();

        $categories = $c->getAllCategory();
        //保存到session
        @session_start();
        $_SESSION['category'] = $categories;

        $article = new \home\model\ArticleModel();
        $articles = $article->getAllArticles($cond,$pagecount,$page);
        $counts = $article->getCounts($cond);

        $pagestr = \vendor\Page::clickPage(URL . 'index.php',$counts,$pagecount,$page,$cond);
        $this->assign('pagestr',$pagestr);

        $cate_counts = $article->getCountsByCategory();
        $this->assign('cate_counts',$cate_counts);
        $news = $article->getNewsInfo();
        $this->assign('news',$news);

        $this->assign('cond',$cond);
        $this->assign('articles',$articles);
        $this->display('index.html');

    }

    public function login()
    {
        $this->success('登录成功', '','', 'test');
    }


    public function detail(){
        $id = (int)$_GET['id'];
        $articleModel = new \home\model\ArticleModel();
        $article = $articleModel->getById($id);
        @session_start();
        if(!isset($_SESSION['category'])){
            $categoryModel = new \home\model\CategoryModel();
            $category = $categoryModel->getAllCategory();
            $_SESSION['category'] = $category;
        }
        $c = new \home\model\CommentModel();
        $comments = $c->getCommentsByArticle($id);
        $this->assign('comments',$comments);

        $this->assign('article',$article);
        $this->display('detail.html');
    }

    public function like(){
        $a_id = (int)$_GET['id'];
        @session_start();
        $data = array(
            'a_id'=>$a_id,
            'u_id'=>$_SESSION['user']['id'],
            'l_time'=>time()
        );
        $likeModel = new \home\model\LikeModel();
        if($likeModel->autoInsert($data)){
            $count = $likeModel->getCountByaid($a_id);
            echo  json_encode(array('status'=>'1','msg'=>'点赞成功','count'=>$count[0]['count']));
        }else{
            echo json_encode(array('status'=>'2','msg'=>'点赞失败'));
        }
    }
}