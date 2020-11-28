<?php 
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['username'];
   $address = $_SESSION['address'];
   $postal_code = $_SESSION['postal_code'];
   $company_name = $_SESSION['company_name'];
   $phone = $_SESSION['phone'];
   $regdate = $_SESSION['registration_date'];
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
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Account</h1>
       </div> 
    <div class="container">
        <h4 style="font-size: 30px; text-align: center;">Welcome <?php echo $username;?></h4><hr><br/><br/>
    <div class="row">
        <img src="css/profile.png" alt="Profile Pic" height="150" width="150" style="float: right;">
	<h3 style="display: inline;">Username: </h3><br/><?php echo $username;?><br/><br/>
        <h3 style="display: inline;">Company name: </h3><br/><?php echo $company_name;?><br/><br/>
        <h3 style="display: inline;">Address: </h3><br/><?php echo $address;?><br/><br/>
        <h3 style="display: inline;">Postal Code: </h3><br/>Singapore <?php echo $postal_code;?><br/><br/>
        <h3 style="display: inline;">Phone: </h3><br/><?php echo $phone;?><br/><br/>
        <h3 style="display: inline;">Date Registered: </h3><br/><?php echo $regdate;?><br/><br/>
        </div>
        
        <br/><br/>
        
        <div class="row">
            <div class="e" style="text-align: center;">
        <b style="font-size: 24px">|</b><a href="All_Events1.php" style="font-size: 20px;"> All Events </a>  
        <b style="font-size: 24px">|</b><a href="logout.php" style="font-size: 20px;"> Log Out </a><b style="font-size: 24px">|</b> 
</div>
        </div>

        
       
	
        

</div>
</body>

</html>

