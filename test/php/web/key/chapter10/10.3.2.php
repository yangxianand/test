<?php
class Student
{
    public static $msg;
    public static function show()
    {
        echo self::$msg;		// ���ڷ��ʾ�̬����
    } 
}
Student::$msg = '��Ϣ';		    // ������ʾ�̬����