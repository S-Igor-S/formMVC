<?php
require_once "config.php";
spl_autoload_register(function ($class) {
    $path = 'application\\'.$class .'.php';
    if(file_exists($path))
    {
        require_once $path;
    }
});
$router = new Router;
$router->run();
// print_r($router->params);
// print_r($router->routes);
?>