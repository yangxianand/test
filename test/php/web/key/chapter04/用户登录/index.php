<?php
@session_start();
if(!isset($_SESSION['user'])){
	header("location:./login.html");
}
echo "首页";print_r($_COOKIE);print_r($_SESSION);
echo "<a href='./logout.php'>退出登录";
