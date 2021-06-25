<?php
$server="localhost";
$dbuser="root";
$db1="udb";
$dbpswd="";
$con=new mysqli($server, $dbuser, $dbpswd, $db1);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}