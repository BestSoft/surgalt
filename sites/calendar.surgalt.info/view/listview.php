<?php
include PATH_BASE . "/sites/" . HOSTNAME . "/model/modCalendar.php";

class listViewEvent {

    static private $instance;
    static private $user_id;

    function __construct() {
        $user = User::getInstance();
        listViewEvent::$user_id = $user->getUsrID();
    }

    public static function select() {
        $query = Calendar::selectAllEvent();
        if (isset($query)) {
            include 'listview.html.php';
            }
        }
    }

    listViewEvent::select();
    ?>