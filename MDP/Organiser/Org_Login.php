<?php 

if(isset ($_POST['login'])){

$config = parse_ini_file('/var/www/private/db-config.ini');    
// Make the connection:
$dbc = mysqli_connect ($config['servername'], $config['username'], $config['password'], $config['dbname']) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($dbc, 'utf8');
$username = $_POST['Username'];
$password = $_POST['Password1'];

$pass_result = mysqli_query($dbc, 'SELECT * from vending.org where username = "'.$username.'"');
while ($row = mysqli_fetch_array($pass_result)) {
    $hash_pass = $row['pass'];
    }
if(password_verify($password, $hash_pass)){
    $result = mysqli_query($dbc, 'SELECT * from vending.org where username = "'.$username.'"');
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $company_name = $row['company_name'];
        $address = $row['address'];
        $postal_code = $row['postal_code'];
        $phone = $row['phone'];
        $regdate = $row['registration_date'];
    }
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['address'] = $address;
        $_SESSION['postal_code'] = $postal_code;
        $_SESSION['company_name'] = $company_name;
        $_SESSION['phone'] = $phone;
        $_SESSION['registration_date'] = $regdate;
        header('Location: home1.php');
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

      <link rel="stylesheet" href="css/style4.css">
</head>
<body>
      <script>
function onBlur(el) {
    if (el.value == '') {
        el.value = el.defaultValue;
    }
}
function onFocus(el) {
    if (el.value == el.defaultValue) {
        el.value = '';
    }
}
</script>
    
    <div class="header" >
	<h1>Admin Login</h1>
       </div> 
    <div class="container">
	<div class="row" >
	<h2 style="color: #f00;"> <?php echo $error; ?></h2>
       </div>
<form method="post">
    
	
	<div class="row">
      <h4>Login</h4>
        </div>
        <div class="row">
      <div class="input-group input-group-icon">
        <input type="text" name="Username" value="Username" onfocus="onFocus(this, 'Username');" onblur="onBlur(this, 'Username')"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" name="Password1" value="Password1" onfocus="onFocus(this, 'Password1');" onblur="onBlur(this, 'Password1')"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
	<br/><br/>
        </div>
	<input type="submit" name="login" value="Submit"/><br/><br/>
	
		
</form>
        <p>
  		Not yet a member? <a href="Org_Acc.php">Sign up</a>
  	</p>
       

</div>
</body>

</html>
