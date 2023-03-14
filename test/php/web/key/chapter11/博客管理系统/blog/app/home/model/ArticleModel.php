<?php

namespace home\model;
use \core\Model;

class ArticleModel extends Model{
    protected $table = 'article';

    public function getAllArticles($cond = array(),$pagecount = 5,$page =
    1){
        $offset = ($page - 1) * $pagecount;
        $where = ' where a_is_delete = 0 and a_status = 2';
        if(isset($cond['a_title'])) $where .= " and a_title like '%{$cond['a_title']}%' ";
        if(isset($cond['c_id'])) $where .= " and c_id = {$cond['c_id']}";

        $sql = "select a.*,c.c_count from {$this->getTable()} a
         left join (select a_id,count(*) c_count from {$this->getTable('comment')}
         group by a_id) c on a.id = c.a_id
        {$where} limit {$offset},{$pagecount}";

        return $this->query($sql,true);
    }

    public function getCountsByCategory(){
        $sql = "select c_id,count(*) c from {$this->getTable()} where a_is_delete = 0 and a_status = 2 group by c_id";
        $res = $this->query($sql,true);
        $list = array();
        foreach($res as $v){
            $list[$v['c_id']] = $v['c'];
        }
        return $list;
    }

    public function getNewsInfo($limit = 3){
        $sql = "select id,a_title,a_img_thumb from {$this->getTable()} where
      a_is_delete = 0 order by a_time desc limit {$limit}";
        return $this->query($sql,true);
    }


    public function getCounts($cond = array()){
        $where = ' where a_is_delete = 0 and a_status = 2';
        if(isset($cond['a_title']))
            $where .= " and a_title like '%{$cond['a_title']}%' ";
        if(isset($cond['c_id'])) $where .= " and c_id = {$cond['c_id']}";
        $sql = "select count(*) c from {$this->getTable()} {$where}";
        $res = $this->query($sql);
        return $res['c'] ?? 0;
    }

}
