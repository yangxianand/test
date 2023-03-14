<?php
namespace admin\model;

use core\Model;

class ArticleModel extends Model
{
    protected $table = 'article';


    public function getArticleInfo($cond = array(),$pagecount = 5,$page = 1){
        $where = " where a_is_delete = 0";
        foreach($cond as $k => $v){
            //k代表字段名，v代表条件值
            switch($k){
                case 'a_title':
                    $where .= ' and a_title like "%' . $v . '%" ';
                    break;
                case 'c_id':
                case 'a_status':
                case 'a_toped':
                case 'u_id':
                    $where .= " and {$k} = {$v} ";
                    break;
            }
        }
        $offset = ($page - 1) * $pagecount;
        $sql = "select id,a_title,c_id,a_time,a_status,a_author,u_id
     from {$this->getTable()} {$where}
     order by a_time desc limit {$offset},{$pagecount}";
        return $this->query($sql,true);
    }


    //获取满足查询条件的总记录数
    public function getSearchCounts($cond){
        //基础跳转：文章没有被删除
        $where = " where a_is_delete = 0";

        //条件组织
        foreach($cond as $k => $v){
            //k代表字段名，v代表条件值
            switch($k){
                case 'a_title':
                    $where .= ' and a_title like "%' . $v . '%" ';
                    break;
                case 'c_id':
                case 'a_status':
                case 'a_toped':
                case 'u_id':
                    $where .= " and {$k} = {$v} ";
                    break;
            }
        }

        //组织SQL指令获取记录数
        $sql = "select count(*) c from {$this->getTable()} {$where}";

        //取出结果：结果是数组
        $res = $this->query($sql);

        //解析结果
        return $res['c'] ?? 0;
    }

    public function checkArticleByCategory($c_id){
        $sql = "select id from {$this->getTable()} where c_id = {$c_id} limit 1";
        return $this->query($sql);
    }

    public function getArticleCountsByCategory(){
        $sql = "select c_id,count(*) c from {$this->getTable()}
      where a_is_delete = 0 group by c_id";
        $res = $this->query($sql,true);
        $list = array();
        foreach ($res as $value) {
            $list[$value['c_id']] = $value['c'];
        }
        return $list;
    }

}
