<?php
class reportView {
    private $tests;
    
    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            if(isset($_GET["li"]) && isset($_GET["lci"]))
                {
                    include_once 'report.html.php';
                }
        }
    }
}