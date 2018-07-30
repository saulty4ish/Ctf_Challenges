<?php
session_start();
header("Content-type: text/html; charset=utf-8"); 
if (!isset($_FILES["file"]) || $_FILES["file"]["error"] > 0){
	echo '<script charset="UTF-8">alert("上传文件失败");location.href="index.php";</script>';
	die();
}

$typeHasImage = (strpos($_FILES["file"]["type"], 'image') !== false);

$arr = ["php","php2","php3","php4","php5","phtm","phtml","phps"];
$NameArr = explode('.', $_FILES["file"]["name"]);
$Suffix  = $NameArr[count($NameArr)-1];
$isPHP = 0;
foreach ($arr as $key => $value) {
	if($value === $Suffix){
		$isPHP = 1;
		break;
	}
}

$newFileName = $_FILES["file"]["name"];

if(!isset($_SESSION['filename'])){
	$_SESSION['filename'] = md5(time());
}

$url = "upload/".$_SESSION['filename'].'.'.$Suffix;
echo "上传成功 :".$url." 只要你不改变cookie你的上传文件名就不会改变</br>";

if($isPHP === 0){
	echo "但是你传的这种文件执行不了并没有什么用所以我给你删掉了，需要的脚本文件才能黑掉我"."</br>";
	die();
}else if($isPHP === 1){
	echo '恭喜你通过第一层防护这个flag简直白送！！'."</br>".'flag{D0_y0u_KNow_J@v@Scr1pt}'."</br>";
	if($typeHasImage){
		echo '给你第二个flag吧这个也是白送╮(╯_╰)╭'."</br>".'flag{D0_y0u_KNow_How_t0_use_PHP_to_check_F1le}'."</br>";
	}else{
		echo '检测到不是图片文件 你需要绕过第二层防护'."</br>";
		die();
	}
}


//最后一题
if($Suffix == 'php' or $Suffix =='php2' or $Suffix =='php3' or $Suffix =='php4'){
	echo "但是这个文件后缀在上传黑名单里 你需要绕过第三层防护"."</br>";
}else{
	//echo 'xxxxxxxxxxxxxxxxxxxx';
	$myfile = fopen($url, "w") or die("服务器故障！看到这个请直接联系主办方，不是说笑。。。");
	$txt = 'flag{$$$_YOU_ARE_THE_BEST_GUY_HEIHEI_$$$}';
	fwrite($myfile, $txt);
	fclose($myfile);
	for ($i=0; $i < 5000; $i++) { 
		# code...
	}
	echo "行吧！行吧！给你第三个flag"."</br>"."flag{pHp_h@s_n0t_0n1y_0Ne_sUfFIx}"."</br>"."可是现在已经被杀了 你得赶快"."</br>";
	unlink($url);
}

