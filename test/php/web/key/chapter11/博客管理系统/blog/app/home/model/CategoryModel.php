<?php
namespace home\model;

use core\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    public function getAllCategory(){
        $sql = "select * from {$this->getTable()} order by c_sort desc";
        $category = $this->query($sql,true);
        return $this->noLimitCategory($category);
    }

    public function noLimitCategory($category,$parent_id=0,$level=0)
    {
        static $list = array();
        foreach ($category as  $value) {
            if($value['c_parent_id'] == $parent_id){
                $value['level'] = $level;
                $list[$value['id']] = $value;
                $this->noLimitCategory($category,$value['id'],$level+1);
            }
        }
        return $list;
    }
}