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
?>
<!doctype html>
<html>
<head>
</head>
<body>
<form>
<?php
require_once('sql.php');
$user1=$_SESSION['username'];
if($user1)
{

$sql="SELECT * FROM usertable WHERE roll='user' AND username='$user1'";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($query);
foreach($row as $key=> $value)
{
   echo $key.": ".$value."<br>";
}
}
?>
<a href="logout.php">logout</a>
</form>
</body>
</html>