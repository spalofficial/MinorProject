<?php
$server="localhost";
$dbuser="root";
$db2="mdb";
$dbpswd="";
$con1=new mysqli($server, $dbuser, $dbpswd, $db2);
if ($con1->connect_error) {
    die("Connection failed: " . $con1->connect_error);
}