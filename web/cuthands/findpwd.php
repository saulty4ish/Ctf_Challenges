<meta charset="utf-8">
<?php
include './_config.php';

//var_dump(checkEmail($_GET['email']));
if (isset($_POST['email'])) {

	$email = $_POST['email'];

	if (!checkEmail($email))
		errorDie("email! ok?");

	$email = mysql_real_escape_string($email);

	//var_dump($email);

	$sql = "SELECT * from user where username = '$email' ";

	if(!$data = mysql_fetch_assoc( mysql_query($sql) )){
		errorDie("can not find this email");
	}


	
	$token = md5($email);

	$sql = "UPDATE user SET token='$token' where username = '$email' ";

	if(mysql_query($sql)){
		if($data['state'] > 0){
			echo '想要重置管理员密码？他的重置链接不能显示给你看';
		}else{
			echo '打开这条链接以重置密码: '.substr($_SERVER['HTTP_REFERER'], 0,-11).'reset.php?email='.$email.'&token='.$token;
		}
		die();
	}else{
		errorDie("未知错误 ，联系主办方");
	}

	
}else{

//9b070d21dab4a949fc901a1140ed3757

?>

<!DOCTYPE html>
<html>
<head>
	<title>找回密码</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="./findpwd.php" method="POST">
		输入你要找回的账号：<input type="text" name="email"></input>
		<input type="submit"></input>
	</form>
</body>
</html>

<?php } ?>


