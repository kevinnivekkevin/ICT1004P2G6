<?php
session_start();
$username = $_SESSION['username'];

$config = parse_ini_file('/var/www/private/db-config.ini');    
// Make the connection:
$dbc = mysqli_connect ($config['servername'], $config['username'], $config['password'], $config['dbname']) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($dbc, 'utf8');
$chkSessionResult = mysqli_query($dbc, 'SELECT * from vending.org where username = "'.$username.'"');

//check if logged in user is admin or not
$isAdmin = false;
if (mysqli_num_rows($chkSessionResult)==1){
    $isAdmin = true;
}else{
    $isAdmin = false;
}

if (!$isAdmin){
    header('Location: accessDenied.php');
}
//while ($row = mysqli_fetch_array($pass_result)) {
//    $hash_pass = $row['pass'];
//    }
mysqli_close($dbc);
?>

<div class="navbar" style="background-color: #21b1d3;">
  <a style="width: 20%; background-color: #21b1d3;" href="/MDP/Participant/index.php">Home</a>
  <a style="width: 20%; background-color: #21b1d3;" href="home1.php">Account</a>
  <a style="width: 30%; background-color: #21b1d3;" href="Reg_Event.php">Event Register</a>
  <a style="width: 25%; background-color: #21b1d3;" href="StockStatus1.php">Stock Status</a>
  <?php echo "<p>User: "; echo $_SESSION['username']; echo "</p>";?>
</div>