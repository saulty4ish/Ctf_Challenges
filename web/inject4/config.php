<?php
$db['host'] = 'localhost';
$db['port'] = '3306';
$db['username'] = 'inject4';
$db['password'] = 'inject4';
$db['database'] = 'inject4';

$link = mysql_connect($db['host'].':'.$db['port'], $db['username'], $db['password']);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($db['database']);
mysql_query("SET NAMES 'UTF8'");

foreach ($_POST as $key => $value) {
	if(stripos($value, 'sleep')!==false || stripos($value, 'benchmark')!==false){
		die('不许使用这sleep,benchmark两个函数');
	}
}
?>
