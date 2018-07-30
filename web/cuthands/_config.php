<?php
//error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);
$db['host'] = 'localhost';
$db['port'] = '3306';
$db['username'] = 'cuthands';
$db['password'] = 'cuthands';
$db['database'] = 'cuthands';

$link = mysql_connect($db['host'].':'.$db['port'], $db['username'], $db['password']);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($db['database']);
mysql_query("SET NAMES 'UTF8'");

foreach ($_POST as $key => $value) {
	if(stripos($value, 'sleep')!==false || stripos($value, 'benchmark')!==false){
		die('BAN sleep,benchmark');
	}
}

function errorDie($s){
	echo "error:$s";
	die();
}

function checkEmail($email){
	$length = strlen($email);
	$at = strpos($email, '@');
	$point = strpos($email, '.');
	//var_dump($length,$at,$point);
	if ($at === false || $point === false || $at == 0 || $point == $length-1 || $point - $at < 2)
	{
		return false;	
	}
	return true;
}


session_start();

?>