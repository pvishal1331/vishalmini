<?php
require_once('sql.php');
$username=$_GET['username'];
$q= "DELETE FROM usertable WHERE username ='$username'";
$result=mysqli_query($con,$q);
header('location:adminpanel.php');
?>