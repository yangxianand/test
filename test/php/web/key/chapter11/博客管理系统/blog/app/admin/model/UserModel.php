<?php

namespace admin\model;
use \core\Model;

class UserModel extends Model{
    protected $table = 'user';

    public function getUserByUsername($username){
        $username = addslashes($username);
        $sql = "select * from {$this->getTable()} where u_username = '{$username}'";
        return $this->query($sql);
    }

    public function getCounts(){
        $sql = "select count(*) as c from {$this->getTable()}";
        $res = $this->query($sql);
        return $res['c'] ?? 0;
    }


    //验证用户名是否存在
    public function checkUsername($username){
        //组织SQL执行
        $sql = "select id from {$this->getTable()} where u_username = '{$username}'";

        return $this->query($sql);
    }

    public function getAllUsers($pagecount = 5,$page = 1){
        $offset = ($page - 1) * $pagecount;
        $sql = "select id,u_username,u_is_admin,u_regtime from
      {$this->getTable()} order by u_regtime desc
      limit {$offset},{$pagecount}";
        return $this->query($sql,true);
    }

}
