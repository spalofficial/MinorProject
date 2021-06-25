<?php
require 'udb.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in before accessing the page!";
	header("location: error.php");    
}
$t=time();
if($_SESSION['t'] && $t-$_SESSION['t']>300){
	$_SESSION['message']="Maximum time of inactivity reached";
	header("location: error.php");
 }
 else{
	$_SESSION['t']=time();
	date_default_timezone_set('Asia/Calcutta');
	$v=intval(date("H"))*3600+intval(date("i"))*60+intval(date("s"));
	if ($v> $_SESSION['endtime']){
		$_SESSION['message']="Allocated login time over!";
		header("location: error.php");
    }
}
?>
<!Doctype html>
<html>
	<head>
	<title>DDMS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="design.css">
	</head>
	<body>
	<div class="grid">
		<div class="title"></div>
		<div class="header">
			<h2>STUDENT ADMISSION COMMITEE<i>(A project illustration on security aspects in DDMS)</i></h2> 
	</div>
	<div class="status">
			<p>
			<a href="logout.php"><img align="right" src="logout.png"  width=40px height=40px></a>
			<a href="home.php"><img align="right" src="home.png"  width=40px height=40px></a>
			</p>
	</div>
	<div class="sidebar" >
	    <?php
		require 'accesscheck.php';
		if ( $rm==True)
		echo "<br><a href='home.php?click=true&marks=true'>MARKS</a><br>";
		if ( $rs==True)
		echo "<a href='home.php?click=true&student=true'>STUDENT</a><br>";
		if ( $rt==True)
		echo "<a href='home.php?click=true&teacher=true'>TEACHER</a><br>";
     	if ( $rd==True)
		echo "<a href='home.php?click=true&department=true'>DEPARTMENT</a><br>";
		if ( $rc==True)
		echo "<a href='home.php?click=true&course=true'>COURSE</a><br>";
		if ( $rse==True)
		echo "<a href='home.php?click=true&sections=true'>SECTION</a><br>";
		if ( $re==True)
		echo "<a href='home.php?click=true&examination=true'>EXAMINATION</a><br>";
		if ( $ra==True)
		echo "<a href='home.php?click=true&administraion=true'>ADMINISTRATION</a><br>";
		echo "<a href='home.php?click=true&users=true'>USERS</a><br>";
		echo "<a href='home.php?click=true&levels=true'>CHECK_LEVEL_ADDED</a><br>";
		?>
		</div>
	<div class="article2">
	<div align="center" style="overflow-x:auto;">
		<br><p><b>Details of changes made</b></p><br>
		<?php
			$c1=$_GET['user_id'];
			$c2=$_GET['source_id'];
			$c3=$_GET['cm'];
			$c4=$_GET['at'];
			$c5=$_GET['d'];
			$w="edited";
			$qwery="select name from users where user_id='$c1'";
			$res=$con->query($qwery);
			$row=$res->fetch_assoc();
			$c6=$row['name'];
			$pos = strpos($c3,$w);
            if ($pos === false) {
            echo "$c3 by $c6 on $c5 at $c4";
			}
			else{
		   	echo "$c3 by $c6 on $c5 at $c4";
			$qwery="select a,b from changedetails where user_id='$c1' and source_id='$c2' and dates='$c5' and act_time='$c4'";
			$res=$con->query($qwery);
			$row=$res->fetch_assoc();
			$after=$row['a'];
			$before=$row['b'];	
			echo "<h3>Before</h3><br> $before";
			
			echo "<h3>After</h3><br> $after";
			}			
        ?>
	</div>
	</div>
	<div class="footer">
				<p>&copy Copyright 2017-2018 by Souvik Pal, Biswadeb Mukherjee, Pallab Kisor Bera<br>Project under guidance of Prof. Subhra Paramanik<br> Computer Application Center, Heritage Institute Of Technology
				</p>
	</div>
	</div>
	</body>
</html>