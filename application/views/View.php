<?php
// require_once __DIR__.'\..\templates\HeaderTemplate.php';
// require_once __DIR__.'\..\templates\FormTemplate.php';
// require_once __DIR__.'\..\templates\FooterTemplate.php';
// echo $_SERVER['REQUEST_URI'];
namespace views;

class View
{
    public function __construct($template)
    {
        $content = $template."Template.php";
        require_once TEMPLATES_PATH."Default.php";
    }
}
?>