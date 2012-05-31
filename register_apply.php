<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("icollege", $db);
	$_POST['password'] = sha1($_POST['password']);
	$sqlsent = "insert into usrs values('$_POST[username]', '$_POST[password]', '$_POST[realname]', '$_POST[sex]',
										'$_POST[birthday]', '$_POST[college]', '$_POST[mailbox]')";
	if(mysql_query($sqlsent, $db))
		echo 1;
	else
		echo 0;
	mysql_close($db);
?>