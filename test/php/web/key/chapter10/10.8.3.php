<?php
// ʹ����ͨ������������
function getArray()
{
    for ($i = 0; $i < 10000; $i++) {
        $arr[] = $i;
    }
    return $arr;
}
$arr = getArray();
foreach ($arr as $v) {
    echo $v;
}
echo memory_get_usage();   // 919928

// ʹ����������������
function getArray()
{
    for($i = 0; $i < 10000; $i++){
        yield $i;
    }
    return $arr;
}
$arr = getArray();
var_dump($arr);				// ������ object(Generator)#1(0){}
foreach ($arr as $v) {
    echo $v;
}
echo memory_get_usage();	// 392400
