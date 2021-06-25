<?php
$server="localhost";
$dbuser="root";
$db5="ddb";
$dbpswd="";
$con4=new mysqli($server, $dbuser, $dbpswd, $db5);
if ($con4->connect_error) {
    die("Connection failed: " . $con4->connect_error);
}