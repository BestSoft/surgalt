<?php

class CalendarDayView {

    function __construct() {
        
    }
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'calendarday.html.php';
        }
    }
    
    function viewLessonTimeTable($param) {
        
    }
    
    function viewLearningPlan($param) {
        
    }
    
    function viewMeeting($param) {
        
    }

}