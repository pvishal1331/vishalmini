<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db="adminlog";
$con = new mysqli($servername, $user, $pass,$db);
if ($con->connect_error) 
{
    die("Connection failed: " . $con->connect_error);
    echo "not Connected successfully <br>";
} 
?>