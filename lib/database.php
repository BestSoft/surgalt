<?php

class DataBase {

    static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host = 'humuun.net';
            $user = 'buteemjc';
            $password = 'prmr316 dn dkl pkldkk';
            $database = 'buteemjc_data';
            self::$instance = mysqli_connect($host, $user, $password, $database);
            self::$instance->set_charset('utf8');
        }
        return self::$instance;
    }
}