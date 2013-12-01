<?php

require_once PATH_BASE . '/sites/lesson.surgalt.info/model/lesson.php';
require_once PATH_BASE . '/sites/' . HOSTNAME . '/model/test.php';
require_once PATH_BASE . '/sites/' . HOSTNAME . '/model/question.php';

class ListView {
    private $title;
    private $lessons;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            $this->title = "Хичээлийн жагсаалт";
            $this->lessons = LessonModel::getLessonlist(User::getInstance()->getUsrId());
            $tests = TestModel::getUserTest(User::getInstance()->getUsrId());
            foreach($tests as $test){
                $this->tests[$test['LsnID']][] = $test;
            }
            foreach($this->lessons as &$lesson){
                $lesson['QstCnt'] = QuestionModel::getLessonQuestionCount($lesson['LsnID']);
            }
            include_once 'list.html.php';
        }
    }
}