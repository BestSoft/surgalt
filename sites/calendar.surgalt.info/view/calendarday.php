<?php
/*include_once PATH_BASE . "/sites/" . HOSTNAME . "/model/modCalendar.php";

class CalendarDayView {

    static private $instance;
    static private $user_id;
    
    function __construct() {
        $user = User::getInstance();
        CalendarDayView::$user_id = $user->getUsrID();
    }
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'calendarday.html.php';
        }
    }
    
    public static function viewLessonTimeTable() {
        $user = User::getInstance();
        $user_type = $user->getUsrTpID();
        if($user_type == 4){
        $query = Calendar::selectStudentTimeTable();
        }
        else if($user_type == 3){
            $query = Calendar::selectTeacherTimeTable();
        }
        if (isset($query)) {
            include_once 'calendarday.html.php';
            }
    }
    
    function viewLearningPlan($param) {
        
    }
    
    function viewMeeting($param) {
        
    }
    

}
CalendarDayView::viewLessonTimeTable();*/
?>