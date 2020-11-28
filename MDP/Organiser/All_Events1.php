<?php
$config = parse_ini_file('/var/www/private/db-config.ini');

$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

    $result = $connection->query("Select * from vending.shirtsize ORDER BY Event_Name ASC");
    error_reporting(0);
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Events</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#p1').hide();
    $('#p2').hide();
    $('#p3').hide();
    $('#p4').hide();
    $('#p5').hide();
    $('#p6').hide();
    $('#p7').hide();
    $('#p8').hide();
    $('#p9').hide();
    $('#p10').hide();
    $(document).ready(function () {
        $("#1").click(function () {
            $("#p1").toggle();
            if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
        });
    });

    $(document).ready(function () {
        $("#2").click(function () {
            $("#p2").toggle();
            if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
        });
    });

    $(document).ready(function () {
        $("#3").click(function () {
            $("#p3").toggle();
            if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More'); 
               
    }
        });
    });

    $(document).ready(function () {
        $("#4").click(function () {
            $("#p4").toggle();
            if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
        });
    });

    $(document).ready(function () {
        $("#5").click(function () {
            $("#p5").toggle();
            if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
        });
    });


    $(document).ready(function () {
        $("#6").click(function () {
            $("#p6").toggle();
            if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
        });
    });

    $(document).ready(function(){
    $("#7").click(function(){
   $("#p7").toggle();
   if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
    });
});


    $(document).ready(function(){
    $("#8").click(function(){
   $("#p8").toggle();
   if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
    });
});


    $(document).ready(function(){
    $("#9").click(function(){
   $("#p9").toggle();
   if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
    });
});

    $(document).ready(function(){
    $("#10").click(function(){
   $("#p10").toggle();
   if ($.trim($(this).text()) === 'More') {
        $(this).text('Less');
    }

    else if ($.trim($(this).text()) === 'Less') {
        $(this).text('More');        
    }
    });
});
    
 

</script>
      <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<?php include "adminNav.php" ?>
    <div class="header" style="background-color: #21b1d3;">
	<h1>All Events</h1>
       </div> 
    <div class="container">
    <?php while ($row = $result->fetch_assoc()) {

                  unset($id, $name, $day, $month, $year, $venue, $event_status, $org);
                  $id = $row['event_id'];
                  $name = $row['Event_Name']; 
                  $day = $row['event_day'];
                  $month = $row['event_month'];
                  $year = $row['event_year'];
                  $venue = $row['Event_Location'];
                  $org = $row['org_name'];
                  $event_status = $row['event_status'];
                  ?>
        
                   <div class="row" style="margin-top: 20px;">
                       
                       <h4 style=" font-size:22px; margin-bottom:5px; max-width: 80%; "><a href="participants.php?event_id=<?php echo $id; ?>"><?php echo $name; ?></a></h4>
                       <h2>Status of events: <?php echo $event_status; ?></h2>
                           <button id="<?php echo $id;?>" 
                                   style=" margin-top:5px; margin-bottom:5px; margin-left: 90%; float: right;">More</button><br/>
                              <h3 id="p<?php echo $id;?>" style="display: none; margin-top:0px; margin-bottom:0px; ">
                                  Date: <?php echo $day; ?> / <?php echo $month; ?> / <?php echo $year; ?><br/>
                                  Venue: <?php echo $venue; ?><br/>
                                  Organised by: <?php echo $org; ?><br/><br/>
                                  <form method ="get" action = "edit_event.php">
                                    <button type="submit" name="event_id" value="<?php echo $id;?>"style="float: left;">Edit Event</button>
                                </form>
                                  <?php if($event_status == "Completed"){
                                      ?>
                                  <form method ="get" action = "clear_stock.php">
                                    <button type="submit" name="event_id" value="<?php echo $id;?>"style="float: left;">Clear Stock</button>
                                </form>
                                  <?php
                                  }
                                  ?>
                                  <br/><br/></h3>
                              
                              <br/>
                                
                              <!--<button onclick="onclickRedirect()">Edit Event</button>
                                <script>
                                    function onclickRedirect(){
                                    window.location.href = "edit_event.php?event_id=<?php #echo $id ?>";
                                    }

                                    </script>--><hr>      
                    </div>
            <br/><br/>
<?php           
}?>

        
        </div>
</body>

</html>
