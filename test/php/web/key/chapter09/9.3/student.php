<?php
$link = mysqli_connect('localhost', 'root', '123456', 'mydb', '3306');
if (!$link) {
    exit(mysqli_connect_error());
}
// 设置字符集
if (!mysqli_set_charset($link, 'utf8')) {
    exit(mysqli_error($link));
}
// 选择数据库
if (!mysqli_select_db($link, 'mydb')) {
    exit(mysqli_error($link));
}
/*
// 新增数据
// 执行插入数据的SQL语句
$query = 'INSERT INTO `student` VALUES(NULL, \'Bob\', 20)';
// 执行写入操作
$result = mysqli_query($link, $query);
if ($result) {
    echo mysqli_insert_id($link); // 获取自增id
} else {
    exit(mysqli_error($link));
}
// 释放结果集资源
mysqli_free_result($result);
// 关闭连接
mysqli_close($link);
*/

/*
// 更新数据
// 更新数据的SQL语句
$query = 'UPDATE `student` SET `age`=21 WHERE `id`=5';
// 执行更新操作
$result = mysqli_query($link, $query);
if (!$result) {
    exit(mysqli_error($link));
}
// 返回结果
echo mysqli_affected_rows($link);
// 关闭连接
mysqli_close($link);
*/

/*
// 删除数据
// 删除数据的SQL语句
$query = 'DELETE FROM `student` WHERE `id`=5';
// 执行删除操作
$result = mysqli_query($link, $query);
if (!$result) {
    exit(mysqli_error($link));
}
// 返回结果
echo mysqli_affected_rows($link);
// 关闭连接
mysqli_close($link);
*/

// 查询数据的SQL语句
$query = 'SELECT * FROM `student`';
// 执行查询操作
$result = mysqli_query($link, $query);
if (!$result) {
    exit(mysqli_error($link));
}
// 处理结果集
$list = [];
while ($row = mysqli_fetch_assoc($result)) {
    $list[] = $row;
}
// 释放结果集资源
mysqli_free_result($result);


// 关闭连接
mysqli_close($link);
echo '<table><tr><th>id</th><th>姓名</th><th>年龄</th></tr>';
foreach ($list as $val) {
	echo "<tr><td>{$val['id']}</td><td>{$val['name']}</td><td>{$val['age']}</td></tr>";

}
echo '<table>';