<?php

error_reporting(E_ALL);

// Эх хавтасны байрлалыг PATH_BASE-д олгож байна.
define('PATH_BASE', dirname(__FILE__));
define('BASE_URL', '/surgalt');
define('HOSTNAME', isset($_GET['host']) ? $_GET['host'] : 'surgalt.info');

require_once PATH_BASE . '/lib/database.php';
require_once PATH_BASE . '/lib/user.php';
$user = User::getInstance();
if ($user->isGuest() && isset($_POST['email']) && isset($_POST['password'])) {
    $user->signIn($_POST['email'], $_POST['password']);
} else if (!$user->isGuest() && isset($_GET['action']) && $_GET['action'] == 'logout') {
    $user->signOut();
}
include PATH_BASE . '/lib/basecontroller.php';
include PATH_BASE . '/sites/' . HOSTNAME . '/controller.php';

$controller = new Controller();
$controller->execute();