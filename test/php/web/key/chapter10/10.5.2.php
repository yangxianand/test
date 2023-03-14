<?php
class People
{
    public $name = 'Tom';				// 姓名
    protected $age = '20';				// 电话
    private $money = '5000';			// 存款
    public function showName()			// 公有方法
    {
        echo $this->name;
    }
    protected function showAge()		// 受保护方法
    {
        echo $this->age;
    }
    private function showMoney()		// 私有方法
    {
        echo $this->money;
    }
}
class Man extends People
{
    public function getProtected()
    {
        echo $this->showAge();
    }
    public function getPrivate()
    {
        echo $this->money;
        $this->showMoney();
    }
}
$man = new Man();
var_dump($man);
$man->showName;				// 输出结果：Tom
$man->getProtected();		// 输出结果：20
$man->getPrivate();