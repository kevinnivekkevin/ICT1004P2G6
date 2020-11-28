<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
}
$config = parse_ini_file('/var/www/private/db-config.ini');
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

//they can only confirm the collection of the shirts they have not collected for
$result = $connection->query("Select Event_Name, event_id from vending.reserve WHERE user_id=$user_id AND collected='N'");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Simulation</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style3.css">
    </head>
    <body>

        <main class="container">

            <div class="header" >
                <h1>Collection Simulation</h1>
            </div> 
            <form id="contact" method="post" action="Process_Simulation.php">
                <h4 class="header4">Collection details</h4>
            <div class="row">
                <select name="Events" id="Events" aria-label="Registered Events" required>
                    <option selected="selected" value= "Events" >Uncollected Packs</option>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $Event_Name = $row['Event_Name'];
                        $event_id = $row['event_id'];
                        echo '<option value=' . $event_id . '>' . $Event_Name . '</option>';
                    }
                    ?>  
                </select>
            </div>
            </br>
            <div class="row">
                    <input type="text" id="Bibnumber" required name="Bibnumber" maxlength=10 placeholder="Enter Bib Number for Registered Event" 
                           aria-label="Bibnumber for registered event">
                </div>
            </br>
            <div class="row">
          <input type="submit" name="submit" value="Collected" id="Collected" aria-label="Collected Button"/>      
      </div>
            
            </form>
    </main>
</body>
</html>