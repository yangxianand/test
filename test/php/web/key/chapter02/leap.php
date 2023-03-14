<?php
$year = 2020;
if (($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0)) {
    $result = $year . '年是闰年';
} else {
    $result =  $year . '年不是闰年';
}
?>
<h2>闰年的判断</h2>
<p>输入的年份：<?php echo $year; ?></p>
<p>判断的结果：<?php echo $result; ?></p>

<!-- 使用三元运算符判断闰年

<?php
$year = 2015;
$result = ($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0);
?>
<h2>闰年的判断</h2>
<p>输入的年份：<?php echo $year; ?>年
<?php echo $result ? '是闰年' : '不是闰年'; ?></p>

-->


