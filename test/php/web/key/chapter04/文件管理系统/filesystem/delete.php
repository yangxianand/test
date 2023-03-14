<?php
$dir = $_GET['dir'] ?? '';
$file = $_GET['file'] ?? '';
if(empty($dir) || empty($file)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
$delete = $dir . '/' . $file;
if(!file_exists($delete)){
    echo '当前要删除的文件不存在';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}
if(is_dir($delete)){
    $res = @rmdir($delete);
}else{
    $res = @unlink($delete);
}
if(!$res){
    echo '文件删除失败!';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}else{
    echo '文件删除成功!';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}
