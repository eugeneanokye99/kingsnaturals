<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$db       = 'kingsnaturals';


// Connect to mysql
$mysqli = new mysqli($host, $username, $password, $db);

// Check if there is any error in creating db connection.
if ($mysqli->connect_error) {
  die('Connect Error: Could not connect to database');
}
 



error_reporting(E_ALL); 
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE); 
ini_set('log_errors', TRUE);
ini_set('error_log', '../system_logs/SystemErrors.txt'); 
 
 

 
include_once('encryption_functions.php');
include_once('registration_functions.php');
include_once('generalfunctions.php');






$encrypt         = new Encrypt();
$User            = new User();
$functions       = new Functions();





?>