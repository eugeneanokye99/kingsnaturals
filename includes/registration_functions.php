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
                setcookie('uid', $user['id'], time() + (86400 * 7), '/');
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                // Device not recognized, initiate 2FA
                $twoFACode = rand(100000, 999999); // Generate a 6-digit code
                $this->sendTwoFACode($email, $twoFACode);

                // Store 2FA code in session or database temporarily for verification
                $_SESSION['twofa_code'] = $twoFACode;
                $_SESSION['twofa_user'] = $user['id'];
                echo json_encode(['status' => '2fa_required', 'message' => 'Please verify your identity. A 2FA code has been sent to your email.']);
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

        if ($row && file_exists($row['jsonFilePath'])) {
            $storedDeviceInfo = file_get_contents($row['jsonFilePath']);
            return ($storedDeviceInfo === $currentDeviceInfo);
        }
        return false; // Device not recognized
    }

    public function sendTwoFACode($email, $code)
    {
        require 'PHPMailer/PHPMailerAutoload.php';

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

        $mail->isHTML(true);
        $mail->Subject = 'Your Two-Factor Authentication Code';
        $mail->Body    = 'Your 2FA code is: ' . $code;

        if (!$mail->send()) {
            echo json_encode(['status' => 'error', 'message' => '2FA code could not be sent.']);
        }
    }


    public function verifyTwoFACode($mysqli, $userId, $inputCode, $currentDeviceInfo)
    {
        if ($_SESSION['twofa_code'] === $inputCode && $_SESSION['twofa_user'] === $userId) {
            // Update device info in JSON file
            $stmt = $mysqli->prepare("SELECT jsonFilePath FROM users WHERE id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row && file_exists($row['jsonFilePath'])) {
                file_put_contents($row['jsonFilePath'], $currentDeviceInfo);
            }

            // Clear 2FA session data
            unset($_SESSION['twofa_code']);
            unset($_SESSION['twofa_user']);

            echo json_encode(['status' => 'success', 'message' => '2FA verification successful.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid 2FA code.']);
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
