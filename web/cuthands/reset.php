<meta charset="utf-8">
<?php
include './_config.php';

try {
	$email =  mysql_real_escape_string($_GET['email']);
	$token =  mysql_real_escape_string($_GET['token']);
	$sql = "SELECT * from user where username='$email' and token='$token'";
	if( $r = mysql_fetch_assoc( mysql_query($sql) ) ){
		echo "您要找的密码是：".$r['password']."</br>";
	}else{
		echo "找回密码失败";
	}
} catch (Exception $e) {
	echo "失败";
}

