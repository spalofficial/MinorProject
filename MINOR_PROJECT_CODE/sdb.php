<?php
$server="localhost";
$dbuser="root";
$db4="sdb";
$dbpswd="";
$con2=new mysqli($server, $dbuser, $dbpswd, $db4);
if ($con2->connect_error) {
    die("Connection failed: " . $con2->connect_error);
}