<?php
require_once("common.php");

if (isset($_GET['title']) && isset($_GET['isbn']) && isset($_GET['author']) && isset($_GET['publishedYear'])) {
    $dao = new BookDAO();
    $book = new Book($_GET['title'], $_GET['isbn'], $_GET['author'], $_GET['publishedYear']);
    $dao->addToBookList($book);
}

header("Location:../views/book_list.php");
?>