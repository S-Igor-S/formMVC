<?php
namespace models;

use PDO;

class BooksModel
{
    private function sqlQuery()
    {
        $sqlQuery = "SELECT books.Name, books.Author FROM books";
        foreach ($_REQUEST as $filter => $value)
        {
            $sqlQuery = $sqlQuery." LEFT JOIN ".$filter." ON ".$filter.".id = books.".$filter."_id";
        }
        $sqlQuery .= " WHERE ";
        foreach ($_REQUEST as $filter => $value)
        {
            $sqlQuery = $sqlQuery.$filter.".value = \"".$value."\" && ";
        }
        $sqlQuery = substr($sqlQuery, 0, -3);
        return $sqlQuery;
    }
    public function categoriesCheck()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=books_directory;charset=utf8";
        $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $pdo = new PDO($dsn, 'root', 'root', $options);
        if (empty($_REQUEST))
        {
            print_r("<b>Выберите хотя бы одну категорию</b><br>");
        } else
        {
            $stmt_books = $pdo->query($this->sqlQuery());
            $books = $stmt_books->fetchAll(PDO::FETCH_BOTH);
            foreach ($books as $book)
            {
                print_r($book['Name']."<br>  Писатель: ".$book['Author']);
                echo "<br><br>";
            }
        }
    }
}
?>