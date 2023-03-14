<?php
class People
{
    public $name = 'People';
    public function show()
    {
        echo __CLASS__;
    }
    public function say()
    {
        echo __CLASS__ . 'say';
    }
}
class Man extends People
{
    public $name = 'Man';
    public function show()
    {
        echo __CLASS__;
    }
    protected function say()
    {
        echo __CLASS__ . 'say';
    }
}
$man = new Man();
var_dump($man);		// object(Man)#1(1){["name"]=>string(3)"Man"}
$man->show();		// Man
$man->say();		// Fault error:Access level to Man::say()must...