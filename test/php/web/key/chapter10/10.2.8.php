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
echo $obj1->name;          // ��������xxx
echo $obj2->name;          // ��������Tom