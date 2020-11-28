<?php
include ('mysqli_connect.php');
$connection = $dbc;

?>
<?php
     //Get full location name
     $location = $_GET['location'];
     if ($location == "BPP"){
         $locationName = "Bukit Panjang Plaza";
     }elseif ($location == "CSM"){
         $locationName = "City Square Mall";
     }elseif ($location == "OneKMM"){
         $locationName = "OneKM Mall";
     }else{
         $locationName = "Velocity @ Novena Square";
     }
     //Get all stock data from vending machine selected
     $results = $connection->query("Select * from vending.$location");
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
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Stock Status</h1> 
       </div> 
<div class="container">
    <div class="row">
    <h4 style="font-size: 20px">Location:</h4>
    <h4 style="font-size:30px; color: #000"><?php echo "$locationName";?></h4>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
        $event_id = mysqli_real_escape_string($dbc, trim($_POST['event_id']));
        
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
		$q = "UPDATE vending.$location SET XS = '$xs', S = '$s' , M ='$m', L = '$l', XL = '$xl' where event_id = '$event_id'";		
		$r = mysqli_query ($dbc, $q); // Run the query.

		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>	
		<p>Stock has been replenished. Click <a href="StockStatus1.php" id="terms-link" >here</a> to return to the restock page.</label></p><p><br /></p>';
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
    
<?php //Generate table for each event for the vending machine
foreach($results as $result){ ?>
    <form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
    <h1><?php echo $result['Event_Name'] ?></h1>
    <table style="width:100%">
        <tr>
          <th style="width:20%">XS</th>
          <th style="width:20%">S</th> 
          <th style="width:20%">M</th>
          <th style="width:20%">L</th>
          <th style="width:20%">XL</th>
        </tr>
        <tr>                
          <th style="background-color:#DCDCDC;"><?php echo $result['XS'];?></th>
          <th style="background-color:#DCDCDC;"><?php echo $result['S'];?></th> 
          <th style="background-color:#DCDCDC;"><?php echo $result['M'];?></th>
          <th style="background-color:#DCDCDC;"><?php echo $result['L'];?></th>
          <th style="background-color:#DCDCDC;"><?php echo $result['XL'];?></th>
        </tr>
        <tr>
            <th><input type="text" name="e_xs" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
            <th><input type="text" name="e_s" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
            <th><input type="text" name="e_m" step="1"  value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
            <th><input type="text" name="e_l" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
            <th><input type="text" name="e_xl" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
        </tr>
    </table>
    <input type="hidden" name="event_id" value="<?php echo $result['event_id'] ?>"/>
    <input type="submit" name="submit" value="Restock" id="restock"/> 
    </form>
<?php       
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
                print($q);
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
    <br/><br/><br/>
    </div>
</body>

</html>