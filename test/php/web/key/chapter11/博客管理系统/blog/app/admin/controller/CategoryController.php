<?php
namespace admin\controller;
use \core\Controller;

class CategoryController extends Controller{
    public function index(){
        $category = new \admin\model\CategoryModel();
        $category = $category->getAllCategory();
        $_SESSION['category'] = $category;

        $a = new \admin\model\ArticleModel();
        $c_count = $a->getArticleCountsByCategory();
        $this->assign('c_count',$c_count);

        $this->display('index.html');
    }

    public function add(){
        if(!isset($_SESSION['category'])){
            $category = new \admin\model\CategoryModel();
            $category = $category->getAllCategory();
            $_SESSION['category'] = $category;
        }
        $this->display('add.html');
    }

    public function insert(){
        $c_name = trim($_POST['c_name']);
        $c_parent_id = (int)$_POST['c_parent_id'];
        $c_sort = trim($_POST['c_sort']);
        if(empty($c_name)){
            $this->error('分类名字不能为空！', '', '', 'add');
        }
        if(!is_numeric($c_sort) || (int)$c_sort != $c_sort || $c_sort < 0 || $c_sort > PHP_INT_MAX){
            $this->error('排序必须为正整数！', '', '', 'add');
        }
        $c = new \admin\model\CategoryModel();
        if($c->checkCategoryName($c_parent_id,$c_name)){
            $this->error('当前分类名字：' . $c_name . ' 在当前指定分类下已经存在！','','','add');
        }
        if($c->insertCategory($c_name,$c_parent_id,$c_sort)){
            $this->success('新增分类成功！','','','index');
        }else{
            $this->error('新增分类失败！','','','add');
        }
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $category = new \admin\model\CategoryModel();
        if($category->getSon($id)){
            $this->error('当前分类有子分类，不能删除！','','','index');
        }
        $a = new \admin\model\ArticleModel();
        if($a->checkArticleByCategory($id)){
            $this->error('当前分类下有文章信息，不能删除！','','','index');
        }

        if($category->deleteById($id)){
            $this->success('分类删除成功！','','','index');
        }else{
            $this->error('分类删除失败！','','','index');
        }
    }


    public function edit(){
        $id = (int)$_GET['id'];
        if(!array_key_exists($id,$_SESSION['category'])){
            $this->error('当前要编辑的分类不存在！','','','index');
        }

        $c = new \admin\model\CategoryModel();
        $category = $c->noLimitCategory($_SESSION['category'],0,0,$id);
 	    $this->assign('category',$category);

        $this->assign('id',$id);
        $this->display('edit.html');
    }

    public function update(){
        $id = (int)$_POST['id'];
        $data['c_name'] = trim($_POST['c_name']);
        $data['c_parent_id'] = (int)$_POST['c_parent_id'];
        $data['c_sort'] = trim($_POST['c_sort']);
        if(empty($data['c_name'])){
            $this->back('分类名字不能为空！');
        }
        if(!is_numeric($data['c_sort']) || (int)$data['c_sort'] != $data['c_sort'] || $data['c_sort'] < 0 || $data['c_sort'] > PHP_INT_MAX){
            $this->back('排序必须为正整数！');
        }
        $c = new \admin\model\CategoryModel();
        $cat = $c->checkCategoryName($data['c_parent_id'],$data['c_name']);
        if($cat && $cat['id'] != $id){
            $this->back('当前分类名字在指定父分类下已经存在！');
        }
        $data = array_diff_assoc($data,$_SESSION['category'][$id]);
        if(empty($data)){
            $this->error('没有要更新的数据！','','','index');
        }
        if($c->autoUpdate($id,$data)){
            $this->success('更新成功！','','','index');
        }else{
            $this->error('更新失败！','','','index');
        }
    }

}
