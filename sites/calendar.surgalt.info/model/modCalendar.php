<?php
class Calendar {

    public $day;
    public $Title;
    public $Location;
    public $Tag;
    public $StartDate;
    public $EndDate;
    public $Status;
    public $IsDay;
    public $TypeUserID;
    public $Description;
    public $Repeatable;
    public $RepeatEndDate;
    public $IsPrivate;
    public $CommentID;
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

        if (isset($_GET['action'])) {
            $this->day = $_POST['day'];
            $this->Title = $_POST['title'];
            $this->Location = $_POST['location'];
            $this->Tag = $_POST['tag'];
            $this->StartDate = $_POST['strdt']; 
            $this->EndDate = $_POST['enddt'];
            $this->Status = $_POST['stts'];
            $this->IsDay = $_POST['isday'];
            $this->TypeUserID = $_POST['tpusrid'];
            $this->Description = $_POST['desc'];
            $this->Repeatable = $_POST['rptable'];
            $this->RepeatEndDate = $_POST['rptenddt'];
            $this->IsPrivate = $_POST['isprivate'];
            $this->CommentID = $_POST['commendid'];
            $this->InsertDate = $_POST['insid']; 
            $this->UpdateDate = $_POST['updid'];
        }
    }

    function InsertCalendar() {
        $sql = "insert into calendar values(null, '" . $this->Title . "',"
                . "'" . $this->Location . "',"
                . "'" . $this->Tag . "',"
                . "" . $this->StartDate . ","
                . "" . $this->EndDate . ","
                . "" . $this->Status . ","
                . "" . $this->IsDay . ","
                . "" . $this->TypeUserID . ","
                . "" . $this->Description . ","
                . "" . $this->Repeatable . ","
                . "" . $this->RepeatEndDate . ","
                . "" . $this->IsPrivate . ","
                . "" . $this->UserID . ","
                . "" . $this->InsertDate . ","
                . "" . $this->UserID . ","
                . "" . $this->UpdateDate . ")";
        $query = $this->db->query($sql);
        if (isset($_GET['event'])) {
            header("location: /surgalt/?host=" . HOSTNAME);
            die();
        }
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
        $sql = "select * from teachertimetable where TchID = ". $UserID." and UsrTpID = ". $UserType;
        $query = $db->query($sql);
        echo $db->error;
        return $query;
    }
    
    public static function selectStudentTimeTable(){
        $db = DataBase::getInstance();
        $user = User::getInstance();
        
        $UserID = $user->getUsrID;
        $sql = "select * from studenttimetable where StdID = ". $UserID;
    }

}

$a = new Calendar();
$a->insertCalendar();
?>
