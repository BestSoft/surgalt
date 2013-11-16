<?php

abstract class BaseController {

    private $user;

    function __construct() {
        $this->user = User::getInstance();
    }

    abstract function execute();

    protected function displayView($view) {
        include_once PATH_BASE . '/sites/' . HOSTNAME . '/view/' . strtolower($view) . '.php';
        $view = $view . 'view';
        $view = new $view();
        $view->display();
    }

}