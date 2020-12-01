<?php
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

    $result = $connection->query("Select event_id, Event_Name from shirtsize ORDER BY Event_Name ASC");
    error_reporting(0);
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Shirt Size Recommender</title>
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
</head>
<body>
	<main>
<?php include "navbarParticipant.php"?>
    <div class="container">
        <h1>Shirt Size Recommender</h1>
<form method="get">
    <div class="row">
	
	<h4>List of Events:</h4>
    <select name='event_id' aria-label="Event List"><?php while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['event_id'];
                  $name = $row['Event_Name']; 
                  echo '<option value="'.$id.'">'. $name .'</option>';
                 
}?></select>
	<br/><br/>
        </div>
	<h4>Chest width (Inches):</h4> <input type="text" aria-label="Chest Width" name="cw" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"><br/><br/>
	<br/><br/>
	<input type="submit" name="contactForm" value="Submit"/><br/><br/>
	
		
</form>
        
<?php 
/*if ($connection->connect_error) {
  die('Connection Error: ' . $connection->connect_error);
} else {
  echo 'Successful connection to MySQL database ' . MYSQLDB . '<br />' . '<br/>';
}*/

include ("Shirtsize6a.php");
?>
</div>
	</main>
</body>

</html>
