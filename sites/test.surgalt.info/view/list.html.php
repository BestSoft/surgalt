<?php

class ListView {
    private $tests;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            $this->tests = LessonModel::getLessonlist(User::getInstance()->getUsrId());
            include_once 'list.html.php';
        }
    }
}