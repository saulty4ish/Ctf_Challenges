<?php
include_once './_config.php';
include_once './checkLogin.php';

$sql = "SELECT * from goods";

$r = mysql_query($sql);

//var_dump($r);

$result = array();

while ($row = mysql_fetch_assoc($r)) {
	$result[] = $row;
}

//var_dump($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>天融信购物平台</title>
	<meta charset="utf-8">
</head>
<body>
<header>
	<h1>天融信购物</h1>
	<a href="./login.php">登陆</a>
	<a href="./register.php">注册</a>
	<?php
	echo "您的剩余金额：".$userInfo['money'];
	?>
</header>
<div>
	<h2>商品列表</h2>
	<ul>
		<?php foreach ($result as $key => $value) { ?>
		<li>
			<h4><?php echo $value['name'];?></h4>
			<span name="price">￥<?php echo $value['price'];?></span>
			<p><?php echo $value['description'];?></p>
			<?php if($value['id'] != 5){ ?>

			<a href="./buy.php?id=<?php echo $value['id'];?>&num=1">购买</a>
			<a href="./buy.php?id=<?php echo $value['id'];?>&num=2">我买两个</a>
			<a href="./buy.php?id=<?php echo $value['id'];?>&num=3">狂买三个</a>

			<?php }else{ ?>
			<a href="./buy.php?id=<?php echo $value['id'];?>">召唤神龙（神龙只能买一个哦）</a>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
</div>
</body>
</html>
