<?php
session_start();

date_Default_TimeZone_set("PRC");
error_reporting(E_ALL & ~E_NOTICE);

require_once("config.php");
require_once("fun.php");

	$neirong = $_POST['neirong'];

	$page = $_GET['page'];
	$username=$_SESSION['username'];
	$itemname=$_GET['itemname'];

	
	//插入数据库
	if($neirong)
	{
		if(!isset($_SESSION['username']))
		{
			echo<<<HTML
		<script>
		alert('请先登录。');
		window.location.href='login.html'
		</script>
HTML;
	}
		$time = time();
		$judtm=date( "Y-m-d H:i:s");
		$sql = "insert into cmmnts values('$itemname','$neirong','$judtm','$username')";
	
		$rs = mysql_query($sql);
	
		if($rs)
		{
echo<<<HTML
	<script>
	alert('评论成功');
	setTimeout(function(){
		window.parent.document.location.href="itemsInfo.php?itemname=$itemname";
	},1000);
	</script>
HTML;
	}
} 


?>

<!DOCTYPE html>
<html>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJPNB7P9KeU033UCFHm8bLQ_gpqDkYiYc&sensor=true"
            type="text/javascript"></script>
<script type="text/javascript">

    function initialize() {
	var map;
		var options = {
			zoom: 14,
			center: new google.maps.LatLng(document.form1.yp.value, document.form1.xp.value),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scaleControl: true,
			mapTypeControl: true
		};
        var map = new google.maps.Map(document.getElementById("map"), options);
		
		var marker = new google.maps.Marker(
			{
				position: new google.maps.LatLng(document.form1.yp.value, document.form1.xp.value),
				map: map,
				title: 'It\'s here!'
			}
		);
		
		//icon.image = "http://labs.google.com/ridefinder/images/mm_20_red.png";
		//icon.shadow = "http://labs.google.com/ridefinder/images/mm_20_shadow.png";
		//icon.iconSize = new google.maps.Size(12, 20);
		//icon.shadowSize = new google.maps.Size(22, 20);
		//icon.iconAnchor = new google.maps.Point(6, 20);
		//icon.infoWindowAnchor = new google.maps.Point(5, 1);
		//var point = new google.maps.LatLng(39.95, 116.345);
		//map.addOverlay(new google.maps.Marker(point, icon));
    }

</script>

