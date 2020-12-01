<?php 
session_start();
$id = $_GET['id'];
$user_id = $_GET['user'];
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

$query = "SELECT shirt_size, bib_number FROM vending.RE WHERE user_id = $user_id AND event_id = $id;";
  $result = mysqli_query($connection, $query);
 while ($row = mysqli_fetch_array($result)) {
                        $size = $row['shirt_size']; 
                        $bn = $row['bib_number'];
                        $q = "Select * from vending.shirtsize WHERE event_id = $id;";
                        $r =  mysqli_query($connection, $q);
                        while ($row1 = mysqli_fetch_array($r)) {
                            $name   = $row1['Event_Name']; 
                            $day    = $row1['event_day'];
                            $month  = $row1['event_month'];
                            $year   = $row1['event_year'];
                            $venue  = $row1['Event_Location'];
                  }         
}
    ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style3.css">
</head>
<body>

      <div class="navbar">
  <a style="width: 19%;" href="home.php">Home</a>
  <a style="width: 22%;" href="Shirtsize.php">Shirt Size</a>
  <a style="width: 24%;" href="StockStatus.php">Stock Status</a>
  <a style="width: 35%;" href="Reg_Partic.php">Participant Register</a>
</div>
    <div class="header" >
	<h1>QR Code</h1>
       </div> 
    <div class="container">
         
  
        <h4 style="font-size: 25px; text-align: center;"><?php echo $name;?></h4>
        <div class="row">
	<img src="css/qr.jpg" alt="QR code" height="80%" width="80%" style="margin-left: auto; margin-right: auto; display: block;">
                </div>
        <div class="row">
        <h4 style="font-size: 25px; text-align: center;">Event Details</h4>
            <h3 style="text-align: center;">Venue: <?php echo $venue;?><br/>
                Date: <?php echo $day;?> / <?php echo $month;?> / <?php echo $year;?><br/>
                Bib Number: <?php echo $bn;?><br/>
                Shirtsize: <?php echo $size;?></h3>
       
       
	
        

</div>
    

        
        </div>
</body>

</html>

