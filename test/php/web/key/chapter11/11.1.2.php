<?php
// 连接数据库
$dsn = 'mysql:host=localhost;port=3306;dbname=mydb;charset=utf8';
$pdo = new PDO($dsn, 'root', '123456');
if (!$pdo) {
    exit('数据库连接失败!');
}
// 执行SQL语句
$sql = 'SELECT * FROM student';
$stmt = $pdo->query($sql);
// 判断是否执行成功
if (false === $stmt) {
    echo 'SQL错误：<br>';
    echo '错误代码：' . $pdo->errorCode() . '<br>';
    echo '错误原因：' . $pdo->errorInfo()[2];
    exit;
}
// 查询所有结果
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);