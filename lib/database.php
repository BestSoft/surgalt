<?php

class DataBase {

    static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host = 'localhost';
            $user = 'surgalt';
            $password = '123456';
            $database = 'surgalt_db';
            self::$instance = mysqli_connect($host, $user, $password, $database);
            self::$instance->set_charset('utf8');
        }
        return self::$instance;
    }
}