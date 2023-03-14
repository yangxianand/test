<?php
$g_price=5;
$m_price=3;
$x_price=1/3;
for($g=1;$g<=100;$g++){
	for($m=1;$m<=100-$g;$m++){
		for($x=1;$x<=100-$g-$m;$x++){
			$sum=$g+$m+$x;
			if(($g+$m+$x)==100){
				if($g*$g_price+$m*$m_price+$x*$x_price==100)
				echo '公鸡：'.$g.'  '.'母鸡：'.$m.'  '.'小鸡：'.$x.'<br>  ';
			}
			
		}
	}
}

?>