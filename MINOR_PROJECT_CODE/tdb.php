<?php
$server="localhost";
$dbuser="root";
$db3="tdb";
$dbpswd="";
$con3=new mysqli($server, $dbuser, $dbpswd, $db3);
if ($con3->connect_error) {
    die("Connection failed: " . $con3->connect_error);
}