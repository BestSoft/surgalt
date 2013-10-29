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
                        include PATH_BASE.'/sites/'.HOSTNAME."/model/modCalendar.php";
                        }                                            
                    }
                    else
                        {
                        include PATH_BASE.'/sites/'.HOSTNAME.'/view/calendar.view.php';
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
