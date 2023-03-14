<?php
namespace admin\model;

use core\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    public function getAllCategory(){
        $sql = "select * from {$this->getTable()} order by c_sort desc";
        $category = $this->query($sql,true);
        return $this->noLimitCategory($category);
    }
    public function noLimitCategory($category,$parent_id=0,$level=0,$stop=0)
    {
        static $list = array();
        foreach ($category as  $value) {
            if($value['id'] == $stop) continue;
            if($value['c_parent_id'] == $parent_id){
                $value['level'] = $level;
                $list[$value['id']] = $value;
                $this->noLimitCategory($category,$value['id'],$level+1,$stop);
            }
        }
        return $list;
    }

    public function checkCategoryName($parent_id,$name){
        $sql = "select id from {$this->getTable()} where c_parent_id = {$parent_id} and c_name = '{$name}'";
        return $this->query($sql);
    }
    public function insertCategory($name,$parent_id,$sort){
        $sql = "insert into {$this->getTable()} values(null,'{$name}',{$sort},{$parent_id})";
        return $this->exec($sql);
    }

    public function getSon($id){
        $sql = "select id from {$this->getTable()} where c_parent_id = {$id}";
        return $this->query($sql);
    }

}
