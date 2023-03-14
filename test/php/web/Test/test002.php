<?php
$student_name='YX';
$student_score=79;
if(is_numeric($student_score)){
	echo$student_name;
	if($student_score>=90){
		echo '的成绩评定为：A';
	}else if($student_score>=80){
		echo '的成绩评定为：B';
	}else if($student_score>=70){
		echo'的成绩评定为：C';
	}else if($student_score>=60){
		echo '的成绩评定为：D';
	}else{
		echo'的成绩评定为：E';
	}
}else{
	echo'成绩不是数字';
}
//--------------------------------------------------------
echo'<br>';
//--------------------------------------------------------
switch(is_numeric($student_score)){
	case true:	echo$student_name;
	$student_score_s=var_dump((int)$student_score/10);
		  switch($student_score_s){
			case 10:
			case 9: echo'的成绩评定为：A';break;
			case 8: echo'的成绩评定为：B';break;
			case 7: echo'的成绩评定为：C';break;
			case 6: echo'的成绩评定为：D';break;
			default:echo'的成绩评定为：E';break;
	 }break;
	 
	case false:	echo '成绩不是数字';break;
}

?>
