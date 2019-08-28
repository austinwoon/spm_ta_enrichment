<?php
require_once("common.php");

if (isset($_GET['isbn_to_add'])) {
    $dao = new BookDAO();
    $book = $dao->getBookDetails($_GET['isbn_to_add']);

    $userBookDAO = new UserBooksDAO($_SESSION['username']);
    $userBookDAO->addToBookList($book);
}

header("Location:../view/book_list.php");
?>