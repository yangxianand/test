<?php
class Sql
{
    private $host;
    private $port;
    private $user;
    private $pass;
    private $dbname;
    private $charset;
    public function __construct(array $info = [])
    {
        $this->host = $info['host'] ?? 'localhost';
        $this->port = $info['port'] ?? '3306';
        $this->user = $info['user'] ?? 'root';
        $this->pass = $info['pass'] ?? '';
        $this->dbname = $info['dbname'] ?? 'test';
        $this->charset = $info['charset'] ?? 'utf8';
		if (!$this->connect()) {
			return;
		}
		$this->charset();
    }
	public $errorno;	// 连接错误代码值
	public $error;		// 连接错误信息
	private $link;		// 连接资源
	private function connect()
	{
		$this->link = @mysqli_connect($this->host, $this->user, $this->pass,
		  $this->dbname, $this->port);
		if (!$this->link) {
			$this->errorno = mysqli_connect_errno();
			$this->error = mysqli_connect_error();
			return false;
		}
		return true;
	}

	private function charset()
	{
		$res = @mysqli_set_charset($this->link, $this->charset);
		if (!$res) {
			$this->errorno = mysqli_errno($this->link);
			$this->error = mysqli_error($this->link);
			return false;
		}
		return true;
	}
	public function check($sql)
	{
		$res = mysqli_query($this->link, $sql);
		if (!$res) {
			$this->errorno = mysqli_errno($this->link);
			$this->error = mysqli_error($this->link);
			return false;
		}
		return $res;
	}
	public function write($sql)
	{
		$res = $this->check($sql);
		return $res ? mysqli_affected_rows($this->link) : false;
	}
	public function insertId()
	{
		return mysqli_insert_id($this->link);
	}

	public $columns = 0;
	public function readOnce($sql)
	{
		$res = $this->check($sql);
		if ($res) {
			$this->column = @mysqli_field_count($this->link);
			return mysqli_fetch_assoc($res);
		}
	}
	public $rows = 0;
	public function readAll($sql)
	{
		$res = $this->check($sql);
		if (!$res) {
			return $res;
		}
		$this->rows = mysqli_num_rows($res);
		$list = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$list[] = $row;
		}
		return $list;
	}
}


$info = ['pass' => '123456', 'dbname' => 'mydb'];
$obj = new Sql($info);
$one = $obj->readOnce('SELECT * FROM student WHERE id=1');
//print_r($one);
$all = $obj->readAll('SELECT * FROM student');
//print_r($all);
echo $obj->write("INSERT INTO `student` VALUES (NULL, 'Alen', '20')");