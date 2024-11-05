<?php

class Functions
{

    public $os_array = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows phone 10/i'   =>  'Windows Phone 10',
        '/windows phone 8.1/i'  =>  'Windows Phone 8.1',
        '/windows phone 8/i'    =>  'Windows Phone 8',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    public $browser_array = array(
        '/Edg/i'        =>  'Edge',
        '/Opera|OPR/i'  =>  'Opera',
        '/Chrome/i'     =>  'Chrome',
        '/Safari/i'     =>  'Safari',
        '/Firefox/i'    =>  'Firefox',
        '/MSIE/i'       =>  'Internet Explorer',
        '/Netscape/i'   =>  'Netscape',
        '/Maxthon/i'    =>  'Maxthon',
        '/Konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser'
    );


    public $isps = array(
        '/virgin media/i'     =>  'Virgin Media',
        '/bt|british telecom|britishtelecom/i'  =>  'BT',
        '/talktalk/i'         =>  'TalkTalk',
        '/skybroadband|sky/i' =>  'Sky Broadband',
        '/plusnet/i'          =>  'Plusnet',
        '/three/i'            =>  'Three',
        '/ee/i'               =>  'EE',
        '/nowtv|now tv/i'     =>  'Now TV',
        '/xlnbroadband|xln broadband/i' =>  'XLN Broadband',
        '/vodafone/i'         =>  'Vodafone',
        '/sse/i'              =>  'SSE',
        '/postoffice|post office/i' =>  'Post Office',
        '/vondage/i'          =>  'Vondage',
        '/johnlewis|john lewis/i' =>  'John Lewis',
        '/tmobile|t mobile|t-mobile/i' =>  'T-Mobile',
        '/orange/i'           =>  'Orange',
        '/tesco/i'            =>  'Tesco',
        '/tiscali/i'          =>  'Tiscali',
        '/aol/i'              =>  'AOL',
        '/tentel/i'           =>  'TenTel',
        '/myvzw/i'            =>  'Verizon Trademark Services LLC',
        '/verizon/i'          =>  'Verizon'
    );

    public $os_platform = "OS Platform not Detected.";
    public $browser = "Browser not Detected.";
    public $isp = "ISP Not Detected.";
    private $user_agent = NULL;

    //return current date time
    public function getCurrentDateTime()
    {
        return time(); // Returns the current Unix timestamp
    }




    public function getDateString($date)
    {
        $dateArray = date_parse_from_format('Y/m/d', $date);
        $monthName = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
        return $dateArray['day'] . " " . $monthName  . " " . $dateArray['year'];
    }




    public function timeAgo($datetime, $full = false)
    {

        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }







    public function getTime($time)
    {
        $date = $time;
        $dtime = new DateTime($date);
        $goodtime = $dtime->format("h:i:s");

        return $goodtime;
    }







    public function WriteToJson($path, $arraylist)
    {
        //write to json file
        $fp = fopen($path, 'w');
        fwrite($fp, json_encode($arraylist));
        fclose($fp);
    }




    public function __construct()
    {
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
    }

