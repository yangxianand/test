<?php
$dir = $_POST['dir'] ?? '';
$filename = $_POST['filename'] ?? '';
$newname = $_POST['newname'] ?? '';
if(!is_dir($dir)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
$rename = $dir . '/' . $filename;
if(!file_exists($rename)){
    echo '文件不存在!';
    header('Refresh:3;url=getfile.php?' . $dir);
    exit;
}
if(empty($newname)){
    echo '新文件名称不能为空!';
    header('Refresh:3;url=getfile.php?' . $dir);
    exit;
}
$res = @rename($rename, $dir. '/' . $newname);
if(!$res){
    echo '文件重命名失败!';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}else{
    echo '文件重命名成功!';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}
