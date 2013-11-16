<?php

class Controller {

    private $user;

    function execute() {
        $view = isset($_GET['view']) ? $_GET['view'] : 'calendarmonth';
        $this->user = User::getInstance();
        include_once 'view/' . strtolower($view) . '.php';
        $view = $view . 'view';
        $view = new $view();
        $view->display();
    }

}