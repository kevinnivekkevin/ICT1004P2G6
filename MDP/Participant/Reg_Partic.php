<?php
session_start(); // Starting Session
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");
// Make connection to MySQL database
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

$qu = "Select event_id, Event_Name from shirtsize ORDER BY Event_Name ASC";
$res = mysqli_query($connection, $qu);

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include ('mysqli_connect.php');
    $errors = array(); // Initialize an error array.
    // Check for a first name:
    if (empty($_POST['event_id'])) {
        $errors[] = 'Please enter event name.';
    } else {
        $event_id = mysqli_real_escape_string($dbc, trim($_POST['event_id']));
    }


    if (empty($errors)) {
        DEFINE('DB_USER', 'sqldev');
        DEFINE('DB_PASSWORD', 'Kevinpook@123');
        DEFINE('DB_HOST', 'localhost');
        DEFINE('DB_NAME', 'vending');
// Make connection to MySQL database
        $connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
        $query = "SELECT Event_Name FROM vending.shirtsize WHERE event_id = $event_id ;";
        $result = mysqli_query($connection, $query);
        while ($row2 = mysqli_fetch_array($result)) {
            $Event_Name = $row2['Event_Name'];
        };
    # Need at least one row for code below to work
    $que = "SELECT IFNULL(MAX(bib_number),5000) FROM vending.RE;";
   
    $re = mysqli_query($connection, $que);
    while ($row1 = mysqli_fetch_array($re)) {
    $bib = $row1['IFNULL(MAX(bib_number),5000)'];
    $bib += 1;
    }
    
        if ($result) {
        $q = "INSERT INTO vending.RE (user_id, first_name, last_name, email, dob_day, dob_month, dob_year, gender, shirt_size, event_id, Event_Name, bib_number)
        SELECT user_id, first_name, last_name, email, dob_day, dob_month, dob_year, gender, '$shirtsize', '$event_id', '$Event_Name', '$bib' from vending.acc WHERE user_id = $user_id;";
        $r = mysqli_query ($dbc, $q); // Run the query.
        }

        if ($r) { ?>
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <title>My Events</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
                    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="css/style3.css">
                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <!-- Custom JS-->
                <script defer src="js/main.js"></script>
                </head>
                <body>
            <?php include "navbarParticipant.php"?>
                    
                    <div class="container">
                        <h1>Pack Reservation</h1>
            <?php
            echo '<h1>Thank you for registering for ' . $Event_Name . '!</h1>';
            echo '<h2>Click <a href="Pack_Registration.php">here</a> to reserve your shirt and water bottle for collection!</h2>';
            echo '<p>See you there and happy running!</p>';
    echo "<a href='home.php'<button type='button' class='btn btn-success' id='right-panel-link'>Return to home page</button></a>";
            ?>
                    </div>  </body>
            </html>
            <?php
        }else { // If it did not run OK.
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

            // Debugging message:

            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
        }

        mysqli_close($dbc); // Close the database connection.

        exit();
    }
    mysqli_close($dbc); // Close the database connection.
}
error_reporting(0);
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
    <body>
    <?php include "navbarParticipant.php"?>
        <div class="header" >
            <h1>Register for event</h1>
        </div> 
        <div class="container">
            <form id="cont" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
                <div class="row">

                    <h4>List of Events:</h4>
                    <select name='event_id' style="width: 75%;" aria-label="Event List"><?php
while ($row = $res->fetch_assoc()) {

    unset($id, $name);
    $id = $row['event_id'];
    $name = $row['Event_Name'];
    echo '<option value="' . $id . '">' . $name . '</option>';
}
?></select></div>
               <div class="row">

                    <h4>Payment Details:</h4>
                    <div class="input-group" >
                        <input type="radio" name="payment-method" value="card" id="payment-method-card" checked="checked"/>
                        <label for="payment-method-card" style="width: 50%;"><span><i class="fa fa-cc-visa"></i>Credit Card</span></label>

                        <input type="radio" name="payment-method" value="paypal" id="payment-method-paypal"/>
                        <label for="payment-method-paypal" style="width: 50%;"> <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
                    </div>
                    <div class="input-group input-group-icon" >
                        <input type="text" placeholder="Card Number" aria-label="Card Number"/>
                        <div class="input-icon"><i class="fa fa-credit-card"></i></div>
                    </div>

                    <div class="col-half" style = "padding-right: 0px;">
                        <div class="input-group input-group-icon" >
                            <input type="text" placeholder="Card CVC" aria-label="Card CVC"/>
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="input-group"> 
                            <select style = "width: 50%;" aria-label="Card Expiry Month"> 
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                            <select style = "width: 50%;" aria-label="Card Expiry Year">
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                                <option>2027</option>
                            </select>
                        </div>
                    </div>
                </div> 
                <input type="submit" name="contactForm" value="Submit"/><br/><br/>

            </form>
<?php
if (!empty($errors)) { // Report the errors.
    echo '<h1 style="color: #FF0000;">Error!</h1>
        <p class="error" style="color: #FF0000;">The following error(s) occurred:<br />';
    foreach ($errors as $msg) { // Print each error.
        echo " - $msg<br />\n";
    }
    echo '</p><p style="color: #FF0000;">Please try again.</p><p><br /></p>';
} // End of if (empty($errors)) IF.
?>

        </div>
    </body>

</html>
