<?php
require 'tdb.php';
require 'udb.php';
session_start();

require 'accesscheck.php';

if ($it==False)
{
	$_SESSION['message']='you don\'t have permission to insert';
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
	$s1=$_POST['teacher_id'];
	$s2=$_POST['name'];
	$s3=$_POST['address'];
	$s4=$_POST['ph_number'];
	$s5=$_POST['email_id'];
	$c=$_SESSION["levels"];
	$sql="insert into teacher values('$s1','$s2','$s3','$s4','$s5','$c')"; 
	if ($con3->query($sql) === TRUE) {
		if($_SESSION['aset']){								
					$res="teacher id ".$s1." is inserted";
					$a=$_SESSION["user_id"];
					$b=$_SESSION["source_id"];
					$d=$_SESSION["dates"];
					$e=$_SESSION["starttime"];
					$f=$_SESSION["endtime"];
					date_default_timezone_set('Asia/Calcutta');
					$oo=date("h:m:sa");
					$x="insert into checkdetails values('$a','$b','$c','$d','$e','$f','$oo','$res')";				
					$con->query($x);
				}
		    $qwery="update id_generator set val=val+1 where id='t'";
			$res=$con->query($qwery);
	$_SESSION['message']="Insertion Successful";
	header("location: success.php");
	} else {
	$_SESSION['message']="Insertion unsuccessful";
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
		<?php
			$qwery="select * from id_generator where id='t'";
			$res=$con->query($qwery);
			$r=$res->fetch_assoc();
			$id=$r['id'].$r['val'];
        ?>
		<div class="form">
		   <form action="teacherinsert.php" method="POST" style="top:60px;left:550px;">
		     <fieldset>
			   <legend>TEACHER_INSERT:</legend>
				TEACHER_ID<br>
				<input class="input" type="text" name="teacher_id" value=<?php echo $id ?> readonly="readonly" required><br>
				NAME<br>
				<input class="input" type="text" name="name"  required><br>
				ADDRESS<br>
				<input class="input" type="text" name="address" required><br>
				PHONE_NO<br>
				<input class="input" type="number" name="ph_number"  required><br>
				EMAIL_ID<br>
				<input class="input" type="text" name="email_id" required><br>
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