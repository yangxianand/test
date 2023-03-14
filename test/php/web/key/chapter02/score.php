<?php
// 定义变量$name保存学生的名字
$name = '小明';
// 定义变量$score保存学生的分数
$score = 78;
// 判断$score是否为一个有效数值
if (is_int($score) || is_float($score)) {
    // 根据分数所在区间，显示相应的得分等级
    if ($score >= 90 && $score <= 100) {
        $str = 'A级';
    } else if ($score >= 80 && $score < 90) {
        $str = 'B级';
    } else if ($score >= 70 && $score < 80) {
        $str = 'C级';
    } else if ($score >= 60 && $score < 70) {
        $str = 'D级';
    } else if ($score >= 0 && $score < 60) {
        $str = 'E级';
    } else {
        $str = '学生成绩范围必须在0~100之间！';
    }
} else {
    $str = '输入的学生成绩不是数值！';
}
?>
<h2>学生成绩等级</h2>
<p>学生姓名：<?php echo $name; ?></p>
<p>学生分数：<?php echo $score; ?>分</p>
<p>成绩等级：<?php echo $str; ?></p>


