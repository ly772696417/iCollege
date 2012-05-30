<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
	<title>iCollege —— 我的大学</title>
	<link href="css/index.css" rel="stylesheet" type="text/css"/>
	<style>
	</style>
</head>

<body background="images/bg3.jpg">

<center>
<div style="width:1000px;text-align:left;border:0px">
	<div class=topBar id=toplogo>
		<input type=button value="首页" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="document.location.href='index.php'" style="margin-left:100px" class="topButtons">
		<input type=button value="周边信息" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="document.location.href='classes.php'" class="topButtons">
		<input type=button value="关于我们" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#777'" onclick="window.open('aboutus.php')" class="topButtons">
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
		<div style="height:980px;width:960px;background-color:#FFF" id="midpic">
			<div style="height:310px;background:url(images/mainpic.png);"></div>
			
			<div style="height:540px;width:870px;margin-top:20px;margin-left:40px;border:10px solid #f39227">
			<div style="height:496px;width:826px;padding:20px;border-top:2px solid #ccc;border-left:2px solid #ccc">
			<center>
				<big>关于我们</big><br><br><hr><br>
				项目名称：iCollege <br>小组名称：Tech-5<br>小组成员：赵轶凡 李垚 杜艺卓<br>完成时间：2012.5.28
			</center>
			</div></div>
		</div>
	</div>
</div>
</center>
</body>
</html>