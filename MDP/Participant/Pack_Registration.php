<?php
session_start(); // Starting Session
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

// Make connection to MySQL database            
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$qu = "Select event_id, Event_Name from REE WHERE user_id = '$user_id'";
$res = mysqli_query($connection, $qu);

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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style3.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <main>
        <?php include "navbarParticipant.php";?>
        
        <div class="container">
            <h1>Pack Reservation</h1>
            <form id="cont" method="post" action="Process_Reserve.php" style="position: relative; z-index: 1;">
                <div class="row">

                    <h4>List of Registered Events:</h4>
                    <select name='event_id' style="width: 75%;" aria-label="Event selection">        
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
                    <select name="pickup_location" required aria-label="Pickup location">
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
                    <select name="bottle_color" required aria-label="Bottle Color">
                        <option value="" selected="selected">Bottle Color</option>
                        <option value="White">White</option>
                        <option value="Black">Black</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
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
        </main>
    </body>

</html>
