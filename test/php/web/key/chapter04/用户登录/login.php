<?php

$username = trim($_POST['username']);
$password = trim($_POST['password']);
if(empty($username) || empty($password)){
   header("location:./login.html");
}
// 假设用户用是user,密码是123456
$user = ['name' => 'user', 'password' => '123456'];
if($user['name'] !== $username){
	echo "用户名错误";
	header("location:./login.html");
	return;
}
if($user['password'] !== $password){
	echo "密码错误";
	header("location:./login.html");
	return;
}
@session_start(['cookie_httponly' => true]);
$_SESSION['user'] = ['name' => $username, 'password' => $password];

header("location:./index.php");