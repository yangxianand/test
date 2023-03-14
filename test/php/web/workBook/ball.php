<?php
$red_num=range(1,33);
$keys=array_rand($red_num,6);
shuffle($keys);
foreach($keys as $v){
	$red[]=$red_num[$v]<10?('0'.$red_num[$v]):$red_num[$v];
}
$blue_num=rand(1,16);
$blue=$blue_num<10?('0'.$blue_num):$blue_num;
echo'<title>双色球</title>';
foreach($red as $v){
	echo'<font color="red">'.$v.'</font>';
}
echo '<font color="blue">'.$blue.'</font>';
?>
<style>
font{
	width: 20px;
	height: 20px;
	background:#009900;
	padding:10px;
	border-radius:20px;
	
}
</style>