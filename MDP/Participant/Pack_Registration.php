<?php
session_start(); // Starting Session

define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");
// Make connection to MySQL database            
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
//include ('mysqli_connect.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$qu = "Select event_id, Event_Name from vending.RE WHERE user_id = '$user_id'";
$res = mysqli_query($connection, $qu);
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include ('mysqli_connect.php');
    $errors = array(); // Initialize an error array.
    // Check for a first name:
    if (empty($_POST['event_id'])) {
        $errors[] = 'Please select an event.';
    } else {
        $event_id = mysqli_real_escape_string($dbc, trim($_POST['event_id']));
    }
    if (empty($_POST['pickup_location'])) {
        $errors[] = 'Please enter pickup location.';
    } else {
        $pickup_location = mysqli_real_escape_string($dbc, trim($_POST['pickup_location']));
    }

    if (empty($_POST['size'])) {
        $errors[] = 'Please select a shirt size.';
    } else {
        $shirtsize = mysqli_real_escape_string($dbc, trim($_POST['size']));
    }
    if (empty($_POST['bottle_color'])) {
        $errors[] = 'Please select a bottle color.';
    } else {
        $bottle_color = mysqli_real_escape_string($dbc, trim($_POST['bottle_color']));
    }

    if (empty($errors)) {
        DEFINE('DB_USER', 'sqldev');
        DEFINE('DB_PASSWORD', 'Kevinpook@123');
        DEFINE('DB_HOST', 'localhost');
        DEFINE('DB_NAME', 'vending');
// Make connection to MySQL database
        $connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
        $status = "SELECT $shirtsize FROM vending.$pickup_location WHERE $shirtsize != 0 AND event_id=$event_id;";
        $check = mysqli_query($connection, $status);

        while ($row2 = mysqli_fetch_array($check)) {
            $Event_Name = $row2['Event_Name'];
            $i++;
        };

        if ($i > 0) {
            $q = "INSERT INTO vending.reserve(event_id, user_id, email, Event_Name, shirt_size, bib_number, bottle_color, pickup_location,collected)
        SELECT event_id, user_id, email, Event_Name, '$shirtsize', bib_number, '$bottle_color', '$pickup_location', 'N' from vending.RE WHERE user_id = '$user_id'AND event_id='$event_id';";

            $r = mysqli_query($dbc, $q); // Run the query.
        } 
        else {
            ?>  
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

                    <link rel="stylesheet" href="css/style2.css">
                </head>
                <body>
                   <?php include "navbarParticipant.php";?>
                    <div class="header" >
                        <h1>Pack Reservation</h1>
                    </div> 
                    <div class="container">            
                <?php
        echo '<h2>Sorry! The shirt size you have selected is currently not available at ' . $pickup_location . '!</h2>';
        echo '<h3>Shirt sizes availability can be checked <a href="StockStatus.php">here</a></h3>';
        }
        
        }?>
                          </div>  </body>
                </html>
                <?php

        if ($r) { // If it ran OK.
            DEFINE('DB_USER', 'sqldev');
            DEFINE('DB_PASSWORD', 'Kevinpook@123');
            DEFINE('DB_HOST', 'localhost');
            DEFINE('DB_NAME', 'vending');
            $connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
            $update = "UPDATE vending.$pickup_location SET $shirtsize=($shirtsize -1) WHERE event_id = $event_id";
            $updated = mysqli_query($connection, $update);
            ?>
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

                    <link rel="stylesheet" href="css/style2.css">
                </head>
                <body>
                <?php include "navbarParticipant.php";?>
                    <div class="header" >
                        <h1>Pack Reservation</h1>
                    </div> 
                    <div class="container">
            <?php
            echo '<h1>Thank you for the reservation!</h1>';
            echo '<p>Your pack has been reserved. Happy running!</p>';
    echo "<a href='home.php'<button type='button' class='btn btn-success' id='right-panel-link'>Return to home page</button></a>";
            //if ($updated) {
              //  echo '<h1>DB updated</h1>';
            //} else {
             //   echo '<h1>Error</h1>';
              //  echo '<p>' . mysqli_error($connection) . '<br /><br />Query: ' . $update . '</p>';
            //}
            ?>
                    </div>  </body>
            </html>
                        <?php
                    }

                    mysqli_close($dbc); // Close the database connection.
                    exit();
                }
                mysqli_close($dbc); // Close the database connection.
            
            error_reporting(0);
            ?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Pack Registration</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="css/style3.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include "navbarParticipant.php";?>
        <div class="header" >
            <h1>Pack Reservation</h1>
        </div> 
        <div class="container">
            <form id="cont" action="" method="post" onsubmit="return configForm(this);" style="position: relative; z-index: 1;">
                <div class="row">

                    <h4>List of Registered Events:</h4>
                    <select name='event_id' style="width: 75%;">        
<?php
while ($row = $res->fetch_assoc()) {
    unset($id, $name);
    $id = $row['event_id'];
    $name = $row['Event_Name'];
    echo '<option value="' . $id . '">' . $name . '</option>';
}
?>
                    </select>

                </div>
                <div class="row">
                    <h4>Pickup location</h4>
                    <select name="pickup_location" required>
                        <option value="" selected="selected">Pickup Location</option>
                        <option value="BPP">Bukit Panjang Plaza</option>
                        <option value="CSM">City Square Mall</option>
                        <option value="OneKMM">OneKM Mall</option>
                        <option value="VN">Velocity @Novena</option>
                    </select> 
                </div>

                <div class="row">
                    <h4>Shirt size confirmation:</h4>
                    <div class="input-group">
                        <input type="radio" name="size" value="XS" id="size-xs"/>
                        <label for="size-xs" style = "width: 15%;">XS</label>
                        <input type="radio" name="size" value="S" id="size-s"/>
                        <label for="size-s" style = "width: 15%;">S</label>
                        <input type="radio" name="size" value="M" id="size-m"/>
                        <label for="size-m" style = "width: 15%;">M</label>
                        <input type="radio" name="size" value="L" id="size-l"/>
                        <label for="size-l" style = "width: 15%;">L</label>
                        <input type="radio" name="size" value="XL" id="size-xl"/>
                        <label for="size-xl" style = "width: 15%;">XL</label>
                    </div>
                </div>

                <div class="row">
                    <h4>Water bottle selection</h4>
                    <select name="bottle_color" required>
                        <option value="" selected="selected">Bottle Color</option>
                        <option value="White">Red</option>
                        <option value="Black">Grey</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">White</option>
                    </select> 

<?php
if (isset($_POST['size'])) {
    echo "selected size: " . htmlspecialchars($_POST['size']);
}
?>
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
