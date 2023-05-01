<?php
require_once __DIR__ . '/../router.php';
require_once __DIR__ . '/../vendor/autoload.php';

(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
if (!(isset($_SESSION['user']) || isset($_SESSION['guest']))) {
    $_SESSION['guest'] = (object) [
        'cart' => serialize(['reservations' => [], 'ticketsDance' => [], 'ticketsHistory' => []])
    ];
}

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new router();
$router->route($uri);