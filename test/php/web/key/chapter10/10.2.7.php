<?php
class User
{
    public $name = '����';              	// ����
    protected $phone = '400-123456';	    // �绰
    private $money = '5000';            	// ���
    public function getAll()
    {
        var_dump($this);
        echo $this->name, ' ';
        echo $this->phone, ' ';
        echo $this->money, ' ';
    }
}
$user = new User();
$user->getAll();	                        // ������������ 400-123456 5000