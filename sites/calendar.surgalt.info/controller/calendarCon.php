<?php

class CalendarControllerClass {
    /*static $instance;
    private $db;*/
            function __construct() {
        /*$this->db = DataBase::getInstance();*/
    }
    
    public static function checkAction() {
        if(isset($_GET["action"]))
                    {
                    if($_GET["action"] == 1)
                        {
                        include_once PATH_BASE.'/sites/'.HOSTNAME."/model/modCalendar.php";
                        }                                            
                    }
                    if($_GET["host"] == HOSTNAME && count($_GET) == 1)
                        {
                        include_once PATH_BASE.'/sites/'.HOSTNAME.'/view/calendar.view.php';
                        }
        if(isset($_GET["w"]))
        {
            if($_GET["w"] == "view")
                {
                    include_once PATH_BASE."/sites/".HOSTNAME."/view/week.view.php";
                }
        }
        if(isset($_GET["m"]))
        {
            if($_GET["m"] == "view")
                {
                    include_once PATH_BASE."/sites/".HOSTNAME."/view/calendar.view.php";
                }
        }
        if(isset($_GET["d"]))
        {
            if($_GET["d"] == "view")
                {
                    include_once PATH_BASE."/sites/".HOSTNAME."/view/day.view.php";
                }
        }
        
    }
    
    public static function insertCalendar1($param) {
         
        /*$sql = "select * from lesson";
        $query = CalendarControllerClass::$instance->query($sql);
        $result = $query->fetch_array();
        echo $result["LsnNm"];*/
    }
    
    function CheckUserLesson($UserID, $LsnPlan) {
        
    }
    function CheckTeacherGroup($TeacherID, $Group) {
        
    }
}
?>
