<?php

/*
 *  Хичээлийн тодорхойлох хуудас
 */

class LessonDefinitionView {

    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'lessondefinition.html.php';
        }
    }
    
    function showfield(){}
}

?>
