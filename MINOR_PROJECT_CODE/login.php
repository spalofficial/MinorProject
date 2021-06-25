<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql1= "select * from users where user_id='$username'";
	$res1=$con->query($sql1);
	
    if ($res1->num_rows == 0){
		$_SESSION['message'] = "User with that username doesn't exist!";
		header("location: error.php");
	}
    else{	
	$r1 = $res1->fetch_assoc();
	
    if($password==$r1['password']){    
		$sql2= "select * from usertime where user_id='$username'";
		$res2=$con->query($sql2);
		date_default_timezone_set('Asia/Calcutta');
		$curr=date("Y-m-d");
		$sql3= "select * from levels where user_id='$username' and dates='$curr'";
		$res3=$con->query($sql3);
		if($res3->num_rows != 0){
			$r3 = $res3->fetch_assoc();
			date_default_timezone_set('Asia/Calcutta');
			$val=intval(date("H"))*3600+intval(date("i"))*60+intval(date("s"));
			if ($r3['dates']==date("Y-m-d")) {
				if ($val>$r3['starttime'] AND $val< $r3['endtime']){
					$_SESSION['user_id'] = $r1['user_id'];
					$_SESSION['source_id']=$r3['source_id'];
					$_SESSION['dates']=$r3['dates'];
					$_SESSION['levels'] = intval($r1['levels'])+ intval($r3['level_added']);
					$_SESSION['endtime'] = $r3['endtime'];
					$_SESSION['starttime'] = $r3['starttime'];
					$_SESSION['logged_in'] = true;
					$_SESSION['t']=time();
					$_SESSION['aset'] = true;
					$_SESSION['e'] = $r3['edits'];
					$_SESSION['d'] = $r3['del'];
					$_SESSION['i'] = $r3['user_entry'];
					$_SESSION['oldlevel']=$r1['levels'];
					header("location: home.php");
				}
			}
		}
		else if ($res2->num_rows == 0){
			$_SESSION['message'] = "User with that username is not alocated any loggin session!";
			header("location: error.php");
		}
		else{
			$r2 = $res2->fetch_assoc();
			date_default_timezone_set('Asia/Calcutta');
			$val=intval(date("H"))*3600+intval(date("i"))*60+intval(date("s"));
			if ($r2['daycheck']==intval(date("w"))) {
				
				if ($val>$r2['starttime'] AND $val< $r2['endtime']){
					$_SESSION['user_id'] = $r1['user_id'];
					$_SESSION['levels'] = $r1['levels'];
					$_SESSION['oldlevel'] = $r1['levels'];
					$_SESSION['endtime'] = $r2['endtime'];
					$_SESSION['starttime'] = $r2['starttime'];
					$_SESSION['logged_in'] = true;
					$_SESSION['t']=time();
					$_SESSION['aset'] = false;
					header("location: home.php");
				}
				else{
					$_SESSION['message'] = "Login attempt in invalid time session!";
				    header("location: error.php");	
				}
			}
			else{
				$_SESSION['message'] = "Login attempt on invalid day!";
				header("location: error.php");	
			}
		}
    }
	else{
		$_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
	}
   }