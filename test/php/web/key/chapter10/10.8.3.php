<?php
// 使用普通方法遍历数组
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

// 使用生成器遍历数组
function getArray()
{
    for($i = 0; $i < 10000; $i++){
        yield $i;
    }
    return $arr;
}
$arr = getArray();
var_dump($arr);				// 输出结果 object(Generator)#1(0){}
foreach ($arr as $v) {
    echo $v;
}
echo memory_get_usage();	// 392400
