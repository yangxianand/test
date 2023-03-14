<?php
namespace admin\controller;
use \core\Controller;

class UserController extends Controller{
    public function add(){
        $this->display('add.html');
    }

    public function insert(){
        $data = $_POST;
        if(empty(trim($data['u_username']))||empty(trim($data['u_password']))){
            $this->error('用户名和密码都不能为空！','','','add');
        }
        //合理性验证
        $userModel = new \admin\model\UserModel();
        if($userModel->checkUsername($data['u_username'])){
            $this->error('当前用户名：' . $data['u_username'] . ' 已经存在！', '',
                '','add');
        }
        //说明用户名可以用：组织数据入库
        $data['u_regtime'] = time();
        $data['u_password'] = md5($data['u_password']);

        if($userModel->autoInsert($data)){
            $this->success('用户新增成功！','','','index');
        }else{
            $this->error('用户新增失败！','','','add');
        }
    }


    public function index(){
        $page = $_REQUEST['page'] ?? 1;
        global $config;
        $pagecount = $config['admin']['user_pagecount'] ?? 2;

        $userModel = new \admin\model\UserModel();
        $users = $userModel->getAllUsers($pagecount,$page);

        $counts = $userModel->getCounts();
        $cond = array('a'=>A,'c'=>C,'p'=>P);
        $pagestr = \vendor\Page::clickPage(URL . 'index.php',$counts,$pagecount,$page,$cond);
        $this->assign('pagestr',$pagestr);

        $this->assign('users',$users);
        $this->display('index.html');
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $userModel = new \admin\model\UserModel();
        if($userModel->deleteById($id)){
            $this->success('用户删除成功！','','','index');
        }else{
            $this->error('删除失败！','','','index');
        }
    }


}
