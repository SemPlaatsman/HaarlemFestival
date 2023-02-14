<?php
require_once __DIR__ . '/../router.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new Router();
$router->route($uri);