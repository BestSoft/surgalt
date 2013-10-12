<?php

require_once PATH_BASE . '/sites/lesson.surgalt.info/model/lesson.php';
require_once PATH_BASE . '/sites/' . HOSTNAME . '/model/test.php';

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