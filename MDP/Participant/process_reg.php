<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CDN of javascript, nodejs and bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!--External Cascading stylesheet-->
        <link rel="stylesheet" href="css/reg.css">
        
        <!--jQuery-->
        <script defer    
        src="https://code.jquery.com/jquery-3.4.1.min.js"    
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="    
        crossorigin="anonymous">
        </script>
        
        <!--Bootstrap JS--> 
        <script defer   
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
        crossorigin="anonymous">
        </script>
        <!-- Custom JS -->
<script defer src="js/main.js"></script>
</head>
       <?php include "nav.inc.php" ?>

<body>
<?php // This script performs an INSERT query to add a record to the users table.
$page_title = 'Register';
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('mysqli_connect.php');
    
    $errors = array(); // Initialize an error array.   
//    $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));      
    $fn = htmlspecialchars($_POST['first_name']);
    // Check for a last name:
    if (empty($_POST['last_name'])) {
        $errors[] = 'last name required.';
    } else {
//        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
        $ln = htmlspecialchars($_POST['last_name']);
    }
    
     if (empty($_POST['dob_year']) || empty($_POST['dob_month']) || empty($_POST['dob_day'])) {
        $errors[] = 'You forgot to enter your date of birth.';
    } else {
//        $y = mysqli_real_escape_string($dbc, trim($_POST['dob_year']));
//        $m = mysqli_real_escape_string($dbc, trim($_POST['dob_month']));
//        $d = mysqli_real_escape_string($dbc, trim($_POST['dob_day']));
        $y = htmlspecialchars($_POST['dob_year']);
        $m = htmlspecialchars($_POST['dob_month']);
        $d = htmlspecialchars($_POST['dob_day']);
    }
    
    
    if (empty($_POST['gender'])) {
        $errors[] = 'You forgot to enter your gender.';
    } else {
//        $g = mysqli_real_escape_string($dbc, trim($_POST['gender']));
        $g = htmlspecialchars($_POST['gender']);
    }

    if (empty($_POST['blood_type'])) {
        $errors[] = 'You forgot to enter your blood type.';
    } else {
//        $g = mysqli_real_escape_string($dbc, trim($_POST['gender']));
        $bt = htmlspecialchars($_POST['blood_type']);
    }
    
    // Check for an email address:
    if ($_POST['email']=="E-mail") {
        $errors[] = 'email address required';
    } else {
//        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $e = htmlspecialchars($_POST['email']);
    }
 
    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass'])) {
        if ($_POST['pass'] != $_POST['pass1']) {
            $errors[] = 'password do not match';
        } else {
//            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
            $p = htmlspecialchars($_POST['pass1']);
            $p = password_hash($p, PASSWORD_DEFAULT);
        }
    } else {
        $errors[] = 'password required';
    }
    
//    $un = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $un = htmlspecialchars($_POST['username']);
     
    if (empty($errors)) { // If everything's OK.     
        // Register the user in the database...         
        // Make the query:
        $q = "INSERT INTO vending.acc (first_name, last_name, username, email, dob_day, dob_month, dob_year, gender, pass, blood_type,registration_date) VALUES ('$fn', '$ln', '$un', '$e', '$d', '$m', '$y', '$g', '$p','$bt',NOW() )";      
        $r = mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.         
            // Print a message:
            
        echo '<div class="container">';
        echo '<h1>Thank you for register.</h1>';
        echo '<h3>You may now log into your account!</h3><br/>';
         echo "<a href='Login.php' class='btn btn-success' type>Return to Sign In</a>";
        
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
    else
        {   
        echo '<div class="container">';
        echo "<h1>Oops!</h1>";
        echo "<h3>The following input errors were detected:</h3>";
            foreach ($errors as $msg) { // Print each error.
              echo '<span style="color:#ff3333;font-size:20px;font-weight:bold;">-'.$msg.'</span></div>';
        }
            echo "<br>";
            echo '<div class="container">';
            echo "<a href='Reg_Acc.php' class='btn btn-warning' type>Return to Sign Up</a>";
            //echo '<button type="button" class="btn btn-danger"><a href="register.php">Return to Sign Up</a></button>' ;
        }          
    mysqli_close($dbc); // Close the database connection.
} // End of the main Submit conditional.>
error_reporting(0);
?></body>


</html>

