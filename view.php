<?php
session_start();
echo "welcome"." ". $_SESSION['username'];
$userprofile=$_SESSION['username'];
if($userprofile==true)
{

}
else
{
    header('location:admin.php');
}
require_once('sql.php');
$username=$_GET['username'];
$q="SELECT * FROM usertable where username='$username'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_assoc($result);
foreach($row as $ke=> $val)
{
   echo $ke.": ".$val."<br>";
}

?>
<a href="logout.php">logout</a>