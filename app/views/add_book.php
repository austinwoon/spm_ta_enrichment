<?php 
require_once("common.php");

$bookDAO = new BookDAO();
$booklist = $bookDAO->getAllBooks();
$userBooksDAO = new UserBooksDAO($_SESSION['username']);
$userBooks = $userBooksDAO->getUserBooks();
?>
<html>
    <body>
        <form action="../controllers/add_to_book_list.php" method="get">
            ISBN 
            <select name = "isbn_to_add">
                <?php 
                
                foreach ($booklist as $book) {
                    
                    if (!in_array($book->getIsbn(), $userBooks)) {
                        var_dump($book);
                        echo "<option value = '{$book->getIsbn()}'>{$book->getTitle()}</option>";
                    }
                }
                ?>
            </select> 
            <input type = "submit" value = "Add Book">
        </form>
    </body>
</html>