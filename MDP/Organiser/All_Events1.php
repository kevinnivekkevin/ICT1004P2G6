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
<?php include "adminNav.php" ?>
    <div class="container">
	<h1>All Events</h1>
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
