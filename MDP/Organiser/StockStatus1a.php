<?php
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

// Make connection to MySQL database
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

     // Run the query
     $event_id = $_GET['event_id'];
     $eresult = $connection->query("Select Event_Name from vending.shirtsize WHERE event_id='$event_id'");
     while($erow = $eresult->fetch_assoc()){
     $Event_Name = $erow['Event_Name'];}
     error_reporting(0);
     

//$config = parse_ini_file('/var/www/private/db-config.ini');    
//// Make connection to MySQL database
//$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
//$event_id = $_GET['event_id'];
//$eresult = $connection->query("Select Event_Name from vending.shirtsize WHERE event_id='$event_id'");
//while($erow = $eresult->fetch_assoc()){
//$Event_Name = $erow['Event_Name'];}
//error_reporting(0);
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
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Stock Status</h1> 
       </div> 
<div class="container">
    <div class="row">
	
<?php
    //get stock info from each vending machine
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

//for stock update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
        $location = $_POST['location'];
        $e_xs = mysqli_real_escape_string($dbc, trim($_POST['e_xs']));
        $e_s = mysqli_real_escape_string($dbc, trim($_POST['e_s']));
        $e_m = mysqli_real_escape_string($dbc, trim($_POST['e_m']));
        $e_l = mysqli_real_escape_string($dbc, trim($_POST['e_l']));
        $e_xl = mysqli_real_escape_string($dbc, trim($_POST['e_xl']));

        $xs += $e_xs;
        $s += $e_s;
        $m += $e_m;
        $l += $e_l;
        $xl += $e_xl;
        
        $xs = mysqli_real_escape_string($dbc, $xs);
        $s = mysqli_real_escape_string($dbc, $s);
        $m = mysqli_real_escape_string($dbc, $m);
        $l = mysqli_real_escape_string($dbc, $l);
        $xl = mysqli_real_escape_string($dbc, $xl);
        $Event_Name = mysqli_real_escape_string($dbc, $Event_Name);
		// Make the query:
		$q = "UPDATE vending.$location SET XS = '$xs', S = '$s' , M ='$m', L = '$l', XL = '$xl' where Event_Name = '$Event_Name'";		               
		$r = mysqli_query ($dbc, $q); // Run the query.

		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>	
		<p>Stock has been replenished. Click <a href="Restocker.php" id="terms-link" >here</a> to return to the restock page.</label></p><p><br /></p>';
		} else  { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.
 
		exit();
		
	
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.

?>         
<form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
    <h4 style="font-size: 20px">Event Name:</h4>
    <h4 style="font-size:30px; color: #000"><?php echo "$Event_Name";?></h4>
   
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
    </tr>
    <tr>
    <th><input type="text" name="e_xs" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_s" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_m" step="1"  value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_l" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_xl" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    </tr>
    </table>
<input type ="hidden" name="location" value="BPP"/>
<input type="submit" name="submit" value="Restock" id="restock"/>      
</form>

        </br>
<form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">

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
    </tr>
    <tr>
    <th><input type="text" name="e_xs" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_s" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_m" step="1"  value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_l" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_xl" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    </tr>
    </table>
<input type ="hidden" name="location" value="CSM"/>
<input type="submit" name="submit" value="Restock" id="restock"/>     
  </tr></table>
</form>
        
<form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
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
  </tr>
  <tr>
    <th><input type="text" name="e_xs" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_s" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_m" step="1"  value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_l" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_xl" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    </tr>
    </table>
<input type ="hidden" name="location" value="OneKMM"/>
<input type="submit" name="submit" value="Restock" id="restock"/>     
</table>
</form>
        
<form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">

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
    </tr>
    <tr>
    <th><input type="text" name="e_xs" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_s" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_m" step="1"  value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_l" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    <th><input type="text" name="e_xl" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
    </tr>
<input type ="hidden" name="location" value="VN"/>   
</table>
<input type="submit" name="submit" value="Restock" id="restock"/>  
</form>
        </div>
	<br/><br/><br/>
    </div>
</body>

</html>

