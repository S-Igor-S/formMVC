<?php
namespace models;

use PDO;

class LoginModel
{
    private function loginCheck()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=dbase_formmvc;charset=utf8";
        $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $pdo = new PDO($dsn, 'root', 'root', $options);
        $stmt = $pdo->query("SELECT name, email, password FROM `user_accounts`");
        $results = $stmt->fetch(PDO::FETCH_BOTH);
        while (!empty($results)){
            if (($_REQUEST['login'] == $results['name'] || $_REQUEST['login'] == $results['email']) && $_REQUEST['password'] == $results['password'])
            {
                return true;
            }
            $results = $stmt->fetch(PDO::FETCH_BOTH);
        }
        if (empty($results))
        {
            return false;
        }
    }
    public function userInformation()
    {
        if ($this->loginCheck() && !empty($_REQUEST))
        {
            
            print_r('<b>Доступ разрешен</b>');
        }elseif (!empty($_REQUEST))
        {
            print_r('<b>Доступ запрещён</b>');
        }
    }
}
?>