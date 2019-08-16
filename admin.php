<html>
<head><title>Login Page</title>
<link rel="stylesheet" type="text/css" href="/home/user/Desktop/log1.css">
<div class="loginbox">
<h1> login here</h1>
<form action="admin.php" method="POST">
 <p>Username</p>
 <input type="Varchar" name="username" placeholder="Enter username" required/>
 <p>Password</p> 
  <input type="password" name="password1" id ="password1"placeholder="Enter password" required/>
  <input type="submit" name="submit" value="submit"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php
if(empty($_POST['password']))
{
  echo 
?>
</form>
</head>
<body>
<?php
session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
require_once('sql.php');
$username=$_POST['username'];
$password=$_POST['password1'];
$_SESSION['username']=$username;
if(empty($username))
{
  echo "please enter username <br>";
}

$sql="SELECT * FROM usertable where username='$username' AND password='$password'";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
while($row)
{
 if($row['username']==$username && $row['password']==$password && $row['roll']=='admin')
  {
   echo "successful";
  header('location:adminpanel.php');
 }
  elseif($row['username']==$username && $row['password']==$password && $row['roll']=='user')
  {
       header('location:fetch.php');
  }
  

}

}
?>
</body>
</html>