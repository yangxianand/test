<?php
include_once('smarty/Smarty.class.php');   // Smarty的安装目录
$smarty = new Smarty();
$hello = 'hello world';
$smarty->assign('hello', $hello);
$smarty->display('smarty.html');