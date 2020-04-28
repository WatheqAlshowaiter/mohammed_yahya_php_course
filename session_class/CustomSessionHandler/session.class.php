<?php
// for debugging purposes
function pre($var)
{

    if (is_array($var)) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    } else {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}

function pred($var)
{
    pre($var);
    die;
}

///////////////////////////////////

define('SESSSION_SAVE_PATH', dirname(realpath(__FILE__) . DIRECTORY_SEPARATOR . 'sesssions'));
class AppSessionHandler extends SessionHandler
{
    private $sessionName  = 'MYAPPSESS';
    private $sesssionMaxLifeTime  = 0;
    private $sessionSSL = false;
    private $sessionHTTPOnly = true;
    private $sessionPath = 'sessions/';
    // private  $sessionDomain = '.phpdev.com'; // needs custom domain
    private  $sessionDomain = 'localhost.'; // maybe all domains
    private $sessionSavePath = SESSSION_SAVE_PATH;

    // NOTE: MCRYPT* function are DEPRECATED and should be replaced with valid function
    private $sessionCipherAlgo = MCRYPT_BLOWFISH;
    private $sessionCipherMode = MCRYPT_MODE_ECB;
    private $sessionCipherKey   = 'WYCRYPT0K3Y@2020'; // 16 characters

    private $ttl = 1;

    public function __construct()
    {
        // important configurations to make sure they work correctly
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', "files");

        session_name($this->sessionName);
        session_save_path($this->sessionPath);
        session_set_cookie_params(
            $this->sesssionMaxLifeTime,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
        session_set_save_handler($this, true);
    }

    public function __get($key)
    {
        return false !== $_SESSION[$key] ? $_SESSION[$key] : false;
    }
    public function __set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    public function read($id)
    {
        // decrypt session data 
        return mcrypt_decrypt($this->sessionCipherAlgo, $this->sessionCipherKey, parent::read($id), $this->sessionCipherMode);
    }
    public function write($id, $data)
    {
        // encrypt sesstion data
        // NOTE: MCRYPT* function are DEPRECATED and should be replaced with valid function
        return parent::write($id, mcrypt_encrypt($this->sessionCipherAlgo, $this->sessionCipherKey, $data, $this->sessionCipherMode));
    }

    public function start()
    {
        if ('' === session_id()) {
            if (session_start()) {
                $this->setSessionStartTime();
            }
        }
    }

    private function setSessionStartTime()
    {
        if (!isset($this->sessionStartTime)) {
            $this->sessionStartTime = time();
        }
        return true;
    }
    private function checkSessionValidity()
    {
        if ((time() - $this->sessionStartTime) > ($this->ttl * 60)) {
            $this->renewSession();
            $this->generateFingerPrint(); 
        } else {
            return true;
        }
    }

    private function renewSession()
    {
        $this->SessionStartTime = time();
        return session_regenerate_id(true);
    }

    public function kill()
    {
        session_unset();
        setcookie(
            $this->sessionName,
            '',
            time() - 1000,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
        session_destroy();
    }

    private function generateFingerPrint()
    {
        $userAgentId = $_SERVER['HTTP_USER_AGENT'];
        $this->cipherKey = mcrypt_create_iv(16);
        $sessionId = session_id();
        $this->fingerPrint = md5($userAgentId . $this->cipherKey . $sessionId);
    }


    public function isValidFingerPrint()
    {
        if (!isset($this->fingerPrint)) {
            $this->generateFingerPrint();
        }
        $fingerPrint = md5($_SERVER['HTTP_USER_AGENT'] .  $this->cipherKey . session_id());
        if ($fingerPrint === $this->$fingerPrint) {
            return true;
        }
        return false;
    }
}

$session = new AppSessionHandler();
$session->start();
// $session->kill();
// $session->isValidFingerPrint();
// echo $session->fingerPrint;
if (!$session->isValidFingerPrint()) {
    $session->kill();
}
// $_SESSION['msg'] = "this text should be encrypted";

// $session->mohammed = "mohammed yahya";

// $session->kill();

// echo mcrypt_create_iv(32); // rondom ciphered 32 bit

// pre($_SESSION); // showed interraly decrypted

// echo $session->mohammed;
// echo $session->msg;


// if (isset($session->msg)) {
//     echo "yes, found";
// } else {
//     echo "not found";
// }

// 10800 = +3 hours (Yemen time zone)
// echo date("H:i:s",  $session->sessionStartTime + 10800);

// change session id every minute


// to remain the session the same with redirections

//  use relative paths instead of absolute paths
// use session_write_close() and exit() after header();
//  like following: 

    // session_write_close();
    // header("Location: /path-to-go");
    // exit();


// SAPI_Apache_HANDLER = you can track uploading
// CGI/FASTCGI = you can not track uploading