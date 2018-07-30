<?php
if(isset($_GET["lang"])){  
    $lang=$_GET["lang"];  
}else{  
    $lang="cn.php";  
}  
?> 
<form>  
<select style="width:60px;" name="lang">  
<option value="cn.php"<?php echo $lang=="cn.php"?"selected":"";?>>中文</option>  
<option value="en.php"<?php echo $lang=="en.php"?"selected":"";?>>英文</option>
<option value="kr.php"<?php echo $lang=="kr.php"?"selected":"";?>>韩文</option>
<option value="jp.php"<?php echo $lang=="jp.php"?"selected":"";?>>日文</option>
<option value="de.php"<?php echo $lang=="de.php"?"selected":"";?>>德文</option>
<option value="fr.php"<?php echo $lang=="fr.php"?"selected":"";?>>法文</option>
<input type="submit" value="change language">  
</form> 
<?php
	include $lang;
?>

