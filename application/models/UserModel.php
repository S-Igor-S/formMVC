<?php
namespace models;

use PDO;

class UserModel extends MainModel
{
    public function userInsert($request)
    {
        $pdo = new PDO($this->dsn, 'root', 'root', $this->options);
        $stmt = $pdo->query("SELECT name, email FROM `user_accounts`");
        $results = $stmt->fetch(PDO::FETCH_BOTH);
        while (!empty($results))
        {
            if ($request['login'] == $results['name'])
            {
                print_r("<b>Такой логин уже существует</b><br>");
                break;
            }
            if ($request['email'] == $results['email'])
            {
                print_r("<b>Аккаунт с такой почтой уже существует</b><br>");
                break;
            }
            $results = $stmt->fetch(PDO::FETCH_BOTH);
        }
        if(empty($results))
        {
            $stmt = $pdo->query("INSERT user_accounts(name, password, age, email, tel, gender, lang, fav_lang) VALUES('{$request['login']}','{$request['password']}', {$request['age']}, '{$request['email']}', '{$request['tel']}', '{$request['gender']}', '{$request['lang']}', '{$request['favLang']}');");
        }
        
    }
}

?>