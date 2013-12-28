<?php
class report_columnview {
    private $tests;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
                    include_once 'report_column.html.php';
        }
    }
}