<table border='1'>
<?php
for($i=1;$i<10;$i++){
	echo'<tr>';
	for($j=1;$j<=$i;$j++){
		echo'<td>'.$j.'*'.$i.'='.$j*$i.'</td>';
	}
	echo'</tr>';
}
?>
</table>