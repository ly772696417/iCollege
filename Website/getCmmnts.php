<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("icollege", $db);
	$sqlsent = "select * from cmmnts where itmnm='$_POST[itemname]'";
	$recieved = mysql_query($sqlsent, $db);
	$return = null;
	//echo $_POST['username'];
	if(!mysql_num_rows($recieved))
	{
		echo 0;
		return;
	}
	while($line = mysql_fetch_array($recieved))
	{
		$return .= $line['usrnm'] . '%44' . $line['cmmnt'] . '%44' . $line['jdgtm'] . '%38';
	}
	$return = substr($return, 0, -3);
	echo $return;
	mysql_close($db);
?>