<?php
$dir = $_GET['dir'] ?? '';
$file = $_GET['file'] ?? '';
if(empty($dir) || empty($file)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
$edit = $dir . '/' . $file;
if(!file_exists($edit)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
include_once('rename.html');
