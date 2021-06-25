<?php
require 'udb.php';
session_start();
?>
<!Doctype html>
<html>
	<head>
	<title>DDMS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="myscript.js"></script>
	<link rel="stylesheet" type="text/css" href="design.css">
	</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['login'])){
	require 'login.php';
}
}
?>
	<body onload="startTime()">	
	<div class="grid">
		<div class="title">
                   <br><div id="txt" ></div>
                </div>
		<div class="header">
			<h2>STUDENT ADMISSION COMMITEE<i>(A project illustration on security aspects in DDMS)</i></h2> 
		</div>
		<div class="status"></div>
		<div class="sidebar" >
		<br><img src="bye.gif"  width=200px height=200px></a><br><br><br><br>
		<a href="aboutus.php" ><img src="aboutus5.gif"  width=200px height=100px></a>
		</div>
		<div class="article2" >
			<div class="form">
			<form action="index.php" method="POST"">
			 <fieldset>
			   <legend>SIGN IN:</legend>
				USERNAME<br>
				<input class="input" type="text" name="username" required><br>
				PASSWORD<br>
				<input class="input" type="password" name="password" required><br>
				<button class="input" type="submit" name="login">Login</button><br>
				</fieldset>
			</form>
			</div>
		</div>
		<div class="footer">
				<p>&copy Copyright 2017-2018 by Souvik Pal, Biswadeb Mukherjee, Pallab Kisor Bera<br>Project under guidance of Prof. Subhra Paramanik<br> Computer Application Center, Heritage Institute Of Technology
				</p>
		</div>
	</div>
	<body>
</html>	