<?php
namespace models;

use PDO;

class MainModel
{
    protected $dsn = "";
    protected $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    public function __construct($dbName = '')
    {
        $this->dsn = "mysql:host=localhost;port=3306;dbname=".$dbName.";charset=utf8";
    }
}
?>