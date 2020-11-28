<?php
$config = parse_ini_file('/var/www/private/db-config.ini');    
// Make connection to MySQL database
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
$loggedInUsername = $_SESSION['username'];
$stockResult = $connection->query("Select * from vending.shirtsize");
$result = $connection->query("Select * from vending.shirtsize ORDER BY Event_Name ASC");
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
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Stock Status</h1>
       </div> 
<div class="container">
<form method="get" action="StockStatus1a.php">
    <div class="row">
	
	<h4>By Events:</h4>
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

    <form method="get" action="stockLocation.php">
    <div class="row">
	
	<h4>By vending machine location:</h4>
	<select name="location">
            <option value="BPP">Bukit Panjang Plaza</option>
            <option value="CSM">City Square Mall</option>
            <option value="OneKMM">OneKm Mall</option>
            <option value="VN">Velocity @ Novena Square</option>
        </select>
	</div>
	<br/><br/><br/>
	<input type="submit" name="contactForm" value="Display"/><br/><br/>	
</form>
    

    </div>
</body>

</html>