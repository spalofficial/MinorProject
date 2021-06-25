<?php
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You are not logged in";
  header("location: error.php");    
}
session_unset();
session_destroy(); 
?>
<!Doctype html>
<html>
	<head>
	<title>DDMS</title>
	<meta charset="utf-8">
	<script src="myscript.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="design.css">
	</head>
	<body onload="startTime()">	
	<div class="grid">
		<div class="title">
    <br><div id="txt"></div>
</div>
		<div class="header">
			<h2>STUDENT ADMISSION COMMITEE<i>(A project illustration on security aspects in DDMS)</i></h2> 
		</div>
		<div class="status">
			<p>
			<a href="logout.php"><img align="right" src="logout.png"  width=40px height=40px></a>
			</p>
	</div>
	<div class="sidebar" >
	<br><img src="bye.gif"  width=200px height=200px></a><br>
	</div>
	<div class="article2">
	<div class="form">
	    <p>You are logged out !</p>
		<p>Press the button below to login again</p>
	    <br><a href="index.php" ><img src="logg.gif"  width=200px height=200px></a>
    </div>
	</div>
	<div class="footer">
				<p>&copy Copyright 2017-2018 by Souvik Pal, Biswadeb Mukherjee, Pallab Kisor Bera<br>Project under guidance of Prof. Subhra Paramanik<br> Computer Application Center, Heritage Institute Of Technology
				</p>
	</div>
	</div>
	</body>
</html>	