<?php
class User
{
    public function __destruct()
    {
        echo '����ִ����������';
    }
}
$obj = new User();
unset($obj);          // ������������ִ����������