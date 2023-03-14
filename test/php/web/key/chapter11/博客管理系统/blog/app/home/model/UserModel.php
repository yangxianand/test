<?php

namespace home\model;
use \core\Model;

class UserModel extends Model{

    protected $table = 'user';


    public function checkUsername($username){

        $username = addslashes($username);

        $sql = "select * from {$this->getTable()} where u_username = '{$username}'";
        return $this->query($sql);
    }
}