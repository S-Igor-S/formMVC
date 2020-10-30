<?php
namespace controllers;

use views\View;
use controllers\MainController;

class CheckController extends MainController
{
    public function checkAction()
    {
        if (!empty($_COOKIE))
        {
            $this->mainAction();
            if($_REQUEST['continue'] == 'yes')
            {
                foreach($_COOKIE as $key => $value)
                {
                    $_REQUEST[$key] = $value;
                }
            }
        }
    }
}
?>