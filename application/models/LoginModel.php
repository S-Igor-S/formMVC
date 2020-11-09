<?php
namespace models;

use PDO;

class LoginModel extends MainModel
{
    private function loginCheck()
    {
        $pdo = new PDO($this->dsn, 'root', 'root', $this->options);
        $stmt = $pdo->query("SELECT name, email, password FROM user_accounts");
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
        if ($this->loginCheck())
        {
            print_r('<b>Доступ разрешен</b>');
        }elseif (!empty($_REQUEST))
        {
            print_r('<b>Доступ запрещён</b>');
        }
    }
}
?>