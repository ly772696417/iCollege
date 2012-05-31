<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("icollege", $db);
	$sqlsent = "insert into itms values('$_POST[itemname]', '$_POST[subtitle]', '$_POST[image]', '$_POST[info]', '$_POST[profile]', '$_POST[xpos]', '$_POST[ypos]', '$_POST[classname]')";
	//$sqlsent = "select img from itms where itmnm='巫山烤全鱼'";
	if(mysql_query($sqlsent, $db)){
		echo 1;
	else
		echo 0;
	//$file = fopen("img.png", "w");
	//fwrite($file, $_POST['image']);
	//fclose($file['image']);
	//echo $_POST['image'];
	mysql_close($db);
?>