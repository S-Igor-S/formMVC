<?php
namespace classes;

use vendor\phpmailer\Exception;
use vendor\phpmailer\PHPMailer;
use vendor\phpmailer\SMTP;

class MailHandler
{
    private function contentMail()
    {
        $file = [];
        $title = '';
        $body = '';
        if($_FILES['file']) {
            $file = $_FILES['file'];
            // print_r($this->file);
        }
        $title = "Форма";
        ob_start();
        require_once TEMPLATES_PATH."MailTemplate.php";
        $body = ob_get_contents();
        ob_end_clean();
        return array('file' => $file, 'title' => $title, 'body' => $body);
    }
    public function sendMail($username = 'nixphpcms@gmail.com')
    {
        $content_mail = $this->contentMail();
        $mail = new PHPMailer();
        try 
        {
            $mail->isSMTP();   
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            //$mail->SMTPDebug = 2;
            $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};
    
            // Настройки вашей почты
            $mail->Host = 'smtp.gmail.com'; // SMTP сервера вашей почты
            $mail->Username = $username; // Логин на почте
            $mail->Password = ''; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom($username, 'User'); // Адрес самой почты и имя отправителя

            // Получатель письма
            $mail->addAddress($_REQUEST['email']);  

            // Прикрипление файлов к письму
            if($content_mail['file']) 
            {
                $mail->addAttachment($content_mail['file']['tmp_name'], basename($content_mail['file']['name']));
            }

            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $content_mail['title'];
            $mail->Body = $content_mail['body'];    
            // Проверяем отравленность сообщения
            if ($mail->send()) {/*$result = "success";*/ echo "<p>Сообщение отправлено на почту</p>";} 
            else {/*$result = "error";*/ echo "<p>Сообщение не было отправлено на почту</p>";}

        } 
        catch (Exception $e) 
        {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }
    }
}
?>