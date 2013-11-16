<?php

/*
 * Хичээлийн агуулгын хуудас
 */

class LessonContentView {

    function display() {
        if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
        } else {
            include_once 'lessoncontent.html.php';
        }
    }

    function getdescription() {
        // Хичээлийн тайлбар харуулах
    }

    function getcomment() {
        // Хичээлтэй холбоотой сэтгэгдэлүүдийг харуулах
    }

    function getvideo() {
        // Хичээлтэй холбоотой бичлэгийг харуулах
    }

    function getpdf() {
        // Хичээлтэй холбоотой pdf файлыг харуулах
    }
}

?>
