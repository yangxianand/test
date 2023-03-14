<?php
//创建一个1~33的红色球号码区数组
$red_num = range(1,33);
//随机从红色球号码区数组中获取6个键
$keys = array_rand($red_num,6);
//打乱键顺序
shuffle($keys);
//根据键获取红色球号码区数组中相应的值
foreach($keys as $v){
    //判断：当红球号码是一位数时，在左侧补零
    $red[] = $red_num[$v]<10 ? ('0'.$red_num[$v]) : $red_num[$v];
}
//随机从1~16的蓝色球号码区中取一个号码
$blue_num = rand(1,16);
//判断：当蓝球号码是一位数时，在左侧补零
$blue = $blue_num<10 ? ('0'.$blue_num) : $blue_num;
echo "<title>双色球</title>";
foreach($red as $v){
    //输出红球号码
    echo "<font color='red'>" . $v . '</font> ';
}
//输出蓝球号码
echo "<font color='blue'>" . $blue. '</font>';//查看运行结果

