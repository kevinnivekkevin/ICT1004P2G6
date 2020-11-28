                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['username'];
   $dob_day = $_SESSION['dob_day'];
   $dob_month = $_SESSION['dob_month'];
   $dob_year = $_SESSION['dob_year'];
   $gender = $_SESSION['gender'];
   $email = $_SESSION['email'];
   $first_name = $_SESSION['first_name'];
   $last_name = $_SESSION['last_name'];
   $regdate = $_SESSION['regdate'];
   $bloodtype = $_SESSION['bloodtype'];
} 
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
    $errors = array(); // Initialize an error array.
 
    // Check for a first name:
    if (empty($_POST['first_name'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }
     
    // Check for a last name:
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }
     
    // Check for an email address:
    if ($_POST['email']=="E-mail") {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
 
    // DOB
    if (empty($_POST['dob_year']) || empty($_POST['dob_month']) || empty($_POST['dob_day'])) {
        $errors[] = 'You forgot to enter your date of birth.';
    } else {
        $y = mysqli_real_escape_string($dbc, trim($_POST['dob_year']));
        $m = mysqli_real_escape_string($dbc, trim($_POST['dob_month']));
        $d = mysqli_real_escape_string($dbc, trim($_POST['dob_day']));
    }
        if (empty($_POST['gender'])) {
        $errors[] = 'You forgot to enter your gender.';
    } else {
        $g = mysqli_real_escape_string($dbc, trim($_POST['gender']));
    }
    if (empty($_POST['bloodtype'])) {
        $errors[] = 'You forgot to enter your blood type.';
    } else {
        $b = mysqli_real_escape_string($dbc, trim($_POST['bloodtype']));
    }
     
    if (empty($errors)) 
    { 
        $q = "UPDATE vending.acc SET first_name = '$fn' , last_name = '$ln', email = '$e', dob_day = '$d', dob_month = '$m', dob_year = '$y', gender = '$g', bloodtype='$b' WHERE user_id = '$user_id';";      
        $r = mysqli_query ($dbc, $q); // Run the query.
        if ($r) 
        {
            DEFINE('DB_USER', 'sqldev');
            DEFINE('DB_PASSWORD', 'Kevinpook@123');
            DEFINE('DB_HOST', 'localhost');
            DEFINE('DB_NAME', 'vending');

// Make the connection:
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error());
            mysqli_set_charset($dbc, 'utf8');
            //$pass = sha1($password);
            
            $result = mysqli_query($dbc, 'SELECT * from vending.acc where user_id = ' . $user_id . '');
            while ($row = mysqli_fetch_array($result)) 
            {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $dob_day = $row['dob_day'];
                $dob_month = $row['dob_month'];
                $dob_year = $row['dob_year'];
                $gender = $row['gender'];
                $email = $row['email'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $bloodtype = $row['bloodtype'];
                $regdate = $row['registration_date'];
            }
            if (mysqli_num_rows($result) == 1) {
                session_destroy();
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['dob_day'] = $dob_day;
                $_SESSION['dob_month'] = $dob_month;
                $_SESSION['dob_year'] = $dob_year;
                $_SESSION['gender'] = $gender;
                $_SESSION['email'] = $email;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['bloodtype'] = $bloodtype;
                $_SESSION['regdate'] = $regdate;

                header('Location: home.php');
    } 
    
    else {
        $error = "Account is invalid!";
    }
    mysqli_close($dbc);
            // Print a message:
            echo '<h1>Thank you!</h1>
        <p>Your account has been updated!</p><p><br /></p>';  
         
        } else { // If it did not run OK.
             
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
  <title>Profile Edit</title>
   
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
</script>
    
<?php include "navbarParticipant.php"?>
    
    <div class="header" >
	<h1>Edit profile</h1>
       </div> 
<div class="container">

  <form id="contact" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
    
        <div class="row">
      <h4>Personal Information</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="first_name" value="<?php echo $first_name;?>" onblur="onBlur(this, <?php echo "'$first_name'";?>)"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="last_name" value="<?php echo $last_name;?>" onblur="onBlur(this, <?php echo "'$last_name'";?>)"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="email" value="<?php echo $email;?>" onblur="onBlur(this, <?php echo "'$email'";?>)"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
    </div>
     
     
    <div class="row">
      <div class="col-half">
        <h4>Date of Birth</h4>
    <select name="dob_day" id="RegistrationForm_day" aria-label="Day of Date of Birth">
<option value="<?php echo $dob_day;?>" selected="selected"><?php echo $dob_day;?></option>
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
          <?php 
 if ($dob_month == '01'){
     $month = 'January';
 } else if ($dob_month == '02'){
     $month = 'February';
 } else if ($dob_month == '03'){
     $month = 'March';
 } else if ($dob_month == '04'){
     $month = 'April';
 } else if ($dob_month == '05'){
     $month = 'May';
 } else if ($dob_month == '06'){
     $month = 'June';
 } else if ($dob_month == '07'){
     $month = 'July';
 } else if ($dob_month == '08'){
     $month = 'August';
 } else if ($dob_month == '09'){
     $month = 'September';
 } else if ($dob_month == '10'){
     $month = 'October';
 } else if ($dob_month == '11'){
     $month = 'November';
 } else if ($dob_month == '12'){
     $month = 'December';
 }?>
<select  name="dob_month" id="RegistrationForm_month" aria-label="Month of Date of Birth">
    <option value="<?php echo $dob_month;?>" selected="selected"><?php echo $month;?></option>
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
<select  name="dob_year" id="RegistrationForm_year" aria-label="Year of Date of Birth">
<option value="<?php echo $dob_year;?>" selected="selected"><?php echo $dob_year;?></option>
<option value="">Year</option>
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
<option value="<?php echo $gender;?>" selected="selected"><?php echo $gender;?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
    </select>
            </div>
     <div class="row">

      <h4>Blood Type</h4>
    <select required name="bloodtype" id="bloodtype" aria-label="Bloodtype">
<option value="<?php echo $bloodtype;?>" selected="selected"><?php echo $bloodtype;?></option>
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
      <br/>
    <div class="input-group">
          <input type="submit" name="submit" value="Update" id="update"/>      
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