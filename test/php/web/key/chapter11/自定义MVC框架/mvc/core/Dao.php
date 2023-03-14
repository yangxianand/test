<?php
namespace core;

use PDO;
use PDOException;
use Exception;

class Dao{

    protected $pdo;

    public function __construct($database_info = array())
    {
        $type = $database_info['type'] ?? 'mysql';
        $host = $database_info['host'] ?? 'localhost';
        $port = $database_info['port'] ?? '3306';
        $user = $database_info['user'] ?? 'root';
        $pass = $database_info['pass'] ?? '';
        $dbname = $database_info['dbname'] ?? '';
        $charset = $database_info['charset'] ?? 'utf8';
        try{
            $dsn = $type . ':host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ';charset=' . $charset;
            $this->pdo = new PDO($dsn, $user, $pass);
        }catch(PDOException $e){
            echo '数据库连接失败!<br/>';
            echo '错误文件为:' . $e->getFile() . '<br/>';
            echo '错误行号为:' . $e->getLine() . '<br/>';
            echo '错误描述为:' . $e->getMessage();
            exit;
        }
    }

    private function dao_exception($e)
    {
        echo 'SQL执行错误!<br/>';
        echo '错误文件为:' . $e->getFile() . '<br/>';
        echo '错误行号为:' . $e->getLine() . '<br/>';
        echo '错误描述为:' . $e->getMessage();
        exit;
    }

    public function dao_exec($sql)
    {
        try {
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            $this->dao_exception($e);
        }
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    public function dao_query($sql, $all = false)
    {
        try {
            $stmt = $this->pdo->query($sql);
            if($all){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $this-> dao_exception($e);
        }
    }


}
