<meta charset="utf-8">
<?php

include './_config.php';

include './checkLogin.php';

if(!isset($_GET['id']))
	errorDie("don't kid me ok?");

$goodsId = intval($_GET['id']);



$good = mysql_fetch_assoc( mysql_query("SELECT * from goods where id=$goodsId") );

//$user = mysql_fetch_assoc( mysql_query("SELECT * from user  where id=$userId ") );

if($userInfo['state'] < $good['state']){
	errorDie("你根本没有资格买这个东西 >.<");
}












//处理数量
if(!is_numeric($_GET['num'])){
	errorDie("你再说一遍你要买几个？");
}

$goodsNum = intval($_GET['num']);


//处理花费

$totalCost = $good['price'] * $goodsNum;//bug here

//var_dump($totalCost);

////var_dump($user);

$moneyLeft = doubleval($userInfo['money']) - $totalCost ;

//var_dump($moneyLeft);
//var_dump($good);

if($moneyLeft < 0){
	$msg = '有钱吗，兄弟？';
}else{
	$sql = "UPDATE user SET money=$moneyLeft where id={$userInfo['id']}";
	if(mysql_query($sql)){
		$msg  =  "购买成功 你还有 ￥$moneyLeft";
		echo $good['content']."</br>";
		if($good['id'] ==3){
			echo "我只有管理员账号：".$userInfo['adminName'];
			echo "<br>";
			echo "<br>";
			echo '(╯‵□′)╯︵┻━┻ 不是说有密码？！！！';
			echo "<br>";
			echo "<br>";
			echo "好吧，给你个flag先：flag{Y0u_can_buy_eVeRyTh1nG}";
			echo "<br>";
			echo "<br>";
		}
	}else{
		$msg  =  '未知错误，联系主办方 你只有 ￥$moneyLeft';
	}
}


echo $msg;

