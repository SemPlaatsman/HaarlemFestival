<?php
require_once __DIR__.'/../router.php';

(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
if (!isset($_SESSION['user'])) {

}

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new router();
$router->route($uri);
