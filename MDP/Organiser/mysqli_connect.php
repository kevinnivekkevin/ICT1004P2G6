<?php # Script 9.2 - mysqli_connect.php
$config = parse_ini_file('/var/www/private/db-config.ini');    
// Make connection to MySQL database
$dbc = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
?>