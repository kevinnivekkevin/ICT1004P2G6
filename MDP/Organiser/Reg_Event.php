<?php
$page_title = 'Event Register';
session_start(); // Starting Session
if(isset($_SESSION['user_id'])){
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
		$name = mysqli_real_escape_string($dbc, trim($_POST['Event_Name']));
	}
	
	// Check for a first name:
	if (empty($_POST['Event_Location'])) {
		$errors[] = 'Please enter event location.';
	} else {
		$location = mysqli_real_escape_string($dbc, trim($_POST['Event_Location']));
	}
	
	// DOB
    if (empty($_POST['event_year']) || empty($_POST['event_month']) || empty($_POST['event_day'])) {
        $errors[] = 'You forgot to enter the date of event.';
    } else {
        $y = mysqli_real_escape_string($dbc, trim($_POST['event_year']));
        $m = mysqli_real_escape_string($dbc, trim($_POST['event_month']));
        $d = mysqli_real_escape_string($dbc, trim($_POST['event_day']));
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
		
  $q = "INSERT INTO vending.shirtsize(Event_Name, Event_Location, event_day, event_month, event_year, XSC, XSL, SC, SL, MC, ML, LC, LL, XLC, XLL, org_name) VALUES ('$name', '$location', '$d', '$m', '$y', '$XSC', '$XSL', '$SC', '$SL', '$MC', '$ML', '$LC', '$LL', '$XLC', '$XLL', '$name');";
  $q .= "INSERT INTO vending.BPP(Event_Name, XS, S, M, L, XL) VALUES ('$name', '0', '0', '0', '0', '0');";
  $q .= "INSERT INTO vending.CSM(Event_Name, XS, S, M, L, XL) VALUES ('$name', '0', '0', '0', '0', '0');";
  $q .= "INSERT INTO vending.OneKMM(Event_Name, XS, S, M, L, XL) VALUES ('$name', '0', '0', '0', '0', '0');";
  $q .= "INSERT INTO vending.VN(Event_Name, XS, S, M, L, XL) VALUES ('$name', '0', '0', '0', '0', '0');";
    
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

 include "formSuccess.php";
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
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Event Register</h1>
       </div> 
	<div class="container">
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
        <form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">

 <p>&nbsp;</p>
        <h4>Event Name:</h4>
        
          <input type="text" name="Event_Name" value="" class="width75"/>
		  
 <p>&nbsp;</p>
        <h4>Event Location:</h4>
            
		  <input type="text" name="Event_Location" value="" class="width75"/>
		  
  <p>&nbsp;</p>   
<div class="row">
      <div class="col-half">  
		<h4>Date of Event</h4>
    <select name="event_day" id="RegistrationForm_day">
<option value="" selected="selected">Day</option>
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
<select  name="event_month" id="RegistrationForm_month">
<option value="" selected="selected">Month</option>
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
<option value="" selected="selected">Year</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
</select>
</div>
    </div>
                         
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
<td><input type="text" name="XSC" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="SC" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="MC" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="LC" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="XLC" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
  </tr>
</table>
                     
 <p>&nbsp;</p>
            
            <h4>SHIRT APPARREL LENGTH (INCHES):</h4>
            <table style="width:100%">
  <tr>
    <th>XS</th>
    <th>S</th> 
    <th>M</th>
      <th>L</th>
    <th>XL</th>
  </tr>
  <tr>
    <td><input type="text" name="XSL" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="SL" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="ML" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
    <td><input type="text" name="LL" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td> 
    <td><input type="text" name="XLL" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"/></td>
  </tr>
</table>
                     
 <p>&nbsp;</p>
            
          <p><input type="submit" name="submit" value="Register" /></p>
        
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