    public function IP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // Convert IPv6 localhost (::1) to IPv4 localhost (127.0.0.1)
        return $ip === '::1' ? '127.0.0.1' : $ip;
    }


    public function getPublicIP()
    {
        $ip = file_get_contents("https://api.ipify.org?format=text");
        return $ip ? trim($ip) : null;
    }


    public function getUserMAC()
    {
        // Check for the OS type
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows command
            $userMAC = shell_exec('getmac');
            // Handle the output to get the first MAC address
            if ($userMAC) {
                $macArray = explode("\n", $userMAC);
                return trim($macArray[0]); // Return the first MAC address found
            }
        } else {
            // Assume a Unix-like OS
            $userMAC = shell_exec("ifconfig | grep -Po 'HWaddr \K.*$'");
            // For more recent Linux distributions, you might need to use a different command
            if (empty($userMAC)) {
                $userMAC = shell_exec("ip link | grep -Po '([[:xdigit:]:]{17})'"); // Using 'ip' command
            }
            // Return the MAC address after trimming
            return trim($userMAC);
        }

        return null; // Return null if MAC address couldn't be found
    }



    public function OS()
    {
        foreach ($this->os_array as $regex => $value) {
            if (preg_match($regex, $this->user_agent)) {
                return $value;
            }
        }
        return $this->os_platform;
    }

    public function Browser()
    {
        $browser = "";
        foreach ($this->browser_array as $regex => $value) {
            if (preg_match($regex, $this->user_agent)) {
                $browser = $value;
                break;  // Stop the loop once a match is found
            }
        }
        return $browser == "" ? $this->browser : $browser;
    }
    public function BrowserVersion()
    {
        $detected = $this->Browser();
        $userAgent = $this->user_agent;
        $version = "";

        if ($detected == "Edge") {
            // Look for the Edge version
            if (preg_match('/Edg\/([0-9\.]+)/i', $userAgent, $matches)) {
                $version = $matches[1];
            }
        } elseif ($detected == "Chrome") {
            // Look for the Chrome version
            if (preg_match('/Chrome\/([0-9\.]+)/i', $userAgent, $matches)) {
                $version = $matches[1];
            }
        } elseif ($detected == "Firefox") {
            // Look for the Firefox version
            if (preg_match('/Firefox\/([0-9\.]+)/i', $userAgent, $matches)) {
                $version = $matches[1];
            }
        } elseif ($detected == "Safari") {
            // Look for the Safari version
            if (preg_match('/Version\/([0-9\.]+)/i', $userAgent, $matches)) {
                $version = $matches[1];
            }
        } elseif ($detected == "Internet Explorer") {
            // Look for the IE version
            if (preg_match('/MSIE ([0-9\.]+)/i', $userAgent, $matches)) {
                $version = $matches[1];
            }
        } elseif ($detected == "Opera") {
            // Look for the Opera version
            if (preg_match('/Opera\/([0-9\.]+)/i', $userAgent, $matches)) {
                $version = $matches[1];
            }
        }

        return $version != "" ? $version : "Version not detected";
    }


    public function GEOIP_ISP()
    {
        if (function_exists("geoip_isp_by_name")) {
            return @geoip_isp_by_name($this->IP());
        } else {
            return "GEOIP Function Fail!";
        }
    }

    public function GEOIP_Info()
    {
        if (function_exists("geoip_db_get_all_info")) {
            return geoip_db_get_all_info($this->IP());
        } else {
            return "GEOIP Function Fail!";
        }
    }

    public function Record($search = NULL)
    {
        if (function_exists("geoip_record_by_name")) {
            $record = geoip_record_by_name($this->IP());
            if ($search == NULL) {
                return $record;
            } else {
                if (array_key_exists($search, $record)) {
                    return $record[$search];
                } else {
                    return "Record Data Not Found!";
                }
            }
        } else {
            return "GEOIP Function Fail!";
        }
    }

    public function Hostname()
    {
        return gethostbyaddr($this->IP());
    }

    public function ISP()
    {
        $longisp = $this->Hostname();
        $isp = explode('.', $longisp);
        $isp = array_reverse($isp);
        $tmp = $isp[0];
        if (preg_match("/\<(org?|com?|net?|uk)\>/i", $tmp)) {
            $myisp = $isp[2] . '.' . $isp[1] . '.' . $isp[0];
        } else {
            $myisp = $isp[0];
            foreach ($this->isps as $regex => $value) {
                if (preg_match($regex, $myisp)) {
                    return $value;
                }
            }
        }
        if (preg_match("/[0-9]{1,3}\.[0-9]{1,3}/", $myisp)) {
            return $this->isp;
        }
        return $myisp;
    }

    public function isMobile()
    {
        if (preg_match('/mobile|phone|ipod/i', $this->user_agent)) {
            return true;
        } else {
            return false;
        }
    }

    public function isTablet()
    {
        if (preg_match('/tablet|ipad/i', $this->user_agent)) {
            return true;
        } else {
            return false;
        }
    }

    public function isDesktop()
    {
        if (!$this->isMobile() && !$this->isTablet()) {
            return true;
        } else {
            return false;
        }
    }

    public function isBot()
    {
        if (preg_match('/bot/i', $this->user_agent)) {
            return true;
        } else {
            return false;
        }
    }

    public function user_agent()
    {
        return $this->user_agent;
    }



    function VerifyUser($email)
    {
        global $mysqli;
        $query = "SELECT * FROM users WHERE email = '$email' ";
        $find = $mysqli->query($query);
        $userfind = $find->fetch_assoc();
        @$user = $userfind['email'];
        if ($user == $email) {
            $result = 'yes';
        } else {
            $result = 'no';
        }

        return $result;
    }


    public function getUserByEmail($mysqli, $email)
    {
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); 

        $stmt->execute();

        $result = $stmt->get_result();

        // Fetch the user data as an associative array
        if ($user = $result->fetch_assoc()) {
            return $user; // Return user data
        } else {
            return null; // Return null if no user found
        }
    }

    public function getDeviceInfo() {
        return [
            'current_user_os' => $this->OS(),
            'current_user_browser' => $this->Browser(),
            'current_user_device' => $this->isMobile() ? 'Mobile' : ($this->isTablet() ? 'Tablet' : 'Desktop'),
            'current_ip_address' => $this->IP(),
            'current_mac_address' => $this->getUserMAC(),
            'current_public_ip'     => $this->getPublicIP(),
            'current_user_browser_version' => $this->BrowserVersion(),
            'current_user_isp'              => $this->ISP(),
            'current_user_hostname'        => $this->Hostname(),
        ];
    }
    
}
