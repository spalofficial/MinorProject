<?php
$server="sql112.byethost17.com";
$dbuser="b17_20570446";
$db1="b17_20570446_123";
$dbpswd="cancerous";
$con=new mysqli($server, $dbuser, $dbpswd, $db1);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	$q="update usertime set daycheck=daycheck+1"
	$con->query($q);
}
?>
