<?php
namespace controllers;

use views\View;

class MainController
{
    public $template;
    public function __construct($template = '')
    {
        $this->template = $template;
        // $this->mainAction();
    }
    public function mainAction()
    {
        $view = new View($this->template);
    }
}
?>