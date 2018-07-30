<?php

include_once '_config.php';
if (isset($_POST['submit'])) {
	$un = mysql_real_escape_string($_POST['username']);
	$ps = mysql_real_escape_string($_POST['password']);

	$sql = "SELECT * from user where username='$un' and password='$ps' " ;

	if($r = mysql_query($sql)){
		$result = mysql_fetch_assoc($r);
		if(!$result)
			errorDie("login fail");
		$_SESSION['login'] = $result['id']; 
		echo "<script>alert('login success');window.location='./index.php'</script>";
		die();
	}else{
		errorDie("login fail");		
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>登陆</title>
	<meta charset="utf-8"> 
</head>
<body>
<h1>登陆</h1>
<form method="POST" action="./login.php">
	<a href="./register.php">注册</a>
	username:<input name="username" type="text"></input>
	password:<input name="password" type="text"></input>
	<input name="submit" type="submit"></input>
	<a href="./findpwd.php">找回密码</a>
</form>
</body>
</html>
