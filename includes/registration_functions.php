<?php
require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Cookie\SetCookie;
use ipinfo\ipinfo\IPinfo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class User
{


    public function RegisterUser($mysqli, $functions, $fullname, $username, $email, $phone, $password, $width, $height)
    {

        $reg_response = $functions->VerifyUser($email);

        if ($reg_response == 'no') {
            $access_token = '2a55491f93bb4d';
            $client = new IPinfo($access_token);


            // Getting device info
            $user_os              = $functions->OS();
            $user_browser         = $functions->Browser();
            $user_device          = $functions->isMobile() ? 'Mobile' : ($functions->isTablet() ? 'Tablet' : 'Desktop');
            $user_ip              = $functions->IP();
            $public_ip            = $functions->getPublicIP();
            $user_browser_version = $functions->BrowserVersion();
            $user_isp             = $functions->ISP();
            $user_hostname        = $functions->Hostname();
            $user_is_bot          = $functions->isBot();
            $user_agent           = $functions->user_agent();
            $profile              = 'assets/images/new_user.webp';
            $status               = 'I am a new user';
            $timeRegistered       = $functions->getCurrentDateTime();
            $dateregistered       = date('Y-m-d H:i:s', $timeRegistered);
            $screen_resolution    = $width . 'x' . $height;
            $userMAC              = $functions->getUserMAC();
            $details              = $client->getDetails($public_ip);
            $hashed_password      = password_hash($password, PASSWORD_DEFAULT);


            //Write all user info to json
            $user_info = [
                'name'              => $username,
                'country_code'      => $details->country,
                'country_name'      => $details->country_name,
                'country_currency'  => $details->country_currency['code'],
                'currency_symbol'   => $details->country_currency['symbol'],
                'city'              => $details->city,
                'region'            => $details->region,
                'loc'               => $details->loc,
                'timezone'          => $details->timezone,
                'org'               => $details->org,
                'phone'             => $phone,
                'user_os'           => $user_os,
                'user_device'       => $user_device,
                'user_browser'      => $user_browser,
                'browser_version'   => $user_browser_version,
                'ISP'               => $user_isp,
                'MAC_address'       => $userMAC,
                'hostname'          => $user_hostname,
                'isBot'             => $user_is_bot,
                'user_agent'        => $user_agent,
                'ip_address'        => $user_ip,
                'time_registered'   => $timeRegistered,
                'date_registered'   => $dateregistered,
                'screen_resolution' => $screen_resolution,
            ];

            $filename = strtolower(str_replace(' ', '_', $fullname));
            $jsonFilePath = "../assets/user_data/{$filename}.json";
            $functions->WriteToJson($jsonFilePath, $user_info);


            //Creating an sql query
            $sql = "INSERT INTO users(fullname, username, phone, email, password, profile, country_code, country, status, userOS, userDevice, userBrowser, ip_address, date_registered, jsonFilePath) VALUES ('$fullname','$username','$phone','$email', '$hashed_password','$profile','$details->country','$details->country_name', '$status', '$user_os', '$user_device', '$user_browser','$user_ip','$dateregistered', '$jsonFilePath')";

            if ($mysqli->query($sql)) {
                // Handle successful registration
                echo json_encode("Registration successful");
            } else {
                // Handle registration failure
                echo json_encode("Registration failed");
            }
        } else {
            echo json_encode("User already exists");
        }
    }

    public function LoginUser($mysqli, $functions, $email, $password)
    {
        $user = $functions->getUserByEmail($mysqli, $email);

        if ($user && password_verify($password, $user['password'])) {
            // Get current device info
            $currentDeviceInfo = json_encode($functions->getDeviceInfo());

            // Check if the device is recognized
            if ($this->checkDevice($mysqli, $user['id'], $currentDeviceInfo)) {
                // Device is recognized, proceed with login
                setcookie('uid', $user['id'], [
                    'expires' => time() + (86400 * 7),
                    'path' => '/',
                    'httponly' => true,
                    'secure' => false, // Requires HTTPS(set to true during production)
                    'samesite' => 'Lax'
                ]);                
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => '2fa_required', 'message' => 'Please verify your identity. A 2FA code has been sent to your email']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }

    private function checkDevice($mysqli, $userId, $currentDeviceInfo)
    {
    
        // Retrieve user's JSON file path from the database
        $stmt = $mysqli->prepare("SELECT jsonFilePath FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    

    
        if (file_exists($row['jsonFilePath'])) {
            // Load and decode the stored JSON data
            $storedDeviceInfo = json_decode(file_get_contents($row['jsonFilePath']), true);
    
            // Check if the necessary fields exist in the stored data
            if (isset($storedDeviceInfo['user_os'], $storedDeviceInfo['user_device'], $storedDeviceInfo['ISP'], $storedDeviceInfo['hostname'])) {
                // Extract only the relevant fields for comparison
                $filteredStoredDeviceInfo = [
                    'user_os' => $storedDeviceInfo['user_os'],
                    'user_device' => $storedDeviceInfo['user_device'],
                    'ISP' => $storedDeviceInfo['ISP'],
                    'hostname' => $storedDeviceInfo['hostname'],
                ];
    
                $decodedCurrentDeviceInfo = json_decode($currentDeviceInfo, true);
                $comparisonResult = $filteredStoredDeviceInfo == $decodedCurrentDeviceInfo;
                
                
                return $comparisonResult;
            } else {
                error_log("Required fields missing in stored device info.");
            }
        } else {
            error_log("JSON file does not exist at path: " . $row['jsonFilePath']);
        }
    
        return false; // Device not recognized
    }
    
    public function sendTwoFACode($email, $name , $code)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'yawanokye99@gmail.com';
        $mail->Password = 'hywj bpqt krxp wjlp';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        $mail->setFrom('yawanokye99@gmail.com', 'Kings Naturals');
        $mail->addAddress($email);

        // Load the template and replace placeholders
        $template = file_get_contents('email_template.html');
        $body = str_replace(['{{name}}', '{{code}}'], [$name, $code], $template);
        
        $mail->isHTML(true);
        $mail->Subject = 'Your Two-Factor Authentication Code';
        $mail->Body = $body;
    
        if (!$mail->send()) {
            error_log('Mailer Error: ' . $mail->ErrorInfo);
            echo json_encode(['status' => 'error', 'message' => '2FA code could not be sent']);
        } else {
            // Generate a temporary unique ID
            $tempId = bin2hex(random_bytes(8));
    
            // Set expiration time for the 2FA code (1 minute from now)
            $expirationTime = date("Y-m-d H:i:s", strtotime("+1 minute"));
    
            $this->saveTwoFACodeToDatabase($tempId, $code, $expirationTime);
            $this->saveTempIdDatabase($tempId, $email);
    
            setcookie('temp_user', $tempId, [
                'expires' => time() + 60, 
                'path' => '/',
                'httponly' => true,
                'secure' => false, // Set to true if using HTTPS
                'samesite' => 'Lax'
            ]);
    
            echo json_encode(['status' => 'success', 'message' => '2FA sent']);
        }
    }
    
    // database function to save 2FA code
    private function saveTwoFACodeToDatabase($tempId, $code, $expirationTime)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO two_fa_codes (temp_id, two_fa_code, status, expires_at) VALUES (?, ?, ?)");
        $status = "not_verified";
        $stmt->bind_param("ssss", $tempId, $code, $status, $expirationTime);
        $stmt->execute();
        $stmt->close();
    }
    
    
    private function saveTempIdDatabase($tempId, $email)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE user SET temp_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $tempId, $email,);
        $stmt->execute();
        $stmt->close();
    }
    

    public function verifyTwoFACode($mysqli, $tempToken, $inputCode, $currentDeviceInfo)
    {
        // Retrieve the stored 2FA code and JSON file path for the user from the two_fa_codes and users tables
        $stmt = $mysqli->prepare("SELECT two_fa_code FROM two_fa_codes WHERE temp_id = ?");
        $stmt->bind_param("s", $tempToken);
        $stmt->execute();
        $result = $stmt->get_result();
        $twoFAData = $result->fetch_assoc();
    
        // Check if the input code matches the stored 2FA code
        if ($twoFAData && $twoFAData['two_fa_code'] === $inputCode) {
            // Fetch the JSON file path from the users table
            $stmt = $mysqli->prepare("SELECT jsonFilePath FROM users WHERE temp_token = ?");
            $stmt->bind_param("s", $tempToken);
            $stmt->execute();
            $result = $stmt->get_result();
            $userData = $result->fetch_assoc();
            
            if ($userData && file_exists($userData['jsonFilePath'])) {
                $jsonFilePath = $userData['jsonFilePath'];
                $jsonData = json_decode(file_get_contents($jsonFilePath), true);
    
                // Update specific fields in the JSON data
                $jsonData['user_os'] = $currentDeviceInfo['user_os'];
                $jsonData['user_device'] = $currentDeviceInfo['user_device'];
                $jsonData['ISP'] = $currentDeviceInfo['ISP'];
                $jsonData['hostname'] = $currentDeviceInfo['hostname'];
    
                // Save the updated JSON data back to the file
                file_put_contents($jsonFilePath, json_encode($jsonData));
    
                // Clear 2FA code and set status as verified
                $stmt = $mysqli->prepare("UPDATE two_fa_codes SET two_fa_code = NULL, status = ? WHERE temp_id = ?");
                $status = "verified";
                $stmt->bind_param("ss", $status, $tempToken);
                $stmt->execute();
    
                // Unset the temporary cookie
                setcookie("temp_user", "", time() - 3600, '/', '', true, true);
    
                echo json_encode(['status' => 'success', 'message' => '2FA verification successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'User data file not found']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid 2FA code']);
        }
    }
    


    public function UpdateUserLocation($mysqli, $userId, $longitude, $latitude)
    {

        $stmt = $mysqli->prepare("UPDATE users SET longitude = ?, latitude = ? WHERE id = ?");

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
        }

        $stmt->bind_param("ddi", $longitude, $latitude, $userId);

        if ($stmt->execute()) {
            echo "User location updated successfully.";
        } else {
            echo "Error updating user location: " . $stmt->error;
        }

        $stmt->close();
    }
}
