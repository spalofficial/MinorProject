<?php
$server="localhost";
$dbuser="root";
$db6="adb";
$dbpswd="";
$con5=new mysqli($server, $dbuser, $dbpswd, $db6);
if ($con5->connect_error) {
    die("Connection failed: " . $con5->connect_error);
}