<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="renderer" content="webkit" />
	<title>嘻嘻</title>
	<style type="text/css">
		body,html{
			position: relative;
			height: 100%;
			width: 100%;
			padding: 0;
			margin: 0;
			background-color: #272822;
			color: #fff;
		}
		form{
			position: absolute;
			top: 50%;
			left: 50%;
			width: 400px;
			margin: -70px -200px;
		}
	</style>
</head>
<body>
	<!--你懂得 你得传个脚本文件 -->
	<form action="upload.php" method="post" id="uploadFile" enctype="multipart/form-data">
		<h1>图片上传</h1>
		<input type="file" name="file" id="file" /> 
		<a href="javascript:;" onclick="submit()">提交</a>
	</form>
	<script type="text/javascript">
		function submit(){
			//这个你们看得懂吧。。 就是点了button点用这个 然后调用check() 返回正确就提交
			var form = document.getElementById("uploadFile");
			if (check()) 
				form.submit();
		}
		function check(){
			var form = document.getElementById("uploadFile");
			var file = document.getElementById("file");

			var filename = file.value;	
			var nameArr = filename.split('.');
			var Suffix = nameArr[nameArr.length-1];

			console.log(Suffix);

			if(Suffix==''){
				alert('你传了吗你就点。。。');
				return false;
			}

			if(Suffix!='jpg'&&Suffix!='png'&&Suffix!='bmp'&&Suffix!='gif'){
				alert('只能传图片哎');
				return false;
			}
			return true;
			
		}
	</script>

</body>
</html>