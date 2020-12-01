<?php
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

session_start();
$user_id = $_SESSION['user_id'];

// Make connection to MySQL database
$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);            
    $result = $connection->query("Select * from vending.reserve where user_id = '$user_id'");    
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>My Reservations</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
<?php include "navbarParticipant.php"?>
<div class="header" >
    <h1>My Reservations</h1>
</div> 
<div class="container"> 
    <?php
    
    if (is_null($result)==false){
        echo '<h3> You have no reservations. </h3>';
    }else{?>
    <table style="width:100%">
        <tr>
            <th style="width:20%"> Event name </th>
            <th style="width:20%"> Shirt size </th>
            <th style="width:20%"> Bottle color </th>
            <th style="width:20%"> Pickup location </th>
            <th style="width:20%"> Bib number </th> 
            <th style="width:20%"> Collected </th>
        </tr>
    <?php while ($row = $result->fetch_assoc()) {
        $name = $row['Event_Name']; 
        $shirtsize = $row['shirt_size']; 
        $bc = $row['bottle_color']; 
        $pl = $row['pickup_location'];
        $bib = $row['bib_number'];
        $collected = $row['collected'];
    ?>    
        <tr>        
            <td style="background-color:#DCDCDC;"><?php echo $name?></td>
            <td style="background-color:#DCDCDC;"><?php echo $shirtsize?></td>
            <td style="background-color:#DCDCDC;"><?php echo $bc?></td>
            <td style="background-color:#DCDCDC;"><?php echo $pl?></td>               
            <td style="background-color:#DCDCDC;"><?php echo $bib?></td>
            <td style="background-color:#DCDCDC;"><?php echo $collected?><tr>
        </tr>   
    <?php }}?>
    </table>
</div>
</body>

</html>