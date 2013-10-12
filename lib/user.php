<?php

define('USR_ADMIN', 1);
define('USR_STAFF', 2);
define('USR_TEACHER', 3);
define('USR_STUDENT', 4);
define('USR_PARENT', 5);

class User {

    private static $instance;
    private $UsrID;
    private $Email;
    private $UsrCd;
    private $UsrPw;
    private $UsrNm;
    private $UsrLnm;
    private $UsrPic;
    private $UsrTpID;
    private $RegIp;
    private $RegDt;
    private $LstEntIp;
    private $LstEntDt;
    private $errMsg;
    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance();
        session_start();
        if (isset($_SESSION['profile'])) {
            $usrRow = unserialize($_SESSION['profile']);
            $this->UsrID = $usrRow['UsrID'];
            $this->Email = $usrRow['Email'];
            $this->UsrCd = $usrRow['UsrCd'];
            $this->UsrPw = $usrRow['UsrPw'];
            $this->UsrNm = $usrRow['UsrNm'];
            $this->UsrLnm = $usrRow['UsrLnm'];
            if (isset($usrRow['UsrPic'])) {
                $this->UsrPic = $usrRow['UsrPic'];
            } else {
                $this->UsrPic = '/img/noavatar.png';
            }
            $this->UsrTpID = $usrRow['UsrTpID'];
            $this->RegIp = $usrRow['RegIP'];
            $this->RegDt = $usrRow['RegDt'];
            $this->LstEntIp = $usrRow['LstEntIP'];
            $this->LstEntDt = $usrRow['LstEntDt'];
        } else {
            $this->UsrID = -1;
            $this->Email = 'guest';
            $this->UsrNm = 'Зочин';
            $this->UsrPic = '/img/noavatar.png';
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new User();
        }
        return self::$instance;
    }

    public function signIn($email, $password = null) {
        $email = stripslashes($email);
        $email = $this->db->escape_string($email);
        if ($password != null) {
            $password = $this->db->escape_string(base64_encode(md5($password, true)));
        }
        $sql = "SELECT * FROM user WHERE Email='$email'";
        $result = $this->db->query($sql);
        if ($result) {
            $usrRow = mysqli_fetch_assoc($result);
            // If result matched $myusername and $mypassword, table row must be 1 row
            if (isset($usrRow) && $password = $usrRow['UsrPw'] || $password == null) {
                // Initialise
                $this->UsrID = $usrRow['UsrID'];
                $this->Email = $usrRow['Email'];
                $this->UsrCd = $usrRow['UsrCd'];
                $this->UsrPw = $usrRow['UsrPw'];
                $this->UsrNm = $usrRow['UsrNm'];
                $this->UsrLnm = $usrRow['UsrLnm'];
                if (isset($usrRow['UsrPic'])) {
                    $this->UsrPic = $usrRow['UsrPic'];
                } else {
                    $this->UsrPic = '/img/noavatar.png';
                }
                $this->UsrTpID = $usrRow['UsrTpID'];
                $this->RegIp = $usrRow['RegIp'];
                $this->RegDt = $usrRow['RegDt'];
                $this->LstEntIp = $usrRow['LstEntIp'];
                $this->LstEntDt = $usrRow['LstEntDt'];
                $_SESSION['profile'] = serialize($usrRow);
                return true;
            } else {
                return false;
            }
        } else {
            echo $this->db->error;
            exit;
        }
    }

    public function isGuest() {
        return !isset($_SESSION['profile']);
    }

    public function getUsrID() {
        return $this->UsrID;
    }

    public function getUsrNm() {
        return $this->UsrNm;
    }

    public function getUsrLnm() {
        return $this->UsrLnm;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getUsrPic() {
        return $this->UsrPic;
    }

    public function getErrorMessage() {
        return $this->errMsg;
    }

    public function getUsrTpID() {
        return $this->UsrTpID;
    }

    public function isAdmin() {
        return $this->UsrTpID == USR_ADMIN;
    }

    public static function signOut() {
        session_destroy();
    }

}

?>
