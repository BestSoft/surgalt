<?php

require_once PATH_BASE . '/sites/lesson.surgalt.info/model/lesson.php';
require_once PATH_BASE . '/sites/' . HOSTNAME . '/model/question.php';

class QuestionView {
    private $title;
    private $lsnId;
    private $questions;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            $this->lsnId = $_GET['lsnId'];
            $this->title = "Хичээлийн асуултууд";
            $this->questions = QuestionModel::getLessonQuestion($this->lsnId);
            include_once 'question.html.php';
        }
    }
}