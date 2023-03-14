<?php
$dir = $_GET['dir'] ?? '';
if(!is_dir($dir)){
    echo '路径无效';
    header('Refresh:3;url=index.html');
    exit;
}
include_once 'dirfile.php';

$files = dirfile($dir,$error);

if(!$files){
    echo $error;
    header('Refresh:3;url=index.html');
    exit;
}
include_once  'list.html';
