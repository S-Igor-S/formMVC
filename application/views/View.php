<?php
namespace views;

use controllers\Error404Controller;
class View
{
    public function templateView($template)
    {
        $content = $template."Template.tpl";
        if(file_exists(TEMPLATES_PATH."\\".$content)){
            require_once TEMPLATES_PATH."Default.tpl";
        } else
        {
            $error404 = new Error404Controller('error404');
            $error404->errorAction();
        }
    }
}
?>