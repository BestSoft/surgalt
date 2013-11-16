<?php

class CalendarMonthView {

    function __construct() {
        
    }
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'calendarmonth.html.php';
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
