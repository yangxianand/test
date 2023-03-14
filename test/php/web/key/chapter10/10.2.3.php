<?php
class Person
{
    public $name = '未命名';	// 定义成员属性
    public function speak()		// 成员方法
    {
        echo 'The person is speaking.';
    }
}
$person = new Person();         // 实例化Person类
echo $person->name;             // 获取成员属性的默认值，输出结果：未命名
$person->name = '张三';         // 修改成员属性的默认值
echo $person->name;             // 输出结果：张三
$person->speak();               // 输出结果：The person is speaking.