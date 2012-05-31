<?php

date_Default_TimeZone_set("PRC");
error_reporting(E_ALL & ~E_NOTICE);

require_once("config.php");
require_once("fun.php");

$page = $_GET['page'];

$classname=$_GET['classname'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<link id="MainCss" type="text/css" rel="stylesheet" href="./css/css.css"/>
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<title><?php echo $classname ?></title>
<style type="text/css">
.STYLE1 {
	font-size: 18px;
	font-weight: bold;
}

</style>

<script language="javascript" type="text/javascript">
function dosubmit()
{
	 if(document.form1.biaoti.value =='')
	 {
	   alert("标题不能为空");
	   document.form1.biaoti.focus();
	   
	  return false;
	 }
	 
	
	 if(document.form1.neirong.value =='')
	 {
	  alert("内容不能为空");
	  document.form1.neirong.focus();
	   return false;
	 }

	 return true;
}
</script>
</head>

<body background="images/bg3.jpg">
<center>
<div style="width:1000px;text-align:left;border:0px">
	<div class=topBar id=toplogo>
		<input type=button value="首页" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.location.href='index.php'" style="margin-left:100px" class=topButtons>
		<input type=button value="周边信息" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.location.href='classes.php'" class=topButtons>
		<input type=button value="关于我们" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.open('aboutus.php')" class=topButtons>
		<?php
			if(isset($_SESSION['username']))
				echo<<<EOF
					<a href='profile.php' style='margin-left:130px;margin-top:0px;color:#fff'class='topButtons'>{$_SESSION['username']}</a>
					<big style='margin-left:5px' class=topButtons>|</big>
					<a href='logout.php' style='margin-left:5px;margin-top:0px;color:#fff' class='topButtons' >Log out</a>
EOF;
			else
				echo<<<EOF
					<a href='register.html' style='margin-left:200px;margin-top:0px;color:#fff'class='topButtons'>注册</a>
					<big style='margin-left:5px' class=topButtons>|</big>
					<a href='login.html' style='margin-left:5px;margin-top:0px;color:#fff' class='topButtons' >登录</a>
EOF;
		?>
	</div>
	<div style="height:2000px;background:url(images/bgshadow.png)">
	<center>
		<div style="height:1980px;width:960px;background-color:#fff" id=midpic>
			<div style="height:310px;background:url(images/mainpic.png);"></div>
			<div style="height:90px;width:894px;margin:10px;background-color:#888">
			<big style="font-size:66;font-family:'微软雅黑';color:#fff"><?php echo $classname ?></big>
			</div>
			

<table width="900" border="0" align="center" cellspacing="20"  onsubmit="return dosubmit();" style="word-break:break-word"> 
<div style="height:40px;width:900px;background-color:#f39227">
<a style="font-size:26;font-family:'微软雅黑';color:#fff"  href="userEdit.php?classname=<?php echo $classname;?>">添加词条</a>
</div>
  <?php
  //留言列表
  
  $sql = "select * from itms where clssnm='".$classname."' order by itmnm";
	 mysql_query("SET NAMES 'utf-8'"); 
  $rs = mysql_query($sql);
  
  if($rs)
  {
	  $num = mysql_num_rows($rs);
  }

  $page_size = 12; //每页显示留言数目

  $sql = "select * from itms where clssnm='".$classname."' order by itmnm".get_limit($page_size);
  	mysql_query("SET NAMES 'utf-8'"); 
  $rs = mysql_query($sql);

  if($rs)
  {
  $i=0;
  while($rows = mysql_fetch_object($rs))
  {
  if($i%3!=0){
  ?>

	
  <td >
    <td width="260" height="100" bgcolor="#FFFFFF">
     <table width="100%" height="100%"  style="border:5px solid #ccc;background-color:#eee">
	
		  <tr bgcolor="#fff">
			<td height="80"  style="color:#111">
			<center>
			<big style="font-size:30;font-family:'微软雅黑';color:#333;background-color:#fff"><?php echo $rows->itmnm; ?> </big><br>
			<big style="font-size:16;font-family:'微软雅黑';color:#888;background-color:#fff"><?php echo $rows->sbttl; ?></big>
			</center>
			</td>
		  </tr>		
	
        <tr>
          <td align="center">
			<a href="itemsInfo.php?itemname=<?php echo $rows->itmnm; ?>">
				<img src="images/itemimg/<?php echo $rows->img?>.png"  /></td>
			</a>
		  </td>
        </tr>
		
      </table>
    </td>



<?php 
}
else{
 ?>
 
 <tr>
    <td width="260" height="100" bgcolor="#FFFFFF">
    <table width="100%" height="100%"  style="border:5px solid #ccc;background-color:#eee">
	
		  <tr bgcolor="#fff">
			<td height="80"  style="color:#111">
			<center>
			<big style="font-size:30;font-family:'微软雅黑';color:#333;background-color:#fff"><?php echo $rows->itmnm; ?> </big><br>
			<big style="font-size:16;font-family:'微软雅黑';color:#888;background-color:#fff"><?php echo $rows->sbttl; ?></big>
			</center>
			</td>
		  </tr>		
	
        <tr>
          <td align="center">
			<a href="itemsInfo.php?itemname=<?php echo $rows->itmnm; ?>">
				<img src="images/itemimg/<?php echo $rows->img?>.png"  /></td>
			</a>
		  </td>
        </tr>
		
      </table>
    </td>


 
  <?php
  }
  $i++;
  }}
  ?>
</tr>
  <tr>
    <td height="25" colspan="2" align="center"  bgcolor="#fff" ><?php echo				 get_page_list("items.php",$num,$page_size,5); ?>
	
	</td>
  </tr>
</table>
			
		</div>
	</div>
</div>




</body>
</html>
