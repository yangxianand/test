<?php
include_once('smarty/Smarty.class.php');   // Smarty�İ�װĿ¼
$smarty = new Smarty();
$hello = 'hello world';
$smarty->assign('hello', $hello);
$smarty->display('smarty.html');