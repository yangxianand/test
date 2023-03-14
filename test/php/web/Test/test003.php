<?php
$year=2023;
$result;
if($year%4==0&&!$year%400==0||$year%400==0){
	$result="是闰年";
}else{
	$result="不是闰年";
}

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	<h2>闰年的判断</h2>
<?php
echo $year;
echo $result;
?>
	</body>
</html>