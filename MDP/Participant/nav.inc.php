<?php
include ('mysqli_connect.php');
$result = mysqli_query($dbc, 'SELECT * from vending.org');
                        

?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<a class="navbar-brand" href="logo"><img class="logo" src="images/Logo.png" alt="LOGO" title="unsplash" width="100" height="60"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Events
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item" href="/MDP/Participant/index.php#event1">Standard Chartered</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/MDP/Participant/index.php#event1">Osim Sundown</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/MDP/Participant/index.php#event2">Garmin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/MDP/Participant/index.php#event2">Home Team NS</a>
          </div>
        </li>
            <li class="nav-item"><a class="nav-link" href="/MDP/Participant/Reg_Acc.php">Sign Up</a></li>
            <li class="nav-item"><a class="nav-link" href="/MDP/Participant/About_Us.php">About Us</a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
            <?php
                session_start();
                $username = $_SESSION['username'];                
                if (is_null($username)){
                    echo '<a class="nav-link" href="Login.php">Login</a>';
                }else{                    
                    //check if admin or normal user
                    $isAdmin = false;                    
                    while ($row = mysqli_fetch_array($result)) {
                        if ($username == $row['username']){
                            $isAdmin = true;
                        }
                    }
                    //if admin, redirect to admin home page
                    if ($isAdmin){
                        //if admin
                        echo '<a class="nav-link" href="/MDP/Organiser/home1.php">';echo $username; echo '</a>';                                                
                    //if not admin, redirect participant home page
                    }else{
                        //if not admin
                        echo '<a class="nav-link" href="home.php">';echo $username; echo '</a>';   
                    }                 
                }
            ?></a>
            </li>
            <li class="nav-item">
                <?php
                if(is_null($username)){
                }else{
                    echo '<a class="nav-link" href="logout.php">Logout</a>';
                }
                ?>
            </li>
        </ul>
    </div>
</nav>



