<?php

class DataBase {

    static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host = '173.254.28.91';
            $user = 'humuunco_surgalt';
            $password = 'Surg@lt';
            $database = 'humuunco_surgalt';
            self::$instance = mysqli_connect($host, $user, $password, $database);
            self::$instance->set_charset('utf8');
        }
        return self::$instance;
    }
}