<?php
$config = parse_ini_file('/var/www/private/db-config.ini');    

// Make connection to MySQL database
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

?>
<?php
     // Run the query
     $event_id = $_GET['event_id'];
     $eresult = $connection->query("Select Event_Name from vending.shirtsize WHERE event_id='$event_id'");
     while($erow = $eresult->fetch_assoc()){
     $Event_Name = $erow['Event_Name'];}
     error_reporting(0);
     
     ?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Clear Stocks</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Clear Stocks</h1>
       </div> 
<div class="container">
    <div class="row">
	

<?php
      $bp_result = $connection->query("Select * from vending.BPP WHERE event_id='$event_id'");
   while($bp_row = $bp_result->fetch_assoc()){
   $bp_xs = $bp_row['XS'];
	$bp_s = $bp_row['S'];
	$bp_m = $bp_row['M'];
    $bp_l = $bp_row['L'];
	$bp_xl = $bp_row['XL'];
	}

    $cs_result = $connection->query("Select * from vending.CSM WHERE event_id='$event_id'");
   while($cs_row = $cs_result->fetch_assoc()){
   $cs_xs = $cs_row['XS'];
	$cs_s = $cs_row['S'];
	$cs_m = $cs_row['M'];
    $cs_l = $cs_row['L'];
	$cs_xl = $cs_row['XL'];
	}

    $okm_result = $connection->query("Select * from vending.OneKMM WHERE event_id='$event_id'");
   while($okm_row = $okm_result->fetch_assoc()){
   $okm_xs = $okm_row['XS'];
	$okm_s = $okm_row['S'];
	$okm_m = $okm_row['M'];
    $okm_l = $okm_row['L'];
	$okm_xl = $okm_row['XL'];
	}

    $vn_result = $connection->query("Select * from vending.VN WHERE event_id='$event_id'");
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
        <div class="row">
            
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include ('mysqli_connect.php');
        $errors = array();

        if(!isset($_POST['clear_stocks']) && !isset($_POST['delete_event'])){
            $errors[] = 'Please tick both of the checkbox to delete the event';
            }
        if (empty($errors)) {
            $q = "DELETE FROM vending.OneKMM WHERE event_id = '$event_id';";
            $q .= "DELETE FROM vending.VN WHERE event_id = '$event_id';";
            $q .= "DELETE FROM vending.CSM WHERE event_id = '$event_id';";
            $q .= "DELETE FROM vending.BPP WHERE event_id = '$event_id';";
            $q .= "DELETE FROM vending.shirtsize WHERE event_id = '$event_id';";
        if (!$dbc->multi_query($q)) {
            echo "Multi query failed: (" . $dbc->errno . ") " . $dbc->error;
            }

        do {
            if ($res = $dbc->store_result()) {
                var_dump($res->fetch_all(MYSQLI_ASSOC));
                $res->free();

                } 
           } while ($dbc->more_results() && $dbc->next_result());
                mysqli_close($dbc); // Close the database connection.

             echo '<h1>Thank you!</h1>
                    <p>You have successfully deleted and removed '. $event_name . '!</p><p><br /></p>';
                   exit();
                }
         mysqli_close($dbc);
    }
    if(!empty($errors)){ 
    echo '<h1>Error(s)!</h1>';
    foreach($errors as $errorMessage){
        echo $errorMessage . '<br>';
    }
    
    }
    error_reporting(0);
?>
        <form method="post">
            <h4>Have you cleared all your stocks?</h4>
            <label class="checkbox-inline">
        <input width="10%" name = "clear_stocks" type="checkbox" value="1"></label><br/>
        <h4>Do you wish to delete event?</h4>
        <label class="checkbox-inline">
        <input width="10%" name = "delete_event" type="checkbox" value="1"></label>
    <input type="submit" name="display" value="Delete Event"/><br/><br/>	
</form>
        </div>
    </div>
    
    
</body>

</html>

