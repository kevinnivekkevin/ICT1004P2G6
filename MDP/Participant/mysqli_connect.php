<?php # Script 9.2 - mysqli_connect.php
//
//// This file contains the database access information. 
//// This file also establishes a connection to MySQL, 
//// selects the database, and sets the encoding.
//
//// Set the database access information as constants:
//DEFINE ('DB_USER', 'sqldev');
//DEFINE ('DB_PASSWORD', 'Kevinpook@123');
//DEFINE ('DB_HOST', 'localhost');
//DEFINE ('DB_NAME', 'vending');
//
//// Make the connection:
//$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
//// Set the encoding...
//mysqli_set_charset($dbc, 'utf8');

//<?php # Script 9.2 - mysqli_connect.php
$config = parse_ini_file('/var/www/private/db-config.ini');    
// Make connection to MySQL database
$dbc = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
?>