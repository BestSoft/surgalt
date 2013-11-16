<?php
class JurnalView {
    private $tests;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'jurnal.html.php';
        }
    }
}