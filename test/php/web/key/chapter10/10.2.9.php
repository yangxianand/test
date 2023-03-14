<?php
class User
{
    public function __destruct()
    {
        echo '正在执行析构方法';
    }
}
$obj = new User();
unset($obj);          // 输出结果：正在执行析构方法