<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("icollege", $db);
	$_POST['password1'] = sha1($_POST['password1']);
	$_POST['password2'] = sha1($_POST['password2']);
	if($_POST['password1'] != $_POST['password2'])
		echo "���벻һ��";
	else
		$sqlsent = "insert into usrs values('$_POST[username]','$_POST[password1]','$_POST[realname]', '$_POST[sex]','$_POST[birthday]','$_POST[college]','$_POST[mailbox]')";
		$result = mysql_query($sqlsent,$db);
if($result == true)
echo<<<HTML
<script>
alert('ע��ɹ�');
	setTimeout(function(){
		window.parent.document.location.href="login.html";
	},1000);
</script>
HTML;
else
echo<<<HTML
<script>
	alert('ע��ʧ��');
	setTimeout(function(){
		window.parent.document.location.href="register.html";
	},1000);
</script>
HTML;
mysql_close($db);
?>