<script language="javascript" type="text/javascript">
function dosubmit()
{
	
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

<body background="images/bg3.jpg" onload="initialize()">

<center>
<div style="width:1000px;height:2000px;text-align:left;border:0px">
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
	
	<?php  $sql = "select * from itms where itmnm='$itemname' ";
  $rs = mysql_query($sql);

  if($rs)
  {
  while($rows = mysql_fetch_object($rs))
  {?>
	
	<div style="height:2000px;background:url(images/bgshadow.png)">
		<div style="height:1980px;width:960px;background-color:#FFF" id=midpic>
			<div style="height:310px;background:url(images/mainpic.png);"></div>
			
			
			<div style="height:40px;width:790px;margin-bottom:30px;margin-left:80px;padding-top:10px;background-color:#fff" >
			<big style="font-size:60;font-family:'微软雅黑';color:#333"><?php echo $itemname; ?> </big>
			<big style="font-size:20;font-family:'微软雅黑';color:#777">&nbsp;&nbsp;<?php echo $rows->sbttl; ?></big>
			</div>

			<center>
			<div style="height:340px;width:790px;margin-bottom:3px;margin-top:40px;background-color:#fff" >
			
				<div style="height:302px;width:362px;border:6px solid #fafafa;margin:2px;float:left">
				<div style="height:300px;width:360px;border:1px solid #ccc">
				<img style="height:300px;width:360px" src="images/itemimg/<?php echo $itemname?>.png"></img>
				</div ></div>
			
				<div style="height:302px;width:396px;border:6px solid #fafafa;margin:2px;float:right">
				<div style="height:300px;width:394px;border:1px solid #ccc">
				<div id="map" style="width: 394px; height: 300px"></div>
				</div></div>
			
			</div>
			</center>
			<big style="margin-left:90px;font-size:30;font-family:'微软雅黑';color:#333">概况</big>
			<big style="font-size:16;font-family:'微软雅黑';color:#777">&nbsp;词条信息概况</big>
			
			<big style="margin-left:200px;font-size:30;font-family:'微软雅黑';color:#333">信息</big>
			<big style="font-size:16;font-family:'微软雅黑';color:#777">&nbsp;&nbsp;&nbsp;&nbsp;词条的确切信息</big>
			
			<center>
			<div style="height:150px;width:790px;border:5px solid #ccc;margin:20px">
			<div style="height:148px;width:788px;border:1px solid #fff">
			
			<div style="text-align:left;overflow:auto;height:146px;width:366px;border:2px solid #fff;float:left;font-size:15;font-family:'微软雅黑';color:#333"><?php echo $rows->prfl?></div>
			<div style="text-align:left;overflow:auto;height:146px;width:374px;margin-left:40px;border:2px solid #fff;float:right;font-size:15;font-family:'微软雅黑';color:#333"><?php echo $rows->info?></div>
			
			</div></div>
			</center>
	<?php }}?>
	
<table width="800" style="border:5px solid #ddd" align="center" cellspacing="1" bgcolor="#ddd" onsubmit="return dosubmit();">
		
			<?php
  //留言列表
  
  $sql = "select * from cmmnts where itmnm='$itemname' order by jdgtm desc";
  $rs = mysql_query($sql);
  
  if($rs)
  {
	  $num = mysql_num_rows($rs);
  }

  $page_size = 15; //每页显示留言数目

  $sql = "select * from cmmnts where itmnm='$itemname' order by jdgtm desc".get_limit($page_size);
  $rs = mysql_query($sql);

  if($rs)
  {
  while($rows = mysql_fetch_object($rs))
  {
  ?>

 <tr>

    <td width="726" height="25" valign="middle" bgcolor="#FFFFFF">
       <table width="100%" border="0" cellspacing="1" bgcolor="#EAEAEA">
		  <tr>
			<td height="30" bgcolor="#FFFFFF" style="font-size:16;font-family:'微软雅黑';color:#333">
			<big style="margin-left:10px;font-size:24;font-family:'微软雅黑';color:#333"><?php echo $rows->usrnm;  ?></big>
			<big style="font-size:16;font-family:'微软雅黑';color:#777">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rows->jdgtm;  ?></big>
		  </tr>
		  
		  <tr>
			<td height="60" bgcolor="#FFFFFF" style="font-size:15;font-family:'微软雅黑';color:#222">&nbsp;<?=$rows->cmmnt?></td>
		  </tr>		 
       </table>
	</td>
</tr>
 
  <?php
  }}
  ?>

  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#eee"><?php echo				 get_page_list("itemsInfo.php",$num,$page_size,5); ?>
	</td>
  </tr>
</table>
<br />

<big style="margin-left:90px;font-size:30;font-family:'微软雅黑';color:#333">写点留言</big>
<form action='' method='post' id="form1" name="form1" onsubmit="return dosubmit();">
	<table width="800" style="border:5px solid #ddd" align="center" cellspacing="1" bgcolor="#FFF">
	  <tr>
		<td height="25" align="center" bgcolor="#FFFFFF" style="font-size:15;font-family:'微软雅黑';color:#333">留言内容</td>
		<td bgcolor="#FFFFFF"><textarea name="neirong" cols="95" rows="8"></textarea>      
		&nbsp;*</td>
	  </tr>
<?php  $sql = "select * from itms where itmnm='$itemname'";
  $rs = mysql_query($sql);

  if($rs)
  {
  while($rows = mysql_fetch_object($rs))
  {?>	 
	  <tr>
		<td height="45" colspan="2" align="center" bgcolor="#FFFFFF">
			<input type="submit" name="Submit" id="button" value="提交" style="height:40px;width:100px;background:url(images/button2.jpg)" />&nbsp;&nbsp;
			<input type="reset" name="Submit2" value="重置" style="height:40px;width:100px;background:url(images/button2.jpg);margin-left:50px"/>
			<input type="hidden" name="xp" id="lng" value="<?php echo $rows->xps?>"/>
			<input type="hidden" name="yp" id="lat" value="<?php echo $rows->yps?>"/>
		</td>
	  </tr>
	</table>
</form>
<br />
	<?php }}?>		
			
		</div>
	</div>
</div>
</center>
</body>
</html>