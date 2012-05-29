<?php
session_start();

date_Default_TimeZone_set("PRC");
error_reporting(E_ALL & ~E_NOTICE);

require_once("config.php");
require_once("fun.php");


$title = $_POST['title'];
$subtitle=$_POST['subtitle'];
$profile=$_POST['profile'];
$info=$_POST['info'];

$page = $_GET['page'];
$username=$_SESSION['username'];
$itemname=$_GET['itemname'];
//插入数据库
if($title)
{
	$time = time();
	$judtm=date( "Y-m-d H:i:s");
	$sql = "insert into itms values('$title','$subtitle','','$info','$profile',8,8,'10','$username')";
	
	mysql_query("SET NAMES 'utf-8'"); 
 	$rs = mysql_query($sql);
	
	if($rs)
	{
echo<<<HTML
	<script>
	alert('编辑成功');
	setTimeout(function(){
		window.parent.document.location.href="classes.php";
	},1000);
	</script>
HTML;
	}
} 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
	<title><?php echo $itemname?></title>
	<link href="css/index.css" rel="stylesheet" type="text/css"/>
	
	<style type="text/css">
.STYLE1 {
	font-size: 18px;
	font-weight: bold;
}
</style>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAWA_efwiQDHrv6MYDa3HE3hTwM0brOpm-All5BF6PoaKBxRWWERSSjUV6DjLhSErRl9rovZBNtOhNfA "
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(39.95, 116.345), 13);
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
		
		
		var center = new GLatLng(39.95, 116.345);
		var marker = new GMarker(center, {draggable: true});

		GEvent.addListener(marker, "dragstart", function() {
		map.closeInfoWindow();
		});

		GEvent.addListener(marker, "dragend", function() {
		marker.openInfoWindowHtml("请把我放到我的位置上");
		});

		
		map.addOverlay(marker);
      }
    }

    </script>

<script language="javascript" type="text/javascript">
function dosubmit()
{
	
	 if(document.form1.title.value =='')
	 {
	  alert("标题不能为空");
	  document.form1.title.focus();
	   return false;
	 }
	 
	  if(document.form1.subtitle.value =='')
	 {
	  alert("副标题不能为空");
	  document.form1.subtitle.focus();
	   return false;
	 }
	 
	  if(document.form1.profile.value =='')
	 {
	  alert("概要不能为空");
	  document.form1.profile.focus();
	   return false;
	 }
	 
	  if(document.form1.info.value =='')
	 {
	  alert("确切信息不能为空");
	  document.form1.info.focus();
	   return false;
	 }

	 return true;
	 
}
</script>
</head>

<body onload="load()" onunload="GUnload()" background="images/bg3.jpg">

<center>
<div style="width:1000px;height:2000px;text-align:left;border:0px">
	<div class=topBar id=toplogo>
	
		<input type=button value="首页" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.open('homepage.php')" style="margin-left:100px" class=topButtons>
		<input type=button value="周边信息" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.open('classes.php')" class=topButtons>
		<input type=button value="关于我们" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.open('aboutus.php')" class=topButtons>
		<a href="register.html" style="margin-left:200px;margin-top:0px;color:#fff"class="topButtons" >注册</a>
		<big style="margin-left:5px" class=topButtons>|</big>
		<a href="login.html" style="margin-left:5px;margin-top:0px;color:#fff" class="topButtons" >登录</a>
		
	</div>
	
	<div style="height:2000px;background:url(images/bgshadow.png)">
		<div style="height:1980px;width:960px;background-color:#fff" id="midpic">
			<div style="height:310px;background:url(images/mainpic.png);"></div>
			<center>
			
			
			<form action='' method='post' id="form1" name="form1" onsubmit="return dosubmit();">
			<table width="800" border="0" align="center" cellspacing="1" bgcolor="#eee">
			<tr>
				<td height="25" colspan="2" align="left" bgcolor="#ddd">&nbsp;编辑词条</td>
			</tr>
			<tr>
				<td height="25" align="center" bgcolor="#FFFFFF">词条标题</td>
				<td bgcolor="#FFFFFF"><textarea name="title" cols="55" rows="2"></textarea>      
				&nbsp;*</td>
			</tr>
			<tr>
				<td height="25" align="center" bgcolor="#FFFFFF">词条副标题</td>
				<td bgcolor="#FFFFFF"><textarea name="subtitle" cols="55" rows="2"></textarea>      
				&nbsp;*</td>
			</tr>
			<tr>
				<td height="25" align="center" bgcolor="#FFFFFF">词条概要</td>
				<td bgcolor="#FFFFFF"><textarea name="profile" cols="55" rows="8"></textarea>      
				&nbsp;*</td>
			</tr>
			<tr>
				<td height="25" align="center" bgcolor="#FFFFFF">词条确切信息</td>
				<td bgcolor="#FFFFFF"><textarea name="info" cols="55" rows="8"></textarea>      
				&nbsp;*</td>
			</tr>
			
			<tr>
				<td height="25" align="center" bgcolor="#FFFFFF">上传图片</td>
　 <!--点此按钮将在下面的表格中动态添加和删除文件框-->
     　        <td><input name="button" type="button" onClick="insertElement()" value="增加图片">
       <!---->  
				</tr>
			<tr>
			</tr>

				<td>
                  <!--用于放置动态生成的文件框的表格-->
                  <table id="filetable" border="0" cellpadding="0" cellspacing="0">
                  </table>
                  <!--用于放置动态生成的文件框的表格-->
				</td>
			</td>
			
			<tr>
				<td height="25" align="center" bgcolor="#FFFFFF">指出位置</td>
				<td style="width: 360px; height: 500px">
				<div id="map" style="width: 560px; height: 500px"></div>
				<input type="text" name="xp" />
				<input type="text" name="yp" />
				</td>
			</tr>
			
			<tr>
				<td height="35" colspan="2" align="center" bgcolor="#eee">
					<small></small>
					<input type="submit" name="Submit" id="button" value="提交"  style="height:50px;width:100px;margin-left:200px" />&nbsp;&nbsp;
					<input type="reset" name="Submit2" value="重置" style="height:50px;width:100px;margin-left:0px"/>
				</td>
			</tr>
			</table>
			
			
		</form>
		<br />
			
			<script language="javascript">
<!--动态添加文件浏览框函数-->
function insertElement() 
    {
          //找到放置动态生成的文件框的表格 
          var otablefile = document.getElementById("filetable");
          //添加一个新行
          var otr = otablefile.insertRow(0);
          //在新行中添加一个单元格，单元格中包含一个文件浏览框和一个删除按钮
         otr.insertCell(0).innerHTML = "<input type=file name=userfile[] size=60><input type=button      value='删除' onclick='deltr(this);'>";     
    }
<!--删除动态增加的文件框-->  
function deltr(obj)
{
//删除当前所在的行
obj.parentElement.parentElement.removeNode(true);

}  
</script>
			
		</div>
	</div>
</div>
</center>
</body>
</html>