<?php
#Supplier comes to the VM, to restock tshirts. Choose an event, current tshirt stock for every sizes for that event is displayed.
#After restocking, supplier enters the number of tshirts restocked for every sizes. tshirt stock is recounted
/* 
    Upon clicking option select, insert data php table to display and input
    
    PHP table to input text; stock for every shirt size; add to current table

    CHOOSE LOCATION >> TSHIRT DISPLAY >> TSHIRT INPUT >> SUBMIT >> TSHIRT STOCK UPDATED 
    */

$config = parse_ini_file('/var/www/private/db-config.ini');
//print($config['username']);

// Make connection to MySQL database
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
         $result = $connection->query("Select event_id, Event_Name from vending.shirtsize ORDER BY Event_Name ASC");
         error_reporting(0);
         ?>
         <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Stock Update</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
    <script>
function onBlur(el) {
    if (el.value == '') {
        el.value = el.defaultValue;
    }
}
function onFocus(el) {
    if (el.value == el.defaultValue) {
        el.value = '';
    }
}
</script>
    <div class="navbar" style="background-color: #21b1d3;">
  <a style="width: 20%; background-color: #21b1d3;" href="home1.php">Home</a>
  <a style="width: 30%; background-color: #21b1d3;" href="Reg_Event.php">Event Register</a>
  <a style="width: 25%; background-color: #21b1d3;" href="StockStatus1.php">Stock Status</a>
  <a class="active" style="width: 25%; background-color: #ADD8E6;" href="Restocker.php">Stock Update</a>
</div>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Stock Update</h1>
       </div> 
<div class="container">

       
    <?php
        $event_id=$_GET['event_id'];
        $query = "SELECT * FROM vending.$location WHERE event_id='$event_id'";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        $xs = $row['XS'];
	$s = $row['S'];
	$m = $row['M'];
        $l = $row['L'];
	$xl = $row['XL'];
        $Event_Name = $row['Event_Name'];
           }	
  if ($_GET['display'] == "Logistics") {


           
  
           session_start(); // Starting Session


// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
        
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

      

<form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
    
    <div class="row">
              <h4>Venue:</h4>
<h2><?php echo "$name"; ?></h2>
      <h4>Event Name:</h4>
    <h2><?php echo "$Event_Name";?></h2>
    <h4>Stock Count</h4>
            <table style="width:100%">
                
  <tr>
    <th>XS</th>
    <th>S</th> 
    <th>M</th>
      <th>L</th>
    <th>XL</th>
  </tr>
                <tr>
    <th style="background-color:#DCDCDC;"><?php echo "$xs";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$s";?></th> 
    <th style="background-color:#DCDCDC;"><?php echo "$m";?></th>
      <th style="background-color:#DCDCDC;"><?php echo "$l";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$xl";?></th>
  </tr>
  <tr>
<th><input type="text" name="e_xs" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
<th><input type="text" name="e_s" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
<th><input type="text" name="e_m" step="1"  value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
<th><input type="text" name="e_l" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
<th><input type="text" name="e_xl" step="1" value="0" onfocus="onFocus(this, '0');" onblur="onBlur(this, '0')" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45"></th>
      </table>
</tr>
<input type="submit" name="submit" value="Restock" id="restock"/>      
       
</div>
      </form>
<?php
}?>

    </div>
</body>

</html>