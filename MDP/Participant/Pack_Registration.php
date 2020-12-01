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
        <link rel="stylesheet" href="css/style3.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="navbar">
            <a style="width: 19%;" href="home.php">Home</a>
            <a style="width: 22%;" href="Shirtsize.php">Shirt Size</a>
            <a style="width: 24%;" href="StockStatus.php">Stock Status</a>
            <a style="width: 35%;" href="Reg_Partic.php">Participant Register</a>
            <a class="active" style="width: 35%;" href="Pack_Registration.php">Pack Reservation</a>
        </div>
        <div class="header" >
            <h1>Pack Reservation</h1>
        </div> 
        <div class="container">
            <form id="cont" method="post" action="Process_Reserve.php" style="position: relative; z-index: 1;">
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
    </body>

</html>
