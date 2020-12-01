<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$event_id = $pickup_location = $shirtsize = $bottle_color = $errorMsg = "";
$success = true;

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include ('mysqli_connect.php');
    
    // Check for a first name:
    if (empty($_POST['event_id'])) {
        $errorMsg .= 'Please select an event.';
        $success=false;
    } 
    else {
        $event_id = $_POST['event_id'];
    }
    if (empty($_POST['pickup_location'])) {
        $errorMsg .= 'Please enter pickup location.';
        $success=false;
    } else {
        $pickup_location = $_POST['pickup_location'];
    }

    if (empty($_POST['size'])) {
        $errorMsg .= 'Please select a shirt size.';
        $success=false;
    } else {
        $shirtsize = $_POST['size'];
    }
    if (empty($_POST['bottle_color'])) {
        $errorMsg .= 'Please select a bottle color.';
        $success=false;
    } else {
        $bottle_color = $_POST['bottle_color'];
    }

    if ($success) 
    {
    
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

// Make connection to MySQL database            
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
        
        $status = "SELECT $shirtsize FROM vending.$pickup_location WHERE $shirtsize != 0 AND event_id=$event_id;";
        $check = mysqli_query($connection, $status);
        
        
        //check if user reserved for the event already
        $reserved = "SELECT $event_id FROM vending.reserve WHERE user_id = $user_id  AND event_id=$event_id;";
        $reservecheck = mysqli_query($connection, $reserved);
         while ($row3 = mysqli_fetch_array($reservecheck)) {
            $reserveresult = $row3['Event_Name'];
            $j++;
        };
        
        if($j == 1)
        {
            include "Pack_Registration_Duplicate.php";
        }
        while ($row2 = mysqli_fetch_array($check)) {
            $Event_Name = $row2['Event_Name'];
            $i++;
        };

        if ($i > 0) 
        {
            $q = "INSERT INTO vending.reserve(event_id, user_id, email, Event_Name, shirt_size, bib_number, bottle_color, pickup_location,collected)
        SELECT event_id, user_id, email, Event_Name, '$shirtsize', bib_number, '$bottle_color', '$pickup_location', 'N' from vending.REE WHERE user_id = '$user_id'AND event_id='$event_id';";

            $r = mysqli_query($dbc, $q); // Run the query.
        } 
        else 
        {
        include "Pack_Registration_Fail.php";
        echo '<h2>Sorry! The shirt size '. $shirtsize .'you have selected is currently not available at ' . $pickup_location . '!</h2>';
        echo '<h3>Shirt sizes availability can be checked <a href="StockStatus.php">here</a></h3>';
        } 

        if ($r) { // If it ran OK.
            define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");
            $connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
            $update = "UPDATE vending.$pickup_location SET $shirtsize=($shirtsize -1) WHERE event_id = $event_id";
            $updated = mysqli_query($connection, $update);
            include "Pack_Registration_web.php";
           
          
                    }
    }
                    mysqli_close($dbc); // Close the database connection.
                    exit();
                }
                ?>
