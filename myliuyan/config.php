<?php
$db = "ddu";  //填写数据库名称
$user = "root";  //填写数据库用户名
$pws = "";   //填写数据库密码
$link= mysql_connect("localhost",$user,$pws);

mysql_select_db($db,$link) or die("数据库访问错误".mysql_error());

?>