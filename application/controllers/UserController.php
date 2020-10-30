<?php
namespace controllers;

use controllers\MainController;
// use FormHandler;
use views\View;
use classes\FormHandler;
use classes\MailHandler;

class UserController extends MainController
{
    public function userAction()
    {
        $formHandler = new FormHandler;
        $formHandler->sintaxValidation();
        $formHandler->logicValidation();
        $formHandler->setCookie();
        if (empty($formHandler->errors) && !empty($_REQUEST))
        {
            $mailHandler = new MailHandler;
            $mailHandler->sendMail();
        } else
        {
            print_r(implode('', $formHandler->errors));
        }
        $this->mainAction();

    }
}
?>