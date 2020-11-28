<?php
#Supplier comes to the VM, to restock tshirts. Choose an event, current tshirt stock for every sizes for that event is displayed.
#After restocking, supplier enters the number of tshirts restocked for every sizes. tshirt stock is recounted
/* 
    Upon clicking option select, insert data php table to display and input
    
    PHP     table to input text; stock for every shirt size; add to current table

    CHOOSE LOCATION >> TSHIRT DISPLAY >> TSHIRT INPUT >> SUBMIT >> TSHIRT STOCK UPDATED 
    */

//define("MYSQLUSER", "sqldev");
//define("MYSQLPASS", "Kevinpook@123");
//define("HOSTNAME", "localhost");
//define("MYSQLDB", "vending");

$config = parse_ini_file('/var/www/private/db-config.ini');
//print($config['username']);

// Make connection to MySQL database
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
         $result = $connection->query("Select event_id, Event_Name from vending.shirtsize ORDER BY Event_Name ASC");
         error_reporting(0);

	         
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Stock Update</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
  <div class="navbar" style="background-color: #21b1d3;">
  <a style="width: 20%; background-color: #21b1d3;" href="home1.php">Home</a>
  <a style="width: 30%; background-color: #21b1d3;" href="Reg_Event.php">Event Register</a>
  <a style="width: 25%; background-color: #21b1d3;" href="StockStatus1.php">Stock Status</a>
  <a class="active" style="width: 25%; background-color: #ADD8E6;" href="Restocker.php">Stock Update</a>
</div>
    <div class="header" style="background-color: #21b1d3;" >
	<h1>Stock Update</h1>
       </div> 
<div class="container">
    
<form method="get" action="Restocker6a.php">
    <div class="row">
	
	<h4>Pick a Location:</h4> 
	<select name="location">
    <option value="BPP">Bukit Panjang Plaza</option>
	<option value="CSM">City Square Mall</option>
	<option value="OneKMM">OneKm Mall</option>
    <option value="VN">Velocity @ Novena Square</option></select>

        </div><div class="row">
    <h4>Pick an event:</h4> 
    <select name='event_id'><?php while ($row = $result->fetch_assoc()) {

                  unset($id, $event);
                  $id = $row['event_id'];
                  $event = $row['Event_Name']; 
                  echo '<option value="'.$id.'">'. $event .'</option>';
                 
}?></select> </div>

	<br/><br/>
	<input type="submit" name="display" value="Logistics"/><br/><br/>
</form>
       
    
<?php 
/*if ($connection->connect_error) {
  die('Connection Error: ' . $connection->connect_error);
} else {
  echo 'Successful connection to MySQL database ' . MYSQLDB . '<br />'.'<br />';
}
*/
?>

    </div>
</body>

</html>