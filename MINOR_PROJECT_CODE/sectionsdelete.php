<?php
require 'udb.php';
require 'ddb.php';
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="design.css">
	</head>

	
	<body>
	<?php
			if ($dse==False)
			{
				$_SESSION['message']='you don\'t have permission to delete';
				header("Location: error.php");
			}
			else{
			$val=$_GET['se_id'];
			$qwery="delete from sections where s_id='$val'";
			if ($con4->query($qwery) === TRUE) {
				if($_SESSION['aset']){								
					$res="section id ".$val." is deleted";
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
				}
				$_SESSION['message']="Delete Successful";
				header("location: success.php");
			} else {
				$_SESSION['message']="Delete unsuccessful";
				header("location: error.php");
			}
			}
	?>
	<br><a href="home.php">HOME</a>
	<br><a href="logout.php">LOGOUT</a>
	</body>
</html>