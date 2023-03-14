<?php

namespace core;

class Model{

    protected $dao;
    protected $table;
    protected $fields;

    public function __construct()
    {
        global $config;
        $this->dao = new Dao($config['database']);
        $this->getFields();
    }

    protected function exec($sql)
    {
        return $this->dao->dao_exec($sql);
    }

    protected function getLastId()
    {
        return $this->dao->lastInsertId ();
    }

    protected function query($sql, $all = false)
    {
        return $this->dao->dao_query($sql, $all);
    }

    protected function getTable($table = '')
    {
        global $config;
        $table = empty($table) ? $this->table : $table;
        return $config['database']['prefix'] . $table;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTable()}";
        return $this->query($sql, true);
    }

    protected function getFields()
    {

        $sql = "DESC {$this->getTable()}";
        $rows = $this->query($sql, true);
        foreach($rows as $value){
            $this->fields[] = $value['Field'];
            if($value['Key'] == 'PRI'){
                $this->fields['Key'] = $value['Field'];
            }
        }
    }

    public function getById($id)
    {
        if(!isset($this->fields['Key']))return false;
        $sql = "SELECT * FROM {$this->getTable()} WHERE {$this->fields['Key']} = '{$id}'";
        return $this->query($sql);
    }

    public function deleteById($id){
        if(!isset($this->fields['Key'])) return false;
        $sql = "delete from {$this->getTable()} where {$this->fields['Key']} = '{$id}'";
        return $this->exec($sql);
    }

    public function autoUpdate($id,$data){
        $where  = " where {$this->fields['Key']} = '{$id}'";
        $sql = "update {$this->getTable()} set ";
        foreach($data as $key => $value){
            $sql .= $key . '="' . $value . '",';
        }
        $sql = rtrim($sql,',') . $where;
        return $this->exec($sql);
    }


    public function autoInsert($data){
        $keys = $values = '';
        foreach($this->fields as $k => $v){
            if($k == 'Key') continue;
            if(array_key_exists($v,$data)){
                $keys .= $v . ',';
                $values .= "'" . $data[$v] . "',";
            }
        }
        $keys = rtrim($keys,',');
        $values = rtrim($values,',');
        $sql = "insert into {$this->getTable()} ({$keys}) values({$values})";
        return $this->exec($sql);
    }

}
