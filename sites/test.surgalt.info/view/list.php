<?php

class ListView {

    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'list.html.php';
        }
    }

}