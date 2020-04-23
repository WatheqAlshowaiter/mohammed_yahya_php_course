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
            return session_start();
        }
    }
}

$session = new AppSessionHandler();
$session->start();
$_SESSION['msg'] = "this text should be encrypted";

pre($_SESSION); // showed interraly decrypted
