<?php
class User
{
    public $name = '����';              // ����
    protected $phone = '400-123456';	// �绰
    private $money = '5000';            // ���
}
$user = new User();
echo $user->name;                       // ������������
echo $user->phone;					  	// ����
echo $user->money; 					  	// ����