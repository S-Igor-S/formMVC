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
            // $stmt = $pdo->query("INSERT user_accounts(name, password, age, email, tel, gender, lang, fav_lang) VALUES('{$request['login']}','{$request['password']}', {$request['age']}, '{$request['email']}', '{$request['tel']}', '{$request['gender']}', '{$request['lang']}', '{$request['favLang']}');");
            $stmt = $pdo->prepare("INSERT user_accounts(name, password, age, email, tel, gender, lang, fav_lang) VALUES(:login, :password, :age, :email, :tel, :gender, :lang, :favLang);");
            $stmt->bindParam(':login', $_REQUEST['login'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $_REQUEST['password'], PDO::PARAM_STR);
            $stmt->bindParam(':age', $_REQUEST['age'], PDO::PARAM_INT, 3);
            $stmt->bindParam(':email', $_REQUEST['email'], PDO::PARAM_STR);
            $stmt->bindParam(':tel', $_REQUEST['tel'], PDO::PARAM_STR);
            $stmt->bindParam(':gender', $_REQUEST['gender'], PDO::PARAM_STR);
            $stmt->bindParam(':lang', implode(', ', $_REQUEST['lang']), PDO::PARAM_STR);
            $stmt->bindParam(':favLang', $_REQUEST['favLang'], PDO::PARAM_STR);
            $stmt->execute();
        }
        
    }
}

?>