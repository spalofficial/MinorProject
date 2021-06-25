<?php
require 'udb.php';
session_start();
require 'accesscheck.php';
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
	<script src="myscript.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="design.css">
	</head>
<body onload="startTime()">	
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
	<div class="article2" >
	<?php
			if ($_SESSION['aset']==True)
			{
				$_SESSION['message']='you have either used your delegation or you are logged in as a delegate. You are not allowed to delegate';
				header("Location: error.php");
			}
			else{
			$val=$_GET['name'];
			$qwery="select * from users where name='$val'";
			$res=$con->query($qwery);
			$r=$res->fetch_assoc();
			$dret=$r['rating'];
			$dlev=$r['levels'];
			$id=$r['user_id'];
			$qwery="select * from rating where rat='$dret'";
			$res=$con->query($qwery);
			$r=$res->fetch_assoc();
			$dlevs=$r['maxl'];
			$total=intval($dlevs)+intval($dlev);
			$x=($total*100)/18;
			if (intval($x) < 60)
			{
			$_SESSION['message']='Delegate has lower rating. Delegation not possible';
			header("Location: error.php");		
			}
			$sid=$_SESSION['user_id'];
			$slev=$_SESSION['levels'];
			}
    ?>
	<div class="form">
		    <form action="dla.php" method="POST" style="top:20px;left:420px;">
			<fieldset>
			   <legend>DLA:</legend>
				USER_ID<br>
				<input class="input" type="text" name="user_id" value=<?php echo $id ?> readonly="readonly" required><br>
				SOURCE_ID<br>
				<input class="input" type="text" name="source_id" value=<?php echo $sid ?> readonly="readonly" required><br>
				LEVEL_ADDED<br>
				<select class="input" name="level_added" type="number" required><br>
					<?php
					for($i=1;$i<=$slev-1;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				<br>DATES<br>
				<input class="input" type="date" name="dates" required><br>
				START_TIME:<br>
				STARTHOURS
				<select class="input" name="starthours" type="number" required><br>
					<?php
					for($i=0;$i<=24;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				STARTMINUTES
				<select class="input" name="startminutes" type="number" required><br>
					<?php
					for($i=0;$i<=60;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				STARTSECONDS
				<select class="input" name="startseconds" type="number" required><br>
					<?php
					for($i=0;$i<=60;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				<br>END_TIME:<br>
				ENDHOURS
				<select class="input" name="endhours" type="number" required><br>
					<?php
					for($i=0;$i<=24;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				ENDMINUTES
				<select class="input" name="endminutes" type="number" required><br>
					<?php
					for($i=0;$i<=60;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				ENDSECONDS
				<select class="input" name="endseconds" type="number" required><br>
					<?php
					for($i=0;$i<=60;$i++)
						echo"<option value='$i'>$i</option>";
					?>
				</select>
				
				<?php
				$s1=$_SESSION['levels'];	
				if($s1>="6"){
				echo'
				<br>ENTRY_PERMISSION
				<select class="input" name="user_entry" type="number" required><br>
					<option value="1">True</option>
				    <option value="0">False</option>
				</select>
				<br>DELETE_PERMISSION
				<select class="input" name="del" type="number" required><br>
					<option value="1">True</option>
				    <option value="0">False</option>
				</select>
				<br>EDIT_PERMISSION
				<select class="input" name="edits" type="number" required><br>
					<option value="1">True</option>
				    <option value="0">False</option>
				</select>
				';
				}?>
				
				<br><br><button class="input" type="submit" name="submit">submit</button><br>
			</fieldset>
			</form>
	</div>
	</div>
	<div class="footer">
				<p>&copy Copyright 2017-2018 by Souvik Pal, Biswadeb Mukherjee, Pallab Kisor Bera<br>Project under guidance of Prof. Subhra Paramanik<br> Computer Application Center, Heritage Institute Of Technology
				</p>
	</div>
	</div>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['submit'])){
	$s1=$_POST['user_id'];
	$s2=$_POST['source_id'];
	$s3=$_POST['level_added'];
	$s4=$_POST['dates'];
	$s5=$_POST['starthours'];
	$s6=$_POST['startminutes'];
	$s7=$_POST['startseconds'];
	$s8=$_POST['endhours'];
	$s9=$_POST['endminutes'];
	$s10=$_POST['endseconds'];
	$s11=$_POST['user_entry'];
	$s12=$_POST['del'];
	$s13=$_POST['edits'];
	$ss3=-$s3;
	$starttime=$s5*3600 + $s6*60 + $s7;
	$endtime=$s8*3600 + $s9*60 + $s10;	 
	$sql="insert into levels values('$s1','$s3','$s4', '$starttime', '$endtime', '$s2', '$s11', '$s12', '$s13')"; 
	$sql2="insert into levels values('$s2','$ss3','$s4', '$starttime', '$endtime', '', '1', '1', '1')"; 
	if ($con->query($sql) === TRUE && $con->query($sql2) === TRUE) {
	$_SESSION['message']="Insertion Successful";
	header("location: success.php");
	} else {
	$_SESSION['message']="Insertion unsuccessful";
	header("location: error.php");
	}
	}
	}
    ?>
	</body>
</html>