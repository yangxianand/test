<?php
class Student
{
    public static $msg;
    public static function show()
    {
        echo self::$msg;		// 类内访问静态属性
    } 
}
Student::$msg = '信息';		    // 类外访问静态属性