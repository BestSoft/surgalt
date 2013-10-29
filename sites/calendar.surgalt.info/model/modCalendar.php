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
            $this->StartDate = 'null';
            $this->EndDate = 'null';
            $this->Status = 'null';
            $this->IsDay = 'NULL';
            $this->TypeUserID = "10219";
            $this->Description = 'NULL';
            $this->Repeatable = 'NULL';
            $this->RepeatEndDate = 'null';
            $this->IsPrivate = "1";
            $this->CommentID = "2";
            $this->InsertDate = 'null';
            $this->UpdateDate = 'null';
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
        if (isset($_GET['action'])) {
            header("location: /surgalt/?host=" . HOSTNAME);
            die();
        }
    }

    public static function selectAllEvent() {
        $db = DataBase::getInstance();
        $user = User::getInstance();

        $UserID = $user->getUsrID();
        $sql = "select * from calendar where InsID = " . $UserID;
        $query = $db->query($sql);
        echo $db->error;
        return $query;
    }

}

$a = new Calendar();
$a->insertCalendar();
?>
