<?php
   require_once  __DIR__.'/routes/api.php';

   $uri = trim($_SERVER['REQUEST_URI'], '/');

   $uri = explode('/', $uri);
   
    $router = new api($uri, new errorHelper());
?>

