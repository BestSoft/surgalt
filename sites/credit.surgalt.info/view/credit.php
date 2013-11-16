<?php
  class CreditView {

     function display() {
         if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
         } else {
            include_once 'credit.html.php';
         }
     }
  }