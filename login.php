<?php
	session_start();
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("icollege", $db);
	$_POST['password'] = sha1($_POST['password']);
	$sqlsent = "select * from usrs where usrnm='$_POST[username]'";
	$result = mysql_query($sqlsent, $db);
	if($result == false)
		echo "Nothing.";
	$resp = mysql_fetch_array($result);
	if($_POST['password'] == $resp['psswrd']){
		$_SESSION['username']=$_POST['username'];
		echo<<<HTML
<script>
alert('µÇÂ¼³É¹¦');
	setTimeout(function(){
		window.parent.document.location.href="classes.php";
	},1000);
</script>
HTML;
	}
	else{
	echo<<<HTML
<script>
	alert('µÇÂ¼Ê§°Ü');
	setTimeout(function(){
		window.parent.document.location.href="register.html";
	},1000);
</script>
HTML;
	}
	mysql_close($db);
?>