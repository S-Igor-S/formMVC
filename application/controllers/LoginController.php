<?php
namespace controllers;

use models\LoginModel;

class LoginController extends MainController
{
    function loginAction()
    {
        $login = new LoginModel;
        $login->userInformation();
        $this->mainAction();
        
        print_r("<p><a href='http://formmvc/'>Вернуться на главную страницу</a></p>");
    }
}
?>