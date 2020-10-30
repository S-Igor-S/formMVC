<?php
namespace views;

class Error404
{
    static public function errorAction()
    {
        require_once TEMPLATES_PATH."Error404Template.php";
    }
}