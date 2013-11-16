<?php

class LessonView {
    private $tests;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'lesson.html.php';
        }
    }
}