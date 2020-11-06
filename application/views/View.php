<?php
// require_once __DIR__.'\..\templates\HeaderTemplate.php';
// require_once __DIR__.'\..\templates\FormTemplate.php';
// require_once __DIR__.'\..\templates\FooterTemplate.php';
// echo $_SERVER['REQUEST_URI'];
namespace views;

class View
{
    public function templateView($template)
    {
        $content = $template."Template.php";
        if(file_exists(TEMPLATES_PATH."\\".$content)){
            require_once TEMPLATES_PATH."Default.php";
        } else
        {
            require_once VIEW_PATH.'\\Error404.php';
        }
    }
}
?>