<?php
if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
	header("Location:./login.php");	
	die();


}else{

	$userId = intval($_SESSION['login']);

	$userInfo = mysql_fetch_assoc(mysql_query("SELECT * from user where id=$userId"));

	if(!$userInfo){
		header("Location:./login.php");
		die();
	}
	//var_dump($userInfo);
}