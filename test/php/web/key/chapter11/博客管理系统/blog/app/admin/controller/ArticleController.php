<?php

namespace admin\controller;
use \core\Controller;

class ArticleController extends Controller{
    public function add(){

        if(!isset($_SESSION['category'])){
            $c = new \admin\model\CategoryModel();
            $category = $c->getAllCategory();
            $_SESSION['category'] = $category;
        }

        $this->display('add.html');
    }

    public function insert(){
        $data = $_POST;
        if(empty(trim($data['a_title'])) || empty(trim($data['a_content']))){
            $this->error('文章标题和内容都不能为空！','','','add');
        }
        if(!array_key_exists($data['c_id'],$_SESSION['category'])){
            $this->error('当前选择的分类不存在！','','','add');
        }
        $data['u_id'] = $_SESSION['user']['id'];
        $data['a_author'] = $_SESSION['user']['u_username'];
        $data['a_time'] = time();
        $article = new \admin\model\ArticleModel();

        if($_FILES['a_img']['name']){
            if($a_img = \vendor\Uploader::uploadOne($_FILES['a_img'],UPLOAD_PATH)){
                $data['a_img'] = $a_img;
                // 生成缩略图
                $a_img_thumb = \vendor\Image::makeThumb(UPLOAD_PATH . $a_img,UPLOAD_PATH);
                if($a_img_thumb) $data['a_img_thumb'] = $a_img_thumb;
            }
        }


        if($article->autoInsert($data)){
            if($_FILES['a_img']['name']){
                if (!$a_img) $this->success('博文：' . $data['a_title'] . ' 新增成功！但是图片上传失败，失败原因是：' . \vendor\Uploader::$error, '', '', 'index');

                if ($a_img && !$a_img_thumb) $this->success('博文：' . $data['a_title'] . ' 新增成功！但是缩略图制作失败，失败原因是：' . \vendor\Image::$error, '', '', 'index');
            }
            $this->success('博文：'.$data['a_title'].' 新增成功！','','','index');
        }else{
            @unlink(UPLOAD_PATH . $a_img);
            $this->error('博文新增失败！', '', '','add');
        }
    }

    public function index(){
        $page = $_REQUEST['page'] ?? 1;  // 页码
        global $config;
        $pagecount = $config['admin']['article_pagecount'] ?? 5; // 每页显示条数


        $cond = array();
        if(isset($_REQUEST['a_title']) && !empty(trim($_REQUEST['a_title'])))
            $cond['a_title'] = trim($_REQUEST['a_title']);
        if(isset($_REQUEST['c_id']) && $_REQUEST['c_id'] != 0)
            $cond['c_id'] = (int)$_REQUEST['c_id'];
        if(isset($_REQUEST['a_status']) && $_REQUEST['a_status'] != 0)
            $cond['a_status'] = (int)$_REQUEST['a_status'];
        if(isset($_REQUEST['a_toped']) && $_REQUEST['a_toped'] != 0)
            $cond['a_toped'] = (int)$_REQUEST['a_toped'];


        if(!isset($_SESSION['category'])){
            $c = new \admin\model\CategoryModel();
            $category = $c->getAllCategory();
            $_SESSION['category'] = $category;
        }


        $article = new \admin\model\ArticleModel();
        $articles = $article->getArticleInfo($cond,$pagecount,$page);


        $counts = $article->getSearchCounts($cond);
        $cond['a'] = A;
        $cond['c'] = C;
        $cond['p'] = P;
        $pagestr = \vendor\Page::clickPage(URL . 'index.php',$counts,$pagecount,$page,$cond);
        $this->assign('pagestr',$pagestr);



        $this->assign('cond',$cond);
        $this->assign('articles',$articles);
        $this->display('index.html');
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $article = new \admin\model\ArticleModel();
        if($article->deleteById($id)){
            $this->success('删除成功！', '', '', 'index');
        }else{
            $this->error('删除失败！', '', '', 'index');
        }
    }

    public function edit(){
        $id = (int)$_GET['id'];
        $a = new \admin\model\ArticleModel();
        $article = $a->getById($id);
        if(!$article) $this->error('当前要编辑的博文不存在！','','','index');

        $this->assign('article',$article);
        $this->display('edit.html');
    }

    public function update(){
        $id = (int)$_POST['id'];
        $data['a_title'] = trim($_POST['a_title']);
        $data['c_id']    = (int)$_POST['c_id'];
        $data['a_status']= (int)$_POST['a_status'];
        $data['a_toped'] = (int)$_POST['a_toped'];
        $data['a_content'] = trim($_POST['a_content']);
        if(empty($data['a_title'])){
            $this->back('博文标题不能为空！');
        }
        $a = new \admin\model\ArticleModel();
        $article = $a->getById($id);
        $data = array_diff_assoc($data,$article);
        if(empty($data)){
            $this->error('没有要更新的内容！','','','index');
        }
        if($a->autoUpdate($id,$data)){
            $this->success('更新成功！','','','index');
        }else{
            $this->back('更新失败！');
        }
    }


}
