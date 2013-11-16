<?php

class Controller extends BaseController {

    function execute() {
        $view = isset($_GET['view']) ? $_GET['view'] : 'home';
        $this->displayView($view);
    }

}