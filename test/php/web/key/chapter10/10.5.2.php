<?php
class People
{
    public $name = 'Tom';				// ����
    protected $age = '20';				// �绰
    private $money = '5000';			// ���
    public function showName()			// ���з���
    {
        echo $this->name;
    }
    protected function showAge()		// �ܱ�������
    {
        echo $this->age;
    }
    private function showMoney()		// ˽�з���
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
$man->showName;				// ��������Tom
$man->getProtected();		// ��������20
$man->getPrivate();