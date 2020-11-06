<?php
namespace models;

use PDO;

class BooksModel
{
    public function categoriesCheck($request)
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=books_directory;charset=utf8";
        $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $pdo = new PDO($dsn, 'root', 'root', $options);
        $stmt = $pdo->query("SELECT * FROM `genre`");
        $results_genre = $stmt->fetch(PDO::FETCH_BOTH);
        while(!empty($results_genre) && !empty($request['genre']))
        {
            if (in_array($results_genre['name'], $request['genre']))
            {
                // print_r($results_genre['name']."<br>");
                $stmt_books = $pdo->query("SELECT `books`.`Name`, `books`.`Author` FROM `books` LEFT JOIN genre ON `genre`.`id` = `books`.`Genre_id` LEFT JOIN century ON `century`.`id` = `books`.`Century_id` GROUP BY `books`.`id`;");
                $results_books = $stmt_books->fetch(PDO::FETCH_BOTH);
                print_r($results_books);
            }
            $results_genre = $stmt->fetch(PDO::FETCH_BOTH);
        }
        $stmt = $pdo->query("SELECT * FROM `century`");
        $results_century = $stmt->fetch(PDO::FETCH_BOTH);
        while(!empty($results_century) && !empty($request['century']))
        {
            if (in_array($results_century['century'], $request['century']))
            {
                // print_r($results_century['century']);

            }
            $results_century = $stmt->fetch(PDO::FETCH_BOTH);
        }
        if (empty($request))
        {
            print_r("Выберите хотя бы одну категорию<br>");
        }
    }
}
?>