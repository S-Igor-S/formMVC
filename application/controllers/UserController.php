<?php
namespace controllers;

use views\View;
use classes\FormHandler;
use classes\MailHandler;
use models\UserModel;

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
            $userModel = new UserModel;
            $userModel->userInsert($_REQUEST);
            if($userModel->check == true)
            {
                $mailHandler = new MailHandler;
                $mailHandler->sendMail();
            }
        } else
        {
            print_r(implode('', $formHandler->errors));
        }
        $this->mainAction();
        print_r("<p><a href='http://formmvc/'>Вернуться на главную страницу</a></p>");
    }
}
?>