<?php
namespace models;

use PDO;

class UserModel
{
    public $check = false;
    public function userInsert($request)
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=dbase_formmvc;charset=utf8";
        $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $pdo = new PDO($dsn, 'root', 'root', $options);
        $stmt = $pdo->query("SELECT name, email FROM `user_accounts`");
        $results = $stmt->fetch(PDO::FETCH_BOTH);
        while (!empty($results))
        {
            if ($request['login'] == $results['name'])
            {
                print_r("Такой логин уже существует<br>");
                break;
            }
            if ($request['email'] == $results['email'])
            {
                print_r("Аккаунт с такой почтой уже существует<br>");
                break;
            }
            $results = $stmt->fetch(PDO::FETCH_BOTH);
        }
        if(empty($results))
        {
            $this->check = true;
            $stmt = $pdo->query("INSERT user_accounts(name, password, age, email, tel, gender, lang, fav_lang) VALUES('{$request['login']}','{$request['password']}', {$request['age']}, '{$request['email']}', '{$request['tel']}', '{$request['gender']}', '{$request['lang']}', '{$request['favLang']}');");
        }
        
    }
}

?>