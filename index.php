<?php

error_reporting(E_ALL);

// Эх хавтасны байрлалыг PATH_BASE-д олгож байна.
define('PATH_BASE', dirname(__FILE__));
define('BASE_URL', '/surgalt');
define('HOSTNAME', isset($_GET['host']) ? $_GET['host'] : 'surgalt.info');
//Check session start
if (empty($_SESSION)) {
    session_start();
}

require_once PATH_BASE . '/lib/database.php';
include PATH_BASE . '/sites/' . HOSTNAME . '/index.php';
