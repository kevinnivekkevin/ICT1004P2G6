<?php 
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['username'];
   $email = $_SESSION['email'];
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

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style3.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <!--jQuery-->
        <script defer    
        src="https://code.jquery.com/jquery-3.4.1.min.js"    
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="    
        crossorigin="anonymous">
        </script>
        
        <!--Bootstrap JS-->
        <script defer   
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
        crossorigin="anonymous">
        </script>
        <!-- Custom JS-->
<script defer src="js/main.js"></script>
</head>
<body>
<?php include "adminNav.php" ?>
    <div class="container">
        <h1>Account</h1>
        <h4 style="font-size: 30px; text-align: center;">Welcome <?php echo $username;?></h4><hr><br/><br/>
    <div class="row">
	    <div class="col-sm">
	<h3 style="display: inline;">Username: </h3><br/><?php echo $username;?><br/><br/>
        <h3 style="display: inline;">Company name:</h3><br/>AiPao pte ltd<br/><br/>
        <h3 style="display: inline;">Address:</h3><br/>172 Ang Mo Kio Avenue 8, 567739<br/><br/>
        <h3 style="display: inline;">Phone:</h3><br/>6592 1189<br/><br/>
        <h3 style="display: inline;">Email:</h3><br/><br/><?php echo $email;?><br/>
        </div>
	    <div class="col-sm">
        <img src="css/profile.png" alt="Profile Pic" height="150" width="150" style="float: right;">
		    </div>
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

