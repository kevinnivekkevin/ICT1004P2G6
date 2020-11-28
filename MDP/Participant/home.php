<?php 
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['username'];
   $dob_day = $_SESSION['dob_day'];
   $dob_month = $_SESSION['dob_month'];
   $dob_year = $_SESSION['dob_year'];
   $gender = $_SESSION['gender'];
   $email = $_SESSION['email'];
   $first_name = $_SESSION['first_name'];
   $last_name = $_SESSION['last_name'];
   $bloodtype = $_SESSION['bloodtype'];
   $regdate = $_SESSION['regdate'];
}
error_reporting(0);
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <?php include "navbarParticipant.php"?>
    <div class="header" >
	<h1>Account</h1>
       </div> 
    <div class="container">
        <h4 style="font-size: 30px; text-align: center;">Welcome! <?php echo $username;?></h4><hr><br/><br/>
    <div class="row">
        <img src="css/profile.png" alt="Profile Pic" height="150" width="150" style="float: right;">
	<h3 style="display: inline;">Username: </h3><br/><?php echo $username;?><br/><br/>
        <h3 style="display: inline;">Date of birth: </h3><br/><?php echo $dob_day."/".$dob_month."/".$dob_year;?><br/><br/>
        <h3 style="display: inline;">Gender: </h3><br/><?php echo $gender;?> <br/><br/><div class="e"><a href="edit.php" style="float: right; padding-right:5%;">Update Profile</a></div>
        <h3 style="display: inline;">Full name: </h3><br/><?php echo $first_name . " " . $last_name;?><br/><br/>
        <h3 style="display: inline;">Blood Type: </h3><br/><?php echo $bloodtype;?><br/><br/>
        <h3 style="display: inline;">Date Registered: </h3><br/><?php echo $regdate;?><br/><br/>
        </div>
        
        <br/><br/>
        
        <div class="row">
            <div class="e">
        <b style="font-size: 24px">|</b><a href="All_Events.php" style="font-size: 20px;"> All Events </a>  
        <b style="font-size: 24px">|</b><a href="My_Events.php" style="font-size: 20px;"> My Events </a>  
        <b style="font-size: 24px">|</b><a href="logout.php" style="font-size: 20px;"> Log Out </a><b style="font-size: 24px">|</b> 
</div>
        </div>

        
       
	
        

</div>
</body>

</html>

