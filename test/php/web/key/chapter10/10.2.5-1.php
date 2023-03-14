<?php
class Person
{
    public $age = 1; 
}
$object1 = new Person();
$object2 = clone $object1;
$object1->age = 10;
var_dump($object1->age);   // 输出结果：int(10)
var_dump($object2->age);   // 输出结果：int(1)