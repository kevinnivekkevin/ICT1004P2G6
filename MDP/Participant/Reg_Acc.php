                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.
 
$page_title = 'Register';
 
 
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
    $errors = array(); // Initialize an error array.
     
if (empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['pass1'])) 
        
        {
$errors[] = 'Username or Password is invalid';
} 

else 
{
    $un = mysqli_real_escape_string($dbc, trim($_POST['username']));
}  

    // Check for a first name:
    if (empty($_POST['first_name'])) {
        //$errorMsg .= "Your first name is required.<br>";
        $errors[] = 'Your first name is required.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }
     
    // Check for a last name:
    if (empty($_POST['last_name'])) {
        //$errorMsg .= "Your last name is required.<br>";
        $errors[] = 'Your last name is required.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }
     
    // Check for an email address:
    if ($_POST['email']=="E-mail") 
    {
        //$errorMsg .= "Your email is required.<br>";        
        $errors[] = 'Your email address is required.';
    } 
    else 
    {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        // Additional check to make sure e-mail address is well-formed.
        if (!filter_var($e, FILTER_VALIDATE_EMAIL))
        {
            $errors[]= "Invalid email format.<br>";
        }
        
    }
    
     if ($_POST['bloodtype']=="bloodtype") {
        //$errorMsg.="Your bloodtype is required";
        $errors[] = 'Your bloodtype is required.';
    } 
    else 
    {
        $b = mysqli_real_escape_string($dbc, trim($_POST['bloodtype']));
    }
 
    // DOB
    if (empty($_POST['dob_year']) || empty($_POST['dob_month']) || empty($_POST['dob_day'])) {
        $errors[] = 'Your date of birth is required.';
    } else {
        $y = mysqli_real_escape_string($dbc, trim($_POST['dob_year']));
        $m = mysqli_real_escape_string($dbc, trim($_POST['dob_month']));
        $d = mysqli_real_escape_string($dbc, trim($_POST['dob_day']));
    }
        if (empty($_POST['gender'])) {
        //$errorMsg .= 'You forgot to enter your gender.';
        $errors[] = 'Your gender is required.';
    } else {
        $g = mysqli_real_escape_string($dbc, trim($_POST['gender']));
    }
    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass'])) {
        if ($_POST['pass'] != $_POST['pass1']) {
            //$errorMsg.='Your password did not match the confirmed password.';
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
            $p = password_hash($p, PASSWORD_DEFAULT);
        }
    } else {
        //$errorMsg.='You forgot to enter your password.';
        $errors[] = 'A password is required.';
    }

    if (empty($errors)) 
    { // If everything's OK.
     
        // Register the user in the database...
         
        // Make the query:
        $q = "INSERT INTO vending.acc (first_name, last_name, username, email, dob_day, dob_month, dob_year, gender, pass, bloodtype,registration_date) VALUES ('$fn', '$ln', '$un', '$e', '$d', '$m', '$y', '$g','$p', '$b', NOW() )";      
        $r = mysqli_query ($dbc, $q); // Run the query.
        if ($r) { ?>

            <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    
    <div class="header"  >
	<h1>Account Registration</h1>
        </div>
    <div class="container">
            <?php // If it ran OK.
         
            // Print a message:
            echo '<h1>Thank you!</h1>
        <p>You are now registered. You may now log into your account <a href="Login.php">here</a>!</p><p><br /></p>';  
         ?>
    </div></div>  </body>
            </html>
        <?php
        
        } 
        else { // If it did not run OK.
             
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
             
            // Debugging message:
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
                         
        } // End of if ($r) IF.
         
        mysqli_close($dbc); // Close the database connection.
  
        exit();
         
    } 
     
    mysqli_close($dbc); // Close the database connection.
 
} // End of the main Submit conditional.>
error_reporting(0);?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
 
      <link rel="stylesheet" href="css/style3.css">
 
   
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
    <main>
    <div class="header"  >
	<h1>Account Registration</h1>
       </div> 
<div class="container">

  <form id="contact" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">

         <div class="row">
             <h4>Personal Information</h4>
            <div class="input-group input-group-icon">
                <input class="form-control" type="text" id="fname"
                       name="first_name" placeholder="Enter first name" aria-label="First Name">
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>    
             
             <div class="input-group input-group-icon">
                <input class="form-control" type="text" id="lname" required name="last_name" maxlength=45 placeholder="Enter last name" aria-label="Last Name">
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
             
             <div class="input-group input-group-icon">
                <input class="form-control" type="email" required id="email" name="email"
                       placeholder="Enter email" aria-label="Email">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
      </div>
 <div class="row">
      <div class="col-half">
        <h4>Date of Birth</h4>
    <select required name="dob_day" id="RegistrationForm_day" aria-label="Day for Date Of Birth">
<option value="">Day</option>
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
<select required name="dob_month" id="RegistrationForm_month" aria-label="Month of Date of Birth">
<option value="">Month</option>
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
<select required name="dob_year" id="RegistrationForm_year" aria-label="Year of Date of Birth">
<option value="">Year</option>
<option value="2017">2020</option>
<option value="2017">2019</option>
<option value="2017">2018</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
</select>     
</div>
</div>         
        
        <div class="row">

      <h4>Gender</h4>
    <select required name="gender" id="gender" aria-label="Gender">
<!--<option value="" selected="selected">Gender</option>-->
<option value="">Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
    </select>
            </div>
      <div class="row">

      <h4>Blood Type</h4>
    <select required name="bloodtype" id="bloodtype" aria-label="Bloodtype">
<!--<option value="" selected="selected">Gender</option>-->
<option value="">Blood Type</option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
    </select>
      </div>
	  
      <h4>Login Details</h4>
      
      <div class="input-group input-group-icon">
       <input class="form-control" type="text" required id="username" name="username" placeholder="Username" aria-label="Username"> 
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      
      <div class="input-group input-group-icon">
        <input class="form-control" type="password" required id="pass" name="pass" placeholder="Password" aria-label="Password"> 
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      
      <div class="input-group input-group-icon">
        <input class="form-control" type="password" required id="pass1" name="pass1" placeholder="Confirm Password" aria-label="Confirm Password"> 
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      
 <div class="row">
     
      <h4>Terms and Conditions</h4>
      
      <div class="input-group">
        <input class="form-control" type="checkbox" required id="terms"/>
        <label for="terms">I accept the <a href="https://singaporemarathon.com/rules-regulations/#STRUNSCSM.html" id="terms-link">
                terms and conditions</a> for signing up to this service, and hereby confirm I have read the privacy policy.</label>
          
        </div>
</div>
      <div class="row">
          <input type="submit" name="submit" value="Register" id="register" aria-label="Register Button"/>      
      </div>
            
        </form>
          
</div>
    </main>
</body>
</html>