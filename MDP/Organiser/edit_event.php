<?php
$page_title = 'Edit Event Details';
session_start(); // Starting Session
    $event_id = $_GET['event_id'];
    
$config = parse_ini_file('/var/www/private/db-config.ini');  
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);


    $result = $connection->query("SELECT * FROM vending.shirtsize WHERE event_id='$event_id'");
    while ($row = $result->fetch_assoc()){ 
        $Event_Name = $row['Event_Name'];
	$location = $row['Event_Location'];
	$day = $row['event_day'];
        $month = $row['event_month'];
	$year = $row['event_year'];
        $EXSC = $row['XSC'];
        $EXSL = $row['XSL'];
        $ESC = $row['SC'];
        $ESL = $row['SL'];        
        $EMC = $row['MC'];
        $EML = $row['ML'];
        $ELC = $row['LC'];
        $ELL = $row['LL'];
        $EXLC = $row['XLC'];
        $EXLL = $row['XLL'];     
        $status = $row['event_status'];
           }
if(isset($_SESSION['user_id'])){
$org_id = $_SESSION['user_id'];
$name = $_SESSION['company_name'];
}
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
    
	$errors = array(); // Initialize an error array.
	

	// Check for a first name:
	if (empty($_POST['Event_Name'])) {
		$errors[] = 'Please enter event name.';
	} else {               
//		$n = mysqli_real_escape_string($dbc, trim($_POST['Event_Name']));
                $n = htmlspecialchars($_POST['Event_Name']);
	}
	
	// Check for a first name:
	if (empty($_POST['Event_Location'])) {
		$errors[] = 'Please enter event location.';
	} else {
//                $l = mysqli_real_escape_string($dbc, trim($_POST['Event_Location']));
                $l = htmlspecialchars($_POST['Event_Location']);
	}
	
	// DOB
    if (empty($_POST['event_year']) || empty($_POST['event_month']) || empty($_POST['event_day'])) {
        $errors[] = 'You forgot to enter the date of event.';
    } else {
//        $y = mysqli_real_escape_string($dbc, trim($_POST['event_year']));
//        $m = mysqli_real_escape_string($dbc, trim($_POST['event_month']));
//        $d = mysqli_real_escape_string($dbc, trim($_POST['event_day']));
        $y = htmlspecialchars($_POST['event_year']);
        $m = htmlspecialchars($_POST['event_month']);
        $d = htmlspecialchars($_POST['event_day']);
    }
    if(isset($_POST['event_status'])) {
        
        $status = mysqli_escape_string($dbc, trim("Completed"));
        // Set "activation_status" to 1.
    } else { 
        $status = mysqli_escape_string($dbc, trim("Ongoing"));
        // Set "activation_status" to 0.
    }
	
    // DOB
    if (empty($_POST['XSC']) || empty($_POST['XSL']) || empty($_POST['SC']) || empty($_POST['SL']) || empty($_POST['MC']) || empty($_POST['ML']) || empty($_POST['LC']) || empty($_POST['LL']) || empty($_POST['XLC']) || empty($_POST['XLL'])) {
		$errors[] = 'You forgot to enter the shirt measurements.';
	} else {
        $XSC = mysqli_real_escape_string($dbc, trim($_POST['XSC']));
        $XSL = mysqli_real_escape_string($dbc, trim($_POST['XSL']));
        $SC = mysqli_real_escape_string($dbc, trim($_POST['SC']));
        $SL = mysqli_real_escape_string($dbc, trim($_POST['SL']));
        $MC = mysqli_real_escape_string($dbc, trim($_POST['MC']));
        $ML = mysqli_real_escape_string($dbc, trim($_POST['ML']));
        $LC = mysqli_real_escape_string($dbc, trim($_POST['LC']));
        $LL = mysqli_real_escape_string($dbc, trim($_POST['LL']));
        $XLC = mysqli_real_escape_string($dbc, trim($_POST['XLC']));
        $XLL = mysqli_real_escape_string($dbc, trim($_POST['XLL']));
	}
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		
        // Make the query:
        $q = "UPDATE vending.shirtsize SET Event_Name='$n', Event_Location='$l', event_day='$d', event_month='$m', event_year='$y', XSC='$XSC', XSL='$XSL', SC='$SC', SL='$SL', MC='$MC', ML='$ML', LC='$LC', LL='$LL', XLC='$XLC', XLL='$XLL', org_name='$name', event_status='$status' WHERE event_id = '$event_id';";      
        $q .= "UPDATE vending.BPP SET Event_Name='$n' WHERE event_id = '$event_id';";
        $q .= "UPDATE vending.CSM SET Event_Name='$n' WHERE event_id = '$event_id';";
        $q .= "UPDATE vending.OneKMM SET Event_Name='$n' WHERE event_id = '$event_id';";
        $q .= "UPDATE vending.VN SET Event_Name='$n' WHERE event_id = '$event_id';";
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
        <p>You are now registered. You may now log into your account!</p><p><br /></p>';
		exit();
		
	 
                         
        } // End of if ($r) IF.
        
	
	mysqli_close($dbc); // Close the database connection.

}
error_reporting(0); 
// End of the main Submit conditional.
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Event Register</title>
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
 
      <link rel="stylesheet" href="css/style3.css">
 
