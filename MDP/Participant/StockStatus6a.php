<?php
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

// Make connection to MySQL database
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

?>
<?php
     // Run the query
     $event_id = $_GET['event_id'];
     $eresult = $connection->query("Select Event_Name from shirtsize WHERE event_id='$event_id'");
     while($erow = $eresult->fetch_assoc()){
     $Event_Name = $erow['Event_Name'];}
     error_reporting(0);
     ?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Stock Status </title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
<?php include "navbarParticipant.php"?>
    <div class="header" >
	<h1>Stock Status</h1>
       </div> 
<div class="container">
    <div class="row">
	

<?php
      $bp_result = $connection->query("Select * from BPP WHERE event_id='$event_id'");
   while($bp_row = $bp_result->fetch_assoc()){
   $bp_xs = $bp_row['XS'];
	$bp_s = $bp_row['S'];
	$bp_m = $bp_row['M'];
    $bp_l = $bp_row['L'];
	$bp_xl = $bp_row['XL'];
	}

    $cs_result = $connection->query("Select * from CSM WHERE event_id='$event_id'");
   while($cs_row = $cs_result->fetch_assoc()){
   $cs_xs = $cs_row['XS'];
	$cs_s = $cs_row['S'];
	$cs_m = $cs_row['M'];
    $cs_l = $cs_row['L'];
	$cs_xl = $cs_row['XL'];
	}

    $okm_result = $connection->query("Select * from OneKMM WHERE event_id='$event_id'");
   while($okm_row = $okm_result->fetch_assoc()){
   $okm_xs = $okm_row['XS'];
	$okm_s = $okm_row['S'];
	$okm_m = $okm_row['M'];
    $okm_l = $okm_row['L'];
	$okm_xl = $okm_row['XL'];
	}

    $vn_result = $connection->query("Select * from VN WHERE event_id='$event_id'");
   while($vn_row = $vn_result->fetch_assoc()){
   $vn_xs = $vn_row['XS'];
	$vn_s = $vn_row['S'];
	$vn_m = $vn_row['M'];
    $vn_l = $vn_row['L'];
	$vn_xl = $vn_row['XL'];
	}



?>
        	</br>
	<h4 style="font-size: 20px">Event Name:</h4>
        <h4 style="font-size:30px; color: #000"><?php echo "$Event_Name";?></h4>
        </br>
        <h4>Venue:</h4>
        <h1>Bukit Panjang Plaza</h1>
        <table style="width:100%">
         
  <tr>
    <th style="width:20%">XS</th>
    <th style="width:20%">S</th> 
    <th style="width:20%">M</th>
      <th style="width:20%">L</th>
    <th style="width:20%">XL</th>
  </tr>
                <tr>
                    
    <th style="background-color:#DCDCDC;"><?php echo "$bp_xs";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$bp_s";?></th> 
    <th style="background-color:#DCDCDC;"><?php echo "$bp_m";?></th>
      <th style="background-color:#DCDCDC;"><?php echo "$bp_l";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$bp_xl";?></th>
  </tr></table>
        </br>
        
        <h4>Venue:</h4>
        <h1>City Square Mall</h1>
    
<table style="width:100%">
         
  <tr>
    <th style="width:20%">XS</th>
    <th style="width:20%">S</th> 
    <th style="width:20%">M</th>
      <th style="width:20%">L</th>
    <th style="width:20%">XL</th>
  </tr>
                <tr>
    <th style="background-color:#DCDCDC;"><?php echo "$cs_xs";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$cs_s";?></th> 
    <th style="background-color:#DCDCDC;"><?php echo "$cs_m";?></th>
      <th style="background-color:#DCDCDC;"><?php echo "$cs_l";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$cs_xl";?></th>
  </tr></table>
        </br>
        <h4>Venue:</h4>
        <h1>One KM Mall</h1>
    
<table style="width:100%">
         
  <tr>
    <th style="width:20%">XS</th>
    <th style="width:20%">S</th> 
    <th style="width:20%">M</th>
      <th style="width:20%">L</th>
    <th style="width:20%">XL</th>
  </tr>
                <tr>
    <th style="background-color:#DCDCDC;"><?php echo "$okm_xs";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$okm_s";?></th> 
    <th style="background-color:#DCDCDC;"><?php echo "$okm_m";?></th>
      <th style="background-color:#DCDCDC;"><?php echo "$okm_l";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$okm_xl";?></th>
  </tr></table>
                </br>
        <h4>Venue:</h4>
        <h1>Velocity @ Novena</h1>

<table style="width:100%">
         
  <tr>
    <th style="width:20%">XS</th>
    <th style="width:20%">S</th> 
    <th style="width:20%">M</th>
      <th style="width:20%">L</th>
    <th style="width:20%">XL</th>
  </tr>
                <tr>
    <th style="background-color:#DCDCDC;"><?php echo "$vn_xs";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$vn_s";?></th> 
    <th style="background-color:#DCDCDC;"><?php echo "$vn_m";?></th>
      <th style="background-color:#DCDCDC;"><?php echo "$vn_l";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$vn_xl";?></th>
  </tr></table>
        </div>
	<br/><br/><br/>
    </div>
</body>

</html>

