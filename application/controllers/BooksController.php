<?php
namespace controllers;

use models\BooksModel;

class BooksController extends MainController
{
    function booksAction()
    {
        $this->mainAction();
        $books = new BooksModel("books_directory");
        $books->categoriesCheck();
        print_r("<br><p><a href='http://formmvc/'>Вернуться на главную страницу</a></p>");
    }
}
?>