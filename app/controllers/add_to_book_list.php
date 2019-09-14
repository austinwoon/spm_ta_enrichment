<?php
require_once("common.php");

if (isset($_GET['isbn_to_add'])) {
//    $dao = new BookDAO();
//    $book = $dao->getBookDetails($_GET['isbn_to_add']);

    $userBookDAO = new UserBooksDAO($_SESSION['username']);
    $userBookDAO->addToBookList($_GET['isbn_to_add']);
//    $userBookDAO->addToBookList($book);
}

header("Location:../views/book_list.php");
?>