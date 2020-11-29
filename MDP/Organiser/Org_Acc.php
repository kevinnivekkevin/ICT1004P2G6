<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
    $errors = array(); // Initialize an error array.
     
if ($_POST['username'] == "Username") {
$errors[] = 'You forgot to enter your username.';
} else {
//    $un = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $un = htmlspecialchars($_POST['username']);
}  

 
    // Check for a first name:
    if (empty($_POST['company_name'])) {
        $errors[] = 'You forgot to enter company name.';
    } else {
//        $cn = mysqli_real_escape_string($dbc, trim($_POST['company_name']));
        $cn = htmlspecialchars($_POST['company_name']);
    }
	
	// Check for a first name:
    if (($_POST['company_phone']=="Company Phone")) {
        $errors[] = 'You forgot to enter company phone.';
    } else if (!preg_match("/^[\+0-9\-\(\)\s]*$/", $_POST['company_phone'])) {
        $errors[] = "Invalid contact number.";
    } else{
//        $cp = mysqli_real_escape_string($dbc, trim($_POST['company_phone']));
        $cp = htmlspecialchars($_POST['company_phone']);
    }
     
    // Check for an email address:
    if ($_POST['company_email']=="Company E-mail") {
        $errors[] = "You forgot to enter your company's email.";
    } else {
//        $e = mysqli_real_escape_string($dbc, trim($_POST['company_email']));
        $e = htmlspecialchars($_POST['company_email']);
    }

    if ($_POST['company_address']=="Company Address") {
        $errors[] = "You forgot to enter your company's address.";
    } else {
//        $a = mysqli_real_escape_string($dbc, trim($_POST['company_address']));
        $a = htmlspecialchars($_POST['company_address']);
    }

    if ($_POST['postal_code']=="Postal Code") {
        $errors[] = "You forgot to enter your company's Postal Code.";
    } else {
//        $c = mysqli_real_escape_string($dbc, trim($_POST['postal_code']));
        $c = htmlspecialchars(trim($_POST['postal_code']));
    }
 
   
    // Check for a password and match against the confirmed password:
    
        if ($_POST['pass'] == "KrtDhSvB" && $_POST['pass1'] == "SlKFrGRw") {
            $errors[] = "You forgot to enter your password.";
        } else if ($_POST['pass'] != $_POST['pass1']) {
        $errors[] = 'Your password did not match the confirmed password.';
        } else {
//            $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
            $p = $_POST['pass'];
            $p = password_hash($p, PASSWORD_DEFAULT);
            } 
     
    if (empty($errors)) { // If everything's OK.
     
        // Register the user in the database...
         
        // Make the query:
        $q = "INSERT INTO vending.org (company_name, username, phone, email, address, postal_code, pass, registration_date) VALUES ('$cn', '$un', '$cp', '$e', '$a', '$c', '$p', NOW() )";      
        $r = mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.
         
            // Print a message:
            echo '<h1>Thank you!</h1>
        <p>You are now registered. You may now log into your account!</p><p><br /></p>';  
         
        } else { // If it did not run OK.
             
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
             
            // Debugging message:
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
                         
        } // End of if ($r) IF.
         
        mysqli_close($dbc); // Close the database connection.
  
        exit(); 
		error_reporting(0);
         
    } 
     
    mysqli_close($dbc); // Close the database connection.
 
} // End of the main Submit conditional.>?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Organiser Registration</title>
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
 
      <link rel="stylesheet" href="css/style4.css">
 
   
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
    
    <div class="header"  >
	<h1>Organiser Registration</h1>
       </div> 
<div class="container">

  <form id="contact" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
    
      
      
        
        <div class="row">
      <h4>Company Details</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="company_name" value="Company Name" onfocus="onFocus(this, 'Company Name');" onblur="onBlur(this, 'Company Name')"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
	  <div class="input-group input-group-icon">
        <input type="text" name="company_phone" value="Company Phone" onfocus="onFocus(this, 'Company Phone');" onblur="onBlur(this, 'Company Phone')"/>
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="company_email" value="Company E-mail" onfocus="onFocus(this, 'Company E-mail');" onblur="onBlur(this, 'Company E-mail')"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon" style="margin-bottom: 0px;">
        <input type="text" style=" padding-left: 140px;border-bottom-left-radius: 0px;" name="company_address" value="Company Address" onfocus="onFocus(this, 'Company Address');" onblur="onBlur(this, 'Company Address')"/>
        <div class="input-icon" style="left: 75px;"><i class="fa fa-location-arrow" style="margin-left: -70px;"></i></div>
            </div>
            <div class="input-group input-group-icon">
              <input type="text" style=" padding-left: 140px; width: 50%; border-top-left-radius: 0px; border-top-right-radius: 0px;" name="postal_code" value="Postal Code" onfocus="onFocus(this, 'Postal Code');" onblur="onBlur(this, 'Postal Code')"/>
            <div class="input-icon" style="left: 75px;"><i style="margin-left: -70px;">SINGAPORE</i></div>
            </div>
            </div>
      
     
      
<div class="row">

      <h4>Login Details</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="username" value="Username" onfocus="onFocus(this, 'Username');" onblur="onBlur(this, 'Username');"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" name="pass" value="KrtDhSvB" onfocus="onFocus(this, 'KrtDhSvB');" onblur="onBlur(this, 'KrtDhSvB');"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" name="pass1" value="SlKFrGRw" onfocus="onFocus(this, 'SlKFrGRw');" onblur="onBlur(this, 'SlKFrGRw');"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    </div>  

    <div class="input-group">
          <input type="submit" name="submit" value="Register" id="register"/>      
        </div>
 
      </form>
                      <?php  if (!empty($errors)) { // Report the errors.
     
        echo '<h1 style="color: #FF0000;">Error!</h1>
        <p class="error" style="color: #FF0000;">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p style="color: #FF0000;">Please try again.</p><p><br /></p>';
          
    } // End of if (empty($errors)) IF.?>
</div>
</body>
</html>
