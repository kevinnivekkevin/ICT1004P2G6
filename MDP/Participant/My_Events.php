<?php
    session_start();
    if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   }
define("MYSQLUSER", "sqldev");
define("MYSQLPASS", "Kevinpook@123");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vending");

$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

    error_reporting(0);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Events</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    
    
<?php include "navbarParticipant.php"?>
    
    <div class="header" >
	<h1>My Events</h1>
       </div> 
        <div class="container">
    
	
    <?php
        
        $result = $connection->query("Select event_id, shirt_size, bib_number from vending.RE WHERE user_id = $user_id;");
         
                    while ($row = $result->fetch_assoc()) {

                        unset($id, $size, $bn);
                        $id = $row['event_id'];
                        $size = $row['shirt_size']; 
                        $bn = $row['bib_number'];
                        $i += 1;
                        $r = $connection->query("Select * from vending.shirtsize WHERE event_id = $id;");
                        while ($row1 = $r->fetch_assoc()) {
                            unset($name, $day, $month, $year, $venue);
                            $name   = $row1['Event_Name']; 
                            $day    = $row1['event_day'];
                            $month  = $row1['event_month'];
                            $year   = $row1['event_year'];
                            $venue  = $row1['Event_Location'];
                  }
   echo "<script>
    $('#p" . $i . "').hide();

    $(document).ready(function () {
        $('#" . $i . "').click(function () {
            $('#p" . $i . "').toggle();
            if ( $.trim( $(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ( $.trim( $(this).text()) === 'Less') {
        $(this).text('More');        
    }
        });
    });


</script>";
?>
                   <div class="row" style="margin-top:20px;">
                      <h4 style=" font-size:22px; margin-bottom:5px; max-width: 80%;"><?php echo $name; ?></h4><button id="<?php echo $i;?>" style=" padding:1px; margin-top:5px; margin-bottom:5px; margin-left: 90%; float: right;">More</button><br/><br/><hr/><h3 id="p<?php echo $i;?>" style="display: none; margin-top:0px; margin-bottom:0px; ">Date: <?php echo $day; ?> / <?php echo $month; ?> / <?php echo $year; ?><br/>Venue: <?php echo $venue; ?><br/>Shirtsize: <?php echo $size; ?><br/>Bib number: <?php echo $bn; ?><a href="QR.php?id=<?php echo $id;?>&user=<?php echo $user_id;?>" style="float: right;">QR code</a></h3>
                       <hr>
</div>
<?php           
}?>

        
        </div>
        
    </body>
</html>

