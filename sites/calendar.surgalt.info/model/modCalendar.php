<?php
class Calendar {

    public $day;
    public $Title;
    public $Location;
    public $Tag;
    public $StartDate;
    public $EndDate;
    public $TypeUserID;
    public $Description;
    public $Repeatable;
    public $RepeatEndDate;
    public $IsPrivate;
    public $InsertDate;
    public $UpdateDate;
    static $instance;
    private $db;
    private $user;
    private $UserID;

    function __construct() {
        $this->db = DataBase::getInstance();
        $this->user = User::getInstance();

        $this->UserID = $this->user->getUsrID();
        $this->TypeUserID = $this->user->getUsrTpID();
        
        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        
        $this->InsertDate = $year.$month.$day;
        $this->UpdateDate = $year.$month.$day;

        if (isset($_GET['action'])) {
            $this->day = $_POST['day'];
            $this->Title = $_POST['title'];
            $this->Location = $_POST['location'];
            $this->Tag = $_POST['tag'];
            $this->StartDate = $_POST['strdt'].".0"; 
            $this->EndDate = $_POST['enddt'].".0";
            $this->Description = $_POST['desc'];
            $this->Repeatable = $_POST['rptable'];
            $this->RepeatEndDate = $this->EndDate;
            $this->IsPrivate = $_POST['isprivate'];
        }
    }

    function InsertCalendar() {
        
        
        $sql = "insert into calendar values(null, '" . $this->Title . "',"
                . "'" . $this->Location . "',"
                . "'" . $this->Tag . "',"
                . "'" . $this->StartDate . "',"
                . "'" . $this->EndDate . "',"
                . "'" . $this->TypeUserID . "0000000" . $this->UserID . "',"
                . "'" . $this->Description . "',"
                . "'" . $this->Repeatable . "',"
                . "'" . $this->RepeatEndDate . "',"
                . "" . $this->UserID . ","
                . "" . $this->InsertDate . ","
                . "" . $this->UserID . ","
                . "" . $this->UpdateDate . ","
                . "" . $this->IsPrivate . ");";
        $query = $this->db->query($sql);
        
        if (isset($_GET['event'])) {
            header("location: /surgalt/?host=" . HOSTNAME);
            die();
        }
    }

    public static function Allevent(){
        $db = DataBase::getInstance();
        $user = User::getInstance();

        $UserID = $user->getUsrID();
        $sql = "select * from calendar";
        $query = $db->query($sql);
        echo $db->error;
        return $query;
    }
    
    public static function selectAllEvent() {
        $db = DataBase::getInstance();
        $user = User::getInstance();

        $UserID = $user->getUsrID();
        $sql = "select * from calendar where InsID = 010000000" . $UserID;
        $query = $db->query($sql);
        echo $db->error;
        return $query;
    }
    
    public static function selectTeacherTimeTable(){
        $db = DataBase::getInstance();
        $user = User::getInstance();
        
        $UserID = $user->getUsrID();
        $UserType = $user->getUsrTpID();
        $sql = "select * from teachertimetable where TchID = ". $UserID;
        $query = $db->query($sql);
        echo $db->error;
        return $query;
    }
    
    public static function selectStudentTimeTable(){
        $db = DataBase::getInstance();
        $user = User::getInstance();
        
        $UserID = $user->getUsrID;
        $sql = "select * from studenttimetable where StdID = ". $UserID;
        $query = $db->query($sql);
        echo $db->error;
        return $query;
    }

}

$a = new Calendar();
$a->insertCalendar();
?>
