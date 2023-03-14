<?php
include 'Sql.php';

$conn = connect('root','','news',$error);
if(!$conn) die($error);
$sql = "SELECT id,name FROM author";
$authors = read($conn,$sql,$error,true);

include 'add.html';
?>