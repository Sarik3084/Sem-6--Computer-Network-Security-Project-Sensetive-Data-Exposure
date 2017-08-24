<?php
include'connection.php';
 //$conn=opencon();
 //echo "Connected Successfully";
 ?>
 
 
<html>
<div class="all">

<head>
 <link rel="stylesheet" type="text/css" href="main.css"/>
  </head>

<body>
<div class="maintitle">
 <h1> Soar High Flight Bookings pvt.ltd</h1>
  
 <h5> <marquee> For guarenteed booking and a smooth journey </marquee></h5>
  </div> 
<div class="others">  
<a href="booking.php" >
<img src="airplane-final.jpg" width="500" height="200">
</a>
</div>

<div class="others1">
<nav>
 <ul> 
 <li> <a href= "index.php"> Home | </a></li>
 <li> <a href= "about.php"> About Us | </a></li>
 <li>  <a href="ContactUs.php">Contact Us</a></li>
  </ul>
</nav>
</div>
 

 <div class="eform">
 <h2 id="etl"> Employee Login </h2>
  
<form method="post" action="login.php">
 Username: <input type="text" name="eusername"> <br> <br>
 Password: <input type="text" name="epassword"> <br> <br>
 <div class="subm">
 <input type="submit" name="submit" value="Submit">
 </div>
 </form>
 </div>
 </body>
</div>
</html>

<?php
if(isset($_POST['submit'])){
 $login_ename= $_POST['eusername'];
 $login_password= $_POST['epassword'];
 
$sql = "SELECT Username, Password FROM employee where Username='$login_ename';";
$result = mysqli_multi_query($conn, $sql);
 
//$sql= "SELECT Username,Password from employee WHERE Username='$login_ename' AND Password='$login_password'";
//$result= mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0)
 //if($result='true')
	 //echo "success";
	header('Location: emp-level-1.php');
 else
	 header('Location: login.php');
	 //echo "Invalid ";
 
}
   ?>