</head>
    <body >
          <script>
function onBlur(el) {
    if (el.value == '') {
        el.value = el.defaultValue;
    }
}

</script>
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Edit Event Details</h1>
       </div> 
	<div class="container">

</script>
        <form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">

 <p>&nbsp;</p>
        <h4>Event Name:</h4>
        
          <input type="text" name="Event_Name" value="<?php echo $Event_Name;?>" onblur="onBlur(this, <?php echo "'$Event_Name'";?>)" class="width75"/>
		  
 <p>&nbsp;</p>
        <h4>Event Location:</h4>
            
		  <input type="text" name="Event_Location" value="<?php echo $location;?>" onblur="onBlur(this, <?php echo "'$location'";?>)" class="width75"/>
		  
  <p>&nbsp;</p>   
<div class="row">
      <div class="col-half">  
		<h4>Date of Event</h4>
    <select name="event_day" id="RegistrationForm_day">
<option value="<?php echo $day;?>" selected="selected"><?php echo $day;?></option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
                          <?php 
 if ($month == '01'){
     $mm = 'January';
 } else if ($month == '02'){
     $mm = 'February';
 } else if ($month == '03'){
     $mm = 'March';
 } else if ($month == '04'){
     $mm = 'April';
 } else if ($month == '05'){
     $mm = 'May';
 } else if ($month == '06'){
     $mm = 'June';
 } else if ($month == '07'){
     $mm = 'July';
 } else if ($month == '08'){
     $mm = 'August';
 } else if ($month == '09'){
     $mm = 'September';
 } else if ($month == '10'){
     $mm = 'October';
 } else if ($month == '11'){
     $mm = 'November';
 } else if ($month == '12'){
     $mm = 'December';
 }?>
<select  name="event_month" id="RegistrationForm_month">
<option value="<?php echo $month;?>" selected="selected"><?php echo $mm;?></option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>                                                
<select  name="event_year" id="RegistrationForm_year">
<option value="<?php echo $year;?>" selected="selected"><?php echo $year;?></option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
</select>
</div>
    </div>
                         
 <p>&nbsp;</p>
 <h4>Ongoing/Completed:</h4>
<label class="switch">
  <input name = "event_status" type="checkbox" value="1" <?php echo ($status=='Completed')?'checked':'' ;?>>
  <span class="slider round"></span>
</label>
 
<p>&nbsp;</p>

            <h4>SHIRT CHEST WIDTH (INCHES):</h4>
            <table style="width:100%">
  <tr>
    <th>XS</th>
    <th>S</th> 
    <th>M</th>
      <th>L</th>
    <th>XL</th>
  </tr>
  <tr>
<td><input type="text" name="XSC" value="<?php echo $EXSC;?>" onblur="onBlur(this, <?php echo "'$EXSC'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="SC" value="<?php echo $ESC;?>" onblur="onBlur(this, <?php echo "'$ESC'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="MC"  value="<?php echo $EMC;?>" onblur="onBlur(this, <?php echo "'$EMC'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="LC" value="<?php echo $ELC;?>" onblur="onBlur(this, <?php echo "'$ELC'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="XLC" value="<?php echo $EXLC;?>" onblur="onBlur(this, <?php echo "'$EXLC'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
  </tr>
</table>
                     
 <p>&nbsp;</p>
            
            <h4>SHIRT APPAREL LENGTH (INCHES):</h4>
            <table style="width:100%">
  <tr>
    <th>XS</th>
    <th>S</th> 
    <th>M</th>
      <th>L</th>
    <th>XL</th>
  </tr>
  <tr>
    <td><input type="text" name="XSL" value="<?php echo $EXSL;?>" onblur="onBlur(this, <?php echo "'$EXSL'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="SL" value="<?php echo $ESL;?>" onblur="onBlur(this, <?php echo "'$ESL'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="ML" value="<?php echo $EML;?>" onblur="onBlur(this, <?php echo "'$EML'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="LL" value="<?php echo $ELL;?>" onblur="onBlur(this, <?php echo "'$ELL'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="XLL" value="<?php echo $EXLL;?>" onblur="onBlur(this, <?php echo "'$EXLL'";?>)" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
  </tr>
</table>
                     
 <p>&nbsp;</p>
            
          <p><input type="submit" name="submit" value="Update" /></p>
        
        </p>

        <p>&nbsp;</p>

       



      </form>
        <?php
            if (!empty($errors)) { // Report the errors.
     
        echo '<h1 style="color: #FF0000;">Error!</h1>
        <p class="error" style="color: #FF0000;">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p style="color: #FF0000;">Please try again.</p><p><br /></p>';
          
    } ?>
        </div>
    </body>
</html>
