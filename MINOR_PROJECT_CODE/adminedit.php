<?php
require 'adb.php';
require 'udb.php';
session_start();
require 'accesscheck.php';
if ($ea==False)
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
	$s1=$_POST['a_id'];
	$s2=$_POST['a_name'];
	$s3=$_POST['contact_no'];
	$sql="update admins
	set a_name='$s2', contact_no='$s3' where a_id='$s1'"; 
	if ($con5->query($sql) === TRUE) {
		if($_SESSION['aset']){								
					$res="admin_id ".$s1." is edited";
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
					$ppp="admin id : ".$s1." | admin name : ".$s2." | contact number :". $s3;
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
			$val=$_GET['a_id'];
			$qwery="select * from admins where a_id='$val'";
			$res=$con5->query($qwery);
			$r=$res->fetch_assoc();
			//
			$_SESSION["h"]="admin id : ".$r['a_id']." | admin name : ".$r['a_name']." | contact number :". $r['contact_no'];
            //
        ?>
		    <form action="adminedit.php" method="POST" style="top:60px;left:550px;">
			<fieldset>
			   <legend>ADMIN_EDIT:</legend>
				ADMIN_ID<br>
				<input class="input" type="text" name="a_id" value="<?php echo $r["a_id"]?>" readonly="readonly" required><br>
				ADMIN_NAME<br>
				<input class="input" type="text" name="a_name" value="<?php echo $r["a_name"]?>" required><br>
				CONTACT_NUMNER<br>
				<input class="input" type="number" name="contact_no" value="<?php echo $r["contact_no"]?>" required><br>
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