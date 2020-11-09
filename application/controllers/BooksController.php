<?php
namespace controllers;

use models\BooksModel;

class BooksController extends MainController
{
    function booksAction()
    {
        $this->mainAction();
        $books = new BooksModel;
        $books->categoriesCheck();
    }
}
?>