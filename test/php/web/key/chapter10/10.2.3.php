<?php
class Person
{
    public $name = 'δ����';	// �����Ա����
    public function speak()		// ��Ա����
    {
        echo 'The person is speaking.';
    }
}
$person = new Person();         // ʵ����Person��
echo $person->name;             // ��ȡ��Ա���Ե�Ĭ��ֵ����������δ����
$person->name = '����';         // �޸ĳ�Ա���Ե�Ĭ��ֵ
echo $person->name;             // ������������
$person->speak();               // ��������The person is speaking.