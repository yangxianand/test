<?php
class Man
{
    public $name = 'Tom';
    protected $age = 30;
    private $money = 1000;
}
$man = new Man();
// ��������name:Tom
foreach($man as $key => $val){
    echo $key . ' : ' . $val . '<br/>';
}