<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style>
	body{
		text-align:center;
	}
	.box{
		margin:0 auto;width:880px;
	}
	.title{background:#ccc
	}
	table{
		height:200px;
		weight:200px:
		font-size:12px;
		text-align:center;
		float:left;
		margin:10px;
	}
	</style>
	<body>
		<?php
		function calender($y){
			$w=date('w',strtotime("$y-1-1"));
			$html.='<div class="box">' ;
			for($m=1;$m<=12;$m++){
				$html.='<table>';
				$html.='<tr class="title"><th colspan="7">.'.$y.'年'.$m.'月</th></tr>';
				$html.='<tr><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td>';
				$max=date('t',strtotime("$y-$m"));
				$html.='<tr>';
				for($d=1;$d<=$max;++$d){
					if($w&&$d==1){
						$html.="<td colspan=\"$w\"></td>";
					}
					$html.="<td>$d</td>";
					if($w==6&&$d!=$max){
						$html.='</tr><tr>';
					}else if($w<6){
						$html.='</tr>';
					}
				}
				
			}
		}
		
		echo calender(2023);
		echo 123;
		?>
	</body>
</html>

