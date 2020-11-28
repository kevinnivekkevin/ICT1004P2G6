<?php
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

// Make connection to MySQL database
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

    $result = $connection->query("Select * from shirtsize ORDER BY Event_Name ASC");
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
<?php include "navbarParticipant.php"?>
    <div class="header" >
	<h1>Stock Status</h1>
       </div> 
<div class="container">
<form method="get" action="StockStatus6a.php">
    <div class="row">
	
	<h4>List of Events:</h4>
    <select name='event_id'><?php while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['event_id'];
                  $name = $row['Event_Name']; 
                  echo '<option value="'.$id.'">'. $name .'</option>';
                 
}?></select>
	</div>
	<br/><br/><br/>
	<input type="submit" name="contactForm" value="Display"/><br/><br/>	

</form>
       
    

    </div>
</body>

</html>