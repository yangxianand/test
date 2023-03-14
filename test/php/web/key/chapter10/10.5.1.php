<?php
// 定义People类
class People
{
    public $name;
    public function say()
    {
        echo $this->name . 'is speaking';
    }
}
// 定义Man类，继承People类
class Man extends People
{
    public function __construct($name)
    {
        $this->mame = $name;
    }
}
$man = new Man('Tom');
$man->say();  // 输出结果：Tom is speaking