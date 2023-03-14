<?php
namespace home\model;

use core\Model;

class LikeModel extends Model
{
    protected $table = 'like';

    public function getCountByaid($a_id){
        $sql = "select count(*) as count from {$this->getTable()} where a_id = {$a_id} GROUP BY a_id";
        return $this->query($sql,true);
    }
}
