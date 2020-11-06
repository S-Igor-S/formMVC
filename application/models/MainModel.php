<?php
namespace models;

use PDO;

class MainModel
{
    protected $dsn = "mysql:host=localhost;port=3306;dbname=dbase_formmvc;charset=utf8";
    protected $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    protected $pdo = new PDO($dsn, 'root', 'root', $options);
}
?>