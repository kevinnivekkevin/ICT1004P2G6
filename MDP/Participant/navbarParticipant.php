<?php
//get session
session_start();
$username = $_SESSION['username'];
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="/MDP/Participant/index.php"><img class="logo" src="images/Logo.png" alt="LOGO" title="unsplash" width="100" height="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">

  <li class="nav-item"><a class="nav-link"  href="home.php">Account</a></li>
  <li class="nav-item"><a class="nav-link" href="Shirtsize.php">Shirt Size</a></li>
  <li class="nav-item"><a class="nav-link" href="Pack_Registration.php">Reservation</a></li>
  <li class="nav-item"><a class="nav-link" href="StockStatus.php">Stock status</a></li>
  <li class="nav-item"><a class="nav-link" href="Reg_Partic.php">Event register</a></li>
  <li class="nav-item"><a class="nav-link" href="myReservations.php">My Reservations</a></li>
  <?php echo "<p>User: "; echo $_SESSION['username']; echo "</p>";?>
  <button type="button" class="user-nav__dropdown-button nav-dropdown-button">
      <span class="nav-dropdown-button__item"></span>
  </button>
</div>
