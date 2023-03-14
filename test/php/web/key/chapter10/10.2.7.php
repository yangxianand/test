<?php
class User
{
    public $name = '张三';              	// 姓名
    protected $phone = '400-123456';	    // 电话
    private $money = '5000';            	// 存款
    public function getAll()
    {
        var_dump($this);
        echo $this->name, ' ';
        echo $this->phone, ' ';
        echo $this->money, ' ';
    }
}
$user = new User();
$user->getAll();	                        // 输出结果：张三 400-123456 5000