<?php
require 'udb.php';
require 'mdb.php';
session_start();
require 'accesscheck.php';
if ($em==False)
{
	$_SESSION['message']='you don\'t have permission to edit';
	header("Location: error.php");
}
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
	<script src="myscript.js"></script>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="design.css">
	</head>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['submit'])){
	$s1=$_POST['marks_id'];
	$s2=$_POST['student_id'];
	$s3=$_POST['tenth'];
	$s4=$_POST['twelfth'];
	$s5=$_POST['ug'];
	$s6=$_POST['comments'];
	$sql="update marks
	set tenth='$s3', twelfth='$s4', ug='$s5', comments='$s6' where marks_id='$s1'"; 
	if ($con1->query($sql) === TRUE) {
		if($_SESSION['aset']){								
					$res="marks id ".$s1." is edited";
					$a=$_SESSION["user_id"];
					$b=$_SESSION["source_id"];
					$c=$_SESSION["levels"];
					$d=$_SESSION["dates"];
					$e=$_SESSION["starttime"];
					$f=$_SESSION["endtime"];
					date_default_timezone_set('Asia/Calcutta');
					$oo=date("h:m:sa");
					$x="insert into checkdetails values('$a','$b','$c','$d','$e','$f','$oo','$res')";				
					$con->query($x);
					//
					$pp=$_SESSION["h"];
					$ppp="marks id : ".$s1." | student id : ".$s2." | tenth :". $s3." | twelfth :". $s4." | ug :". $s5." | comments :". $s6;
					$y="insert into changedetails values('$a','$b','$d','$oo','$pp','$ppp')";	
					$con->query($y);
					//
				}
	$_SESSION['message']="Edit Successful";
	header("location: success.php");
	} else {
	$_SESSION['message']="Edit unsuccessful";
	header("location: error.php");
	}
	}
	}
    ?>
	<body onload="startTime()">	
	<div class="grid">
		<div class="title">
    <br><div id="txt"></div></div>
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
		<div class="form">
		<?php
			$val=$_GET['marks_id'];
			$qwery="select * from marks where marks_id='$val'";
			$res=$con1->query($qwery);
			$r=$res->fetch_assoc();
			//
			$_SESSION["h"]="marks id : ".$r['marks_id']." | student id : ".$r['student_id']." | tenth :". $r['tenth']." | twelfth :". $r['twelfth']." | ug :". $r['ug']." | comments :". $r['comments'];
            //
        ?>
		    <form action="marksedit.php" method="POST" style="top:60px;left:550px;">
			<fieldset>
			   <legend>MARKS_EDIT:</legend>
				MARKS_ID<br>
				<input class="input" type="text" name="marks_id" value="<?php echo $r["marks_id"]?>" readonly="readonly" required><br>
				STUDENT_ID<br>
				<input class="input" type="text" name="student_id" value="<?php echo $r["student_id"]?>" readonly="readonly" required><br>
				TENTH<br>
				<input class="input" type="number" name="tenth" value="<?php echo $r["tenth"]?>" required><br>
				TWELFTH<br>
				<input class="input" type="number" name="twelfth" value="<?php echo $r["twelfth"]?>" required><br>
				UG<br>
				<input class="input" type="number" name="ug" value="<?php echo $r["ug"]?>" required><br>
				COMMENTS<br>
				<input class="input" type="text" name="comments" value="<?php echo $r["comments"]?>" required><br>
				<button class="input" type="submit" name="submit">submit</button><br>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="footer">
				<p>&copy Copyright 2017-2018 by Souvik Pal, Biswadeb Mukherjee, Pallab Kisor Bera<br>Project under guidance of Prof. Subhra Paramanik<br> Computer Application Center, Heritage Institute Of Technology
				</p>
	</div>
	</div>
	</body>
</html>