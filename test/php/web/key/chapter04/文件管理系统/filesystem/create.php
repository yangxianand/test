<?php
$dir = $_POST['dir'] ?? '';
$filename = $_POST['filename'] ?? '';
$type = $_POST['type'] ?? 1;
if(!is_dir($dir)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
if(empty($filename)){
    echo '文件名称不能为空!';
    header('Refresh:3;url=index.html');
    exit;
}
if($type != '1' && $type != '2'){
    echo '无效的文件类型!';
    header('Refresh:3;url=index.html');
    exit;
}
if($type == '1'){
    $res = @mkdir($dir . '/' . $filename);
}else{
    $res = @touch($dir . '/' . $filename);
}
if(!$res){
    echo '文件创建失败!';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}else{
    echo '文件创建成功!';
    header('Refresh:3;url=index.html');
    exit;
}
