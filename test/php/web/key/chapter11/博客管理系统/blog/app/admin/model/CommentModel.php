<?php

namespace admin\model;
use \core\Model;

class CommentModel extends Model{
    protected $table = 'comment';

    public function getAllComments($pagecount = 5,$page = 1){
        $offset = ($page - 1) * $pagecount;
        $sql = "select c.*,u.u_username,a.a_title from {$this->getTable()}
         c left join {$this->getTable('user')} u on c.u_id = u.id
         left join {$this->getTable('article')} a on c.a_id = a.id
         order by c.c_time desc,c.a_id desc limit {$offset},{$pagecount}";
        return $this->query($sql,true);
    }

    public function getCounts(){
        $sql = "select count(*) c from {$this->getTable()}";
        $res = $this->query($sql);
        return $res['c'] ?? 0;
    }

}
