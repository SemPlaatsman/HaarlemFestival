<?php
require_once __DIR__.'/../router.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new router();
$router->route($uri);
