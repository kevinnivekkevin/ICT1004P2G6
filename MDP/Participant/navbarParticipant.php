<?php
//get session
session_start();
$username = $_SESSION['username'];
?>
<div class="navbar">
  <a style="width: 19%;" href="index.php">Home</a>
  <a style="width: 19%;" href="home.php">Account</a>
  <a style="width: 22%;" href="Shirtsize.php">Shirt Size</a>
  <a style="width: 24%;" href="Pack_Registration.php">Reservation</a>
  <a style="width: 24%;" href="StockStatus.php">Stock status</a>
  <a style="width: 35%;" href="Reg_Partic.php">Event register</a>
  <a style="width: 35%;" href="myReservations.php">My Reservations</a>
  <?php echo "<p>User: "; echo $_SESSION['username']; echo "</p>";?>
</div>
