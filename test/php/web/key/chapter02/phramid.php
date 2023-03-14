<?php
//金字塔的总行数
$n = 5;
//控制金字塔的行
for($i = 1; $i <= $n; $i++){
    //输出每行的空格
    for($j = 1; $j <= $n-$i; $j++){
        echo "&nbsp;";
    }
    //输出每行的*
    for($k = 1; $k <= (2*$i)-1; $k++){
        echo '<font color="yellow">' . "*" . '</font>';
    }
    echo "<br/>";
}