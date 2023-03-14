<?php
class User
{
    public $name;
    public function __construct($name = 'xxx')
    {
        $this->name = $name;
    }
}
$obj1 = new User();
$obj2 = new User('Tom');
echo $obj1->name;          // 输出结果：xxx
echo $obj2->name;          // 输出结果：Tom