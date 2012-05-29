<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("icollege", $db);
	$sqlsent = "insert into cmmnts values('$_POST[itemname]', '$_POST[comment]', '$_POST[date]', '$_POST[username]')";
	if(mysql_query($sqlsent, $db))
		echo 1;
	else
		echo 0;
	mysql_close($db);
?>