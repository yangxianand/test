<?php
// �������ݿ�
$dsn = 'mysql:host=localhost;port=3306;dbname=mydb;charset=utf8';
$pdo = new PDO($dsn, 'root', '123456');
if (!$pdo) {
    exit('���ݿ�����ʧ��!');
}
// ִ��SQL���
$sql = 'SELECT * FROM student';
$stmt = $pdo->query($sql);
// �ж��Ƿ�ִ�гɹ�
if (false === $stmt) {
    echo 'SQL����<br>';
    echo '������룺' . $pdo->errorCode() . '<br>';
    echo '����ԭ��' . $pdo->errorInfo()[2];
    exit;
}
// ��ѯ���н��
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);