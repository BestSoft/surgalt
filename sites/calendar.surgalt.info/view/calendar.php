<?php

class CalendarView {

    function __construct() {
        
    }
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'calendar.html.php';
        }
    }
    
    function viewLessonTimeTable($param) {
        
    }
    
    function viewLearningPlan($param) {
        
    }
    
    function viewMeeting($param) {
        
    }

}
?>
