<?php
// namespace application\controllers;

use views\Error404;

class Router
{
    // private $routes = [];
    private $params = [];
    
    //Добавляем маршруты в переменную класса Router
    public function __construct()
    {
        //$this->routes = require_once 'configs\routes.php';
    }

    //Проверка на существование маршрута
    public function match() 
    {
        $routes = require_once 'configs\routes.php';
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($routes as $router => $value)
        {
            if (preg_match('~^'.$router.'$~', $url))
            {
                $this->params = $value;
                return true;
            }   
        }
        return false;
    }

    //Запуск маршрута
    public function run()
    {
        if ($this->match()) 
        {
            spl_autoload_register(function ($class) {
                $path = 'application\controllers\\'.$class .'.php';
                if(file_exists($path))
                {
                    require_once $path;
                }
            });
            $path = 'controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) 
            {
                $controller = new $path($this->params['controller']);
                if(method_exists($controller, $this->params['controller'].'Action'))
                {
                    $method = $this->params['controller'].'Action';
                    $controller->$method();
                } else
                {
                    
                }
                //$controller->template = $this->params['controller'];
            } else 
            {
                Error404::errorAction();
            }
        } else 
        {
            Error404::errorAction();
        }
    }
}
?>