<?php
$event_id=$_GET['event_id'];
$config = parse_ini_file('/var/www/private/db-config.ini');
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
$result = $connection->query("Select * from vending.RE WHERE event_id = '$event_id' ORDER BY Event_Name ASC");
     $eresult = $connection->query("Select * from vending.shirtsize WHERE event_id='$event_id'");
     while($erow = $eresult->fetch_assoc()){
     $Event_Name = $erow['Event_Name'];
     $location = $erow['Event_Location'];
     }
    error_reporting(0);

    ?>
<!DOCTYPE html> 
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Participants' Details </title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style2.css">
  
</head>

<body>
<?php include "adminNav.php"?>
    <div class="header" style="background-color: #21b1d3;" >
        <h1>Participants' Details</h1>
       </div> 
<div class="container">
    <div class="row">
      <h4>Event Name:</h4>
    <h2><?php echo "$Event_Name";?></h2>
    <h4>Event Location:</h4>
    <h2><?php echo "$location";?></h2>
    <table style="width:100%"> 
  <tr>
    <th>Bib Number</th>
    <th>Name</th> 
    <th>Date of Birth</th>
     <th>Email</th>
    <th>Shirt Size</th>
    <th>Gender</th>
  </tr>
    <?php while ($row = $result->fetch_assoc()) {

                  unset($id, $name, $day, $month, $year, $venue);
                  $id = $row['user_id'];
                  $first_name = $row['first_name']; 
                  $last_name = $row['last_name'];
                  $dob_day = $row['dob_day'];
                  $dob_month = $row['dob_month'];
                  $dob_year = $row['dob_year'];
                  $email = $row['email'];
                  $gender = $row['gender'];
                  $shirt_size = $row['shirt_size'];
                  $bib_number = $row['bib_number'];
                  ?>

        <tr>
    <th style="background-color:#DCDCDC;"><?php echo "$bib_number";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$first_name"; echo " $last_name";?></th> 
    <th style="background-color:#DCDCDC;"><?php echo "$dob_day/$dob_month/$dob_year";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$email";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$shirt_size";?></th>
    <th style="background-color:#DCDCDC;"><?php echo "$gender";?></th>
  </tr>
        <?php           
}?>
        
    </table>
    </div>
</div>
</body>
</html>