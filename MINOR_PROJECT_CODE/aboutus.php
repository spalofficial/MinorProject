<?php
require 'udb.php';
session_start();
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
                <br><div id="txt" ></div></div>
		<div class="header">
			<h2>STUDENT ADMISSION COMMITEE<i>(A project illustration on security aspects in DDMS)</i></h2> 
		</div>
		<div class="status"></div>
		<div class="sidebar" >
		<br><img src="bye.gif"  width=200px height=200px></a><br><br><br>
		<a href="index.php" ><img src="logg.gif"  width=200px height=200px></a>
		<br>LOGIN
		</div>
		<div class="article2" style="overflow-y:auto;">
			<img  src="mam.jpg" width=200px height=200px ><br>Prof. Subhra Paramanik (MENTOR)<br><hr>TEAM MEMBERS<br>
			<img  src="souvik.jpg" width=200px height=200px><br>Souvik Pal <br>
			<img  src="biswadeb.jpg" width=200px height=200px><br>Biswadeb Mukherjee<br>
			<img  src="a.jpg" width=200px height=200px><br>Pallab Kishore Bera<br>
		</div>
		<div class="footer">
				<p>&copy Copyright 2017-2018 by Souvik Pal, Biswadeb Mukherjee, Pallab Kishore Bera<br>Project under guidance of Prof. Subhra Paramanik<br> Computer Application Center, Heritage Institute Of Technology
				</p>
		</div>
	</div> 
	<body>
</html>