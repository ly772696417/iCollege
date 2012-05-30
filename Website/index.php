<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
	<title>iCollege —— 我的大学</title>
	<link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>

<body background="images/bg3.jpg">

<center>
<div style="width:1000px;text-align:left;border:0px">
	<div class=topBar id=toplogo>
		<input type=button value="首页" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.location.reload()" style="margin-left:100px" class=topButtons>
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
	<div style="height:1000px;background:url(images/bg1000.png)">
		<div style="height:980px;width:960px;background-color:#FFF" id=midpic>
			<div style="height:310px;background:url(images/mainpic.png);"></div>
			<div style="height:316px;width:880px;background:url(images/main1.jpg);margin-left:40px;margin-top:30px"></div>
			
			<div style="height:240px;width:870px;margin-top:20px;margin-left:40px;border:5px solid #ddd">
			<div style="height:198px;width:828px;padding:20px;border:1px solid #aaa">
				
				<a href="register.html">iCollege 客户端正式完工喽！有ios设备的童鞋快去appstore上下载哦！</a><br><br>
				<a href="register.html">iCollege 网页正式完工喽！</a><br><br>
				<a href="register.html">赶快注册iCollege帐号哦！</a>
			</div></div>
		</div>
	</div>
</div>
</center>
</body>
</html>