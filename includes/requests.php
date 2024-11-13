<?php
include "AppConfig.php";


error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set('error_log', '../system_logs/errorlogs.txt');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Indicate allowed methods and headers for preflight requests
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    http_response_code(200);
    exit(0); // End the request
}


$allowed_actions = array(
    'userRequest',
);

$input = json_decode(file_get_contents('php://input'), true);



// $req_dump = print_r($input, TRUE);
// $fp = fopen('../app_sign_in.txt', 'a');
// fwrite($fp, $req_dump);
// fclose($fp);


if (isset($input['action']) && in_array($input['action'], $allowed_actions)) {
    $action = $input['action'];

    if ($action == 'userRequest') {

        if ($input['userRequest'] == 'register') {

            log_messages("Register request received: " . print_r($input, true));



            $fullname = $encrypt->decryptData($input['fullname']);
            $username = $encrypt->decryptData($input['username']);
            $email    = $encrypt->decryptData($input['email_address']);
            $phone    = $encrypt->decryptData($input['phone']);
            $password = $encrypt->decryptData($input['pass']);
            $width    = $input['width'];
			$height   = $input['height'];

            $User->RegisterUser($mysqli, $functions, $fullname, $username, $email, $phone, $password, $width, $height);
        }
        else if ($input['userRequest'] == 'login') {

                        
            log_messages("Login request received: " . print_r($input, true));

            
            $email    = $encrypt->decryptData($input['emailAddress']);
            $password = $encrypt->decryptData($input['pass']);

            $User->LoginUser($mysqli, $functions, $email, $password);
        }
        else if ($input['userRequest'] == 'update_location'){

            log_messages("Location update request received: " . print_r($input, true));

            
            $longitude  = $input['longitude'];
            $latitude   = $input['latitude'];
            $userId     = $encrypt->decryptUserId($input['userId']);

            $User->UpdateUserLocation($mysqli, $userId, $longitude, $latitude);
        }
        else if ($input['userRequest'] == 'verify'){

            log_messages("Verification request received: " . print_r($input, true));

            
            $code      = $encrypt->decryptData($input['verification_code']);

            $User->verifyTwoFACode($mysqli, $userId, $code, json_encode($functions->getDeviceInfo()));
        }
        else if ($input['userRequest'] == 'send2FA'){

            log_messages("2FA request received: " . print_r($input, true));

            
            $email      = $encrypt->decryptData($input['email']);
            $twoFACode = rand(100000, 999999); 
            $name      = "User";

            $User->sendTwoFACode($email, $name, $twoFACode);
        }
    }
}

?>