<?php
// ����People��
class People
{
    public $name;
    public function say()
    {
        echo $this->name . 'is speaking';
    }
}
// ����Man�࣬�̳�People��
class Man extends People
{
    public function __construct($name)
    {
        $this->mame = $name;
    }
}
$man = new Man('Tom');
$man->say();  // ��������Tom is speaking