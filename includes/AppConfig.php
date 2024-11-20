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
 


$FILE_PATH = __DIR__ . '/';

 
include_once($FILE_PATH . 'encryption_functions.php');
include_once($FILE_PATH . 'user_functions.php');
include_once($FILE_PATH . 'generalfunctions.php');
include_once($FILE_PATH . 'admin_functions.php');






$encrypt         = new Encrypt();
$User            = new User();
$functions       = new Functions();
$admin           = new Admin();




function log_messages($message) { 
  $log_file = '../system_logs/requests.log';
  $log_entry = date('Y-m-d H:i:s') . " - " . $message . "\n";
  file_put_contents($log_file, $log_entry, FILE_APPEND);
}



?>