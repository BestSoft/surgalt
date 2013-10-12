<?php
  class CreditView {

     function display() {
         if (User::getInstance()->isGuest()) {
            echo 'Хандах эрхгүй байна.';
         } else {
            $include = 'creditPage.php';
            include_once 'credit.html.php';
         }
     }
  }
?>
