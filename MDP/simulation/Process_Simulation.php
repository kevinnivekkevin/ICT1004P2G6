<?php

$Event_Name = $bib_number = $errorMsg = "";
$success = true;

// Only process if the form has been submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["Events"]))
    {
        $errorMsg .= "Please select an event you registered.<br>";
        $success = false;
    }
    else
    {
        $Event_Name = $_POST["Events"];
    }
    
    if (empty($_POST["Bibnumber"]))
    {
        $errorMsg .= "Please enter your bib number for the registered event.<br>";
        $success = false;
    }
    else
    {
        $bib_number = $_POST["Bibnumber"];
    }
    
    if ($success)
    {
        collection();
    }
}
else 
{
    echo "<h2>This page is not meant to be run directly.</h2>";
    echo "<p> You can register at the link below:</P>";
    echo "<a href='Simulation.php'>Go to Simulation page.</a>";
    exit();
}

function collection()
{   
    global $Event_Name, $bib_number, $errorMsg, $success;
    $config = parse_ini_file('/var/www/private/db-config.ini');
$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

$checking="Select user_id from vending.reserve WHERE bib_number=$bib_number AND event_id=$Event_Name";
$result = mysqli_query($connection,$checking);
 while ($row2 = mysqli_fetch_array($result)) {
            $i++;
        };
    if($result && $i>0)
    {
        $update="UPDATE vending.reserve SET collected = 'Y' WHERE bib_number=$bib_number AND event_id='$Event_Name'";
        $updated = mysqli_query($connection, $update);
        if($updated)
        {
            include "Simulation_Succeed.php";
        }
        else
        {
            include "Simulation_Failure.php";
        }
    }
    else
    {
        include "Simulation_Failure.php";
    }
    // Check connection
    if ($conn->connect_error)
    {
    $errorMsg = "Connection failed: " . $conn->connect_error;
    $success = false;
    }
    
  $connection->close();
}
?>