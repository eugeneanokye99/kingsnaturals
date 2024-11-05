<?php
include "AppConfig.php";


error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set('error_log', '../system_logs/errorlogs.txt');

$allowed_actions = array(
    'userRequest',
);


// $req_dump = print_r($_REQUEST, TRUE);
// $fp = fopen('../app_sign_in.txt', 'a');
// fwrite($fp, $req_dump);
// fclose($fp);


if (isset($_POST['action']) && in_array($_POST['action'], $allowed_actions)) {
    $action = $_POST['action'];

    if ($action == 'userRequest') {

        if ($_POST['userRequest'] == 'sign_up') {

            $fullname = $encrypt->decryptData($_POST['name']);
            $username = $encrypt->decryptData($_POST['username']);
            $email    = $encrypt->decryptData($_POST['email']);
            $phone    = $encrypt->decryptData($_POST['phone']);
            $password = $encrypt->decryptData($_POST['pass']);
            $width    = $_POST['width'];
			$height   = $_POST['height'];

            $User->RegisterUser($mysqli, $functions, $fullname, $username, $email, $phone, $password, $width, $height);
        }
        else if ($_POST['userRequest'] == 'login') {

                        
			$req_dump = print_r($_REQUEST, TRUE);
			$fp = fopen('../system_logs/sign_in.txt', 'a');
			fwrite($fp, $req_dump);
			fclose($fp);

            $email    = $encrypt->decryptData($_POST['email']);
            $password = $encrypt->decryptData($_POST['pass']);

            $User->LoginUser($mysqli, $functions, $email, $password);
        }
        else if ($_POST['userRequest'] == 'update_location'){
            $longitude  = $_POST['longitude'];
            $latitude   = $_POST['latitude'];
            $userId     = $encrypt->decryptUserId($_POST['userId']);

            $User->UpdateUserLocation($mysqli, $userId, $longitude, $latitude);
        }
    }
}

?>