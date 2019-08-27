<?php
require_once("common.php");

if (isset($_GET['isbn'])) {
    $dao = new BookDAO();
    $book = $dao->getBookDetails($_GET['isbn']);

    $booklistDAO = new UserBooksDAO($_SESSION['username']);
    $booklistDAO->deleteFromBookList($book, $_SESSION['username']);
}

header("Location:../view/book_list.php");
?>