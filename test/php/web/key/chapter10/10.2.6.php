<?php
class User
{
    public $name = '张三';              // 姓名
    protected $phone = '400-123456';	// 电话
    private $money = '5000';            // 存款
}
$user = new User();
echo $user->name;                       // 输出结果：张三
echo $user->phone;					  	// 报错
echo $user->money; 					  	// 报错