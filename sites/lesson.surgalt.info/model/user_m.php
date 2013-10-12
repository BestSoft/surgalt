<?php

/*
 * Хэрэглэгч модел
 */

class user_m {
    //put your code here
    public $userId;
    public $mail;
    public $username;
    public $password;
    public $lastname;
    public $picture;
    public $registeredIp;
    public $registeredDate;
    public $currentDate;
    
    function register(){
        // Хэрэглэгч бүртгэх
    }
    function login($username, $password){
        // нэвтрэх
    }
    function checkusertype($mail){
        // Хэрэглэгчийн төрлийг шалгах
    }
    function signout($username){
        // системээёс гарах
    }
}
?>
