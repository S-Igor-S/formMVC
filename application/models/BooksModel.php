<?php
namespace models;

use PDO;

class BooksModel extends MainModel
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
            $strValue = implode($value);
            $sqlQuery = $sqlQuery."POSITION(".$filter.".value IN \"".$strValue."\") && ";
        }
        $sqlQuery = substr($sqlQuery, 0, -3);
        return $sqlQuery;
    }
    public function categoriesCheck()
    {
        $pdo = new PDO($this->dsn, 'root', 'root', $this->options);
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