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

      <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<?php include "navbarParticipant.php"?>
    <div class="header" >
	<h1>Shirt Size Recommender</h1>
       </div> 
    <div class="container">
<form method="get">
    <div class="row">
	
	<h4>List of Events:</h4>
    <select name='event_id'><?php while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['event_id'];
                  $name = $row['Event_Name']; 
                  echo '<option value="'.$id.'">'. $name .'</option>';
                 
}?></select>
	<br/><br/>
        </div>
	<h4>Chest width (Inches):</h4> <input type="text" name="cw" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"><br/><br/>
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
</body>

</html>
