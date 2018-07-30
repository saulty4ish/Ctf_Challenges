<?php
include_once '_config.php';
if (isset($_POST['submit'])) {
	if (!checkEmail($_POST['username']))
		errorDie("email! ok?");
	$un = mysql_real_escape_string($_POST['username']);
	$ps = mysql_real_escape_string($_POST['password']);
	$unAdmin = md5(time().$un.time()).'@topsec.com.cn';
	$unPass  = md5(md5($un.$ps.'xxxthisisthesalt').time());

	$sql  = "INSERT INTO `user`(`username`, `password`, `adminName`) VALUES ('$un','$ps','$unAdmin')";
	$sql2 = "INSERT INTO `user`(`username`, `password`, `state`, `money`) VALUES ('$unAdmin','$unPass',2,100000)";
	if($r = mysql_query($sql) && $r2 = mysql_query($sql2)){
		header("Location:./login.php");
		
	}else{
		errorDie("reg fail");
	}

	var_dump($r);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<meta charset="utf-8"> 
</head>
<body>
<h1>注册</h1>
<form method="POST" action="./register.php">
	<a href="./login.php">登陆</a>
	Email:<input name="username" type="text"></input>
	Password:<input name="password" type="text"></input>
	<input name="submit" type="submit"></input>
</form>
</body>
</html>
