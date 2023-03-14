<?php
include 'Sql.php';
# 新增入库
header('Content-type:text/html;charset=utf-8');

# 接收数据
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$a_id = $_POST['author'] ?? 0;

# 安全判定
if(empty($title) || empty($content)){
    # 错误跳转重来
    header('refresh:3;url=add.php');
    echo '新闻标题和内容都不能为空！';
    exit;
}

$conn = connect('root','','news',$error);
if(!$conn) die($error);
$sql = "insert into news values(null,'". $title."','".$content."',".$a_id.",".time().")";
$res = query($conn,$sql,$error);

# 判定数据
if($res){
    header('refresh:2;url=index.php');
    echo '新闻：' . $title . ' 新增成功！';
}else{
    header('refresh:3;url=add.php');
    echo '新闻：' . $title . '新增失败！';
}