<?php
$dir = $_GET['dir'] ?? '';
$file = $_GET['file'] ?? '';
if(empty($dir) || empty($file)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
$add = $dir . '/' . $file;
if(!file_exists($add)){
    echo '路径无效';
    header('Refresh:3;url=getfile.php?dir=' . $dir);
    exit;
}
include_once('add.html');
