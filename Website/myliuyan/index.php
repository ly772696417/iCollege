﻿

<?php
session_start();
date_Default_TimeZone_set("PRC");
error_reporting(E_ALL & ~E_NOTICE);

require_once("config.php");
require_once("fun.php");


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<link id="MainCss" type="text/css" rel="stylesheet" href="./css/css.css"/>
<title>我的留言</title>
<style type="text/css">
.STYLE1 {
	font-size: 18px;
	font-weight: bold;
}
</style>
</head>

<body background="images/bg.jpg">
<table width="800" border="0" align="center" cellspacing="1" bgcolor="#DDE4F4" onsubmit="return dosubmit();">
  <tr>
    <td height="50" colspan="2" align="center" bgcolor="#CCCFEC"><span class="STYLE1">我的留言</span></td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#EDEEF8">&nbsp;留言列表</td>
  </tr>

  <?php
  
  session_start();
  $name=$_SESSION['user'];
  if($name!="")
  {
	$sql = "call myliuyan('".$name."')";
  }
  	mysql_query("SET NAMES 'utf-8'"); 
  $rs = mysql_query($sql);

  if($rs)
  {
  while($rows = mysql_fetch_object($rs))
  {
  ?>


  <tr>
    <td width="167" height="25" bgcolor="#FFFFFF">
      <table width="100%" height="100%" border="0">
        <tr>
          <td align="center"><img src="images/<?=$rows->touxiang?>.gif"   border="0" /></td>
        </tr>
        <tr>
          <td align="center"><?=$rows->nicheng?></td>
        </tr>
      </table>
    </td>

    <td width="726" height="25" valign="middle" bgcolor="#FFFFFF">
       <table width="100%" border="0" cellspacing="1" bgcolor="#EAEAEA">
		  <tr>
			<td height="30" bgcolor="#FFFFFF">&nbsp;时间：<?php echo date( "Y-m-d H:i:s",$rows->time);  ?>&nbsp;&nbsp;主题：<?=$rows->biaoti?></td>
		  </tr>
		  <tr>
			<td height="30" bgcolor="#FFFFFF">&nbsp;<?=$rows->neirong?></td>
		  </tr>		 
       </table>
	</td>
  </tr>


  <?php
  }}
  ?>

  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#EDEEF8">
	</td>
  </tr>
</table>
<br />

<br />

</body>
</html>
