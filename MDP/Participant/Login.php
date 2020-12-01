<?php 

if(isset ($_POST['login'])){
    
$config = parse_ini_file('/var/www/private/db-config.ini');    
// Make the connection:
$dbc = mysqli_connect ($config['servername'], $config['username'], $config['password'], $config['dbname']) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($dbc, 'utf8');
$username = $_POST['Username'];
$password = $_POST['Password'];

$pass_result = mysqli_query($dbc, 'SELECT * from vending.acc where username = "'.$username.'"');
while ($row = mysqli_fetch_array($pass_result)) {
    $hash_pass = $row['pass'];
    }
if(password_verify($password, $hash_pass)){
    $result = mysqli_query($dbc, 'SELECT * from vending.acc where username = "'.$username.'"');
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $dob_day = $row['dob_day'];
        $dob_month = $row['dob_month'];
        $dob_year = $row['dob_year'];
        $gender = $row['gender'];
        $email = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $regdate = $row['registration_date'];
        $bloodtype = $row['bloodtype'];
    }
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['dob_day'] = $dob_day;
        $_SESSION['dob_month'] = $dob_month;
        $_SESSION['dob_year'] = $dob_year;
        $_SESSION['gender'] = $gender;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['regdate'] = $regdate;
        $_SESSION['bloodtype'] = $bloodtype;

        header('Location: home.php');
        }
}else {
        $error = "Username or Password incorrect";
    }
    mysqli_close($dbc);
}
    error_reporting(0);
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    
    <div class="header" >
	<h1>Participant Login</h1>
       </div> 
    <div class="container">
	<div class="row" >
	<h2 style="color: #f00;"> &nbsp;<?php echo $error ?></h2>
       </div>
<form method="post">
    
	
        <div class="row">
            <h2>Login</h2>
        </div>
        <div class="row">
      <div class="input-group input-group-icon">
          <input type="text" name="Username" required maxlength="45" placeholder="Username" aria-label="Username"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
          <input type="password" name="Password" required maxlength="45" placeholder="Password" aria-label="Password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
	<br/><br/>
        </div>
	<input type="submit" name="login" value="Submit" aria-label="Submit" style="background-color: #1569C7;color: white;"/><br/><br/>
	
		
</form>
        <p>Not yet a member? <a href="Reg_Acc.php">Sign up</a></p>
        <p>Are you an admin? <a href="/MDP/Organiser/Org_Login.php">Login here</a></p>
       

</div>
</body>

</html>
