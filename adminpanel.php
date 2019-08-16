<?php
session_start();
include('sql.php');
echo "Hello"." ".$_SESSION['username'];
$userprofile=$_SESSION['username'];
if($userprofile == 'admin')
{

}
else
{
  header('location:admin.php');
}

?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<head>
<body>
<h1>create user</h1>
<h2>sign up</h2>
<form action="adminpanel.php" method="POST">
<div>
 <p>Username(mobile number)</p>
 <input type="varchar" name="username" placeholder="Enter username" >
 <p>Password</p> 
  <input type="password" name="password1" id="password1" placeholder="Enter password" onkeyup='check();'/>
  <p>Confirm Password</p>
  <input type="password" name="password2" id="password2" placeholder="confirm password" onkeyup='check();'/>
<span id = "message"></span> 
</div>  
<script type="text/javascript" src="address.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<h2>Basic Resident Information</h2>
<div class="bri">
    <div class="rid">
      <label for="rid">Residential ID</label>
      <input type="number" name="resid" value="" placeholder="please enter residental ID" require />
      <label for="tcode">T-Code</label>
      <input type="number" name="tcode" value="" placeholder="enter your tcode number" require/>
    </div>
    <div class="fname">
           First name: <input type="text" name="name" value="" placeholder="enter your name"require/>
           Home phone:<input type="number" name="hphone" value="" placeholder="enter your home number " require/> 
        </div>
        <div class="lname">
                Last Name:<input type="text" name="lname" value="" placeholder="enter your last name" require/>
                Email:<input type="email" name="email" value=""pattern="^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$">
            </div>

</div>
        <h2>Address</h2>
        <div class="add">
            <div class="hl">
                <h3>Residential address</h3>
                    Housing Location:<input type="text" name="housing" id="housing" value="" placeholder="enter your home location number" require/><br>
                    Street Address:<input type="text" name="street" id="street" value="" placeholder="enter your street address number" require/><br>
                    City:<input type="text" name="city" id="city" value="" placeholder="enter your city number" require/><br>
                    State:<input type="text" name="state" id="state" value="" placeholder="enter your state number" require/><br>
                    
                Zip code:<input type="number" name="zip" id="zip" value="" placeholder="enter your zip code number" require/>    
            </div>
            <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
            <label for = "same">If same secondary address select this box.</label> 
                           
                <div class="sa">
                        <h3>Permanent address</h3>
                        Housing Location:<input type="text" name="phousing" id="phousing" value="" placeholder="enter your home location number" require/><br>
                        Street Address:<input type="text" name="pstreet" id="pstreet" value="" placeholder="enter your street address number" require/><br>
                        City:<input type="text" name="city" id="pcity" value="" placeholder="enter your city number" require/><br>
                        State:<input type="text" name="state" id="pstate" value="" placeholder="enter your state number" require/><br>
                        Zip code:<input type="number" name="zip" id="pzip" value="" placeholder="enter your zip code number" require/><br>
                </div>
 
</div>
<h2>Programs</h2>
                        <div class="program">
                            Housing Program:<input type="text" name="housingp" value="" />
                            Service Program:<input type="text" name="service" value="" />
                            Role:<input type="Varchar" name="role" value=""/>
                            </div>
<input type="submit" id="displaydata"name="submit" value="submit"/>
<a href="logout.php">logout</a><br>
<table class="table">
<thead>
<th>Username</th>
<th>name</th>
<th>View</th>
</thead>
<tbody id=responsedata>
<?php
include('sql.php');
$sql="SELECT * FROM usertable";
$query=mysqli_query($con,$sql);

    while($result=mysqli_fetch_array($query))
    {
    ?>
    <tr>
    <td><?php echo $result['username']?></td>
    <td><?php echo $result['name']?></td>
    <td><button><a href="view.php?username=<?php echo $result['username']?>">view</button></td>
    <td><button><a href="delete.php?username=<?php echo $result['username']?>">delete</button></td>
    </tr>
    <!-- ClearRecords.php?id=8&p_id=00023 -->
    <?php
    }
?>
</tbody>
</table>
<script type="text/javascript" src="address.js"></script>
</form>
</head>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{ 
  if(isset($_POST['submit']))
  {
  $username=$_POST['username'];
  $password=$_POST['password1'];
  $resid=$_POST['resid'];
  $tcode=$_POST['tcode'];
  $fname=$_POST['name'];
  $lname=$_POST['lname'];
  $hphone=$_POST['hphone'];
  $email=$_POST['email'];
  $housing=$_POST['housing'];
  $street=$_POST['street'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $zip=$_POST['zip'];
  $housingpg=$_POST['housingp'];
  $service=$_POST['service'];
  $role=$_POST['role'];
  

  function check_input($data)
  {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
  if(empty($username))
  {
    echo "enter the username<br>";
  }
  else
  {
    $username=check_input($_POST["username"]);
  }
  if(empty($password))
  {
    echo "enter the password<br>";
  }

  else
  {
    $password=check_input($_POST["password1"]);
  }
  if(empty($resid))
  {
    echo "enter the resid<br>";
  }
  else
  {
    $resid=check_input($_POST["resid"]);
  }
  if(empty($tcode))
  {
    echo "enter the t-code<br>";
  }
  else
  {
    $tcode=check_input($_POST["tcode"]);
  }
  if(empty($name))
  {
    echo "enter the name<br>";
  }
  else
  {
    $name=check_input($_POST["name"]);
  }
  if(empty($lname))
  {
    echo "enter the last name<br>";
  }
  else
  {
    $lname=check_input($_POST["lname"]);
  }
  if(empty($housing))
  {
    echo "enter the housing<br>";
  }
  else
  {
    $housing=check_input($_POST["housing"]);
  }
  if(empty($hphone))
  {
    echo "enter the hphone<br>";
  }
  else
  {
    $hphone=check_input($_POST["hphone"]);
  }
  if(empty($housingpg))
  {
    echo "enter the housingp<br>";
  }
  else
  {
    $housingpg=check_input($_POST["housingp"]);
  }
  if(empty($state))
  {
    echo "enter the state<br>";
  }
  else
  {
    $state=check_input($_POST["state"]);
  }
 if(empty($city))
  {
    echo "enter the city<br>";
  }
  else
  {
    $city=check_input($_POST["city"]);
  }
  if(empty($zip))
  {
    echo "enter the zip<br>";
  }
  else
  {
    $zip=check_input($_POST["zip"]);
  }
  if(empty($role))
  {
    echo "enter the role<br>";
  }
  else
  {
    $role=check_input($_POST["role"]);
  }
 

require('sql.php');
$sql="SELECT* FROM usertable WHERE roll='admin'";
$query= mysqli_query($con,$sql);
$row=mysqli_num_rows($query);
 
if($row)
{
   $sql ="INSERT INTO usertable(username,password,resid,tcode,name,lname,hphone,email,housing,street,city,state,zip,housingp,service,roll) 
    VALUES('$username','$password','$resid','$tcode','$fname','$lname','$hphone','$email','$housing','$street','$city','$state','$zip','$housingpg','$service','$role')";
     
     
     if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
   } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}   
    $con->close();

}
}


?>
</body>
</html>
