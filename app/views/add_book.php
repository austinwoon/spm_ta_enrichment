<?php 
require_once("common.php");

$bookDAO = new BookDAO();
$booklist = $bookDAO->getAllBooks();
$userBooksDAO = new UserBooksDAO($_SESSION['username']);
$userBooks = $userBooksDAO->getUserBooks();
?>
<html>
    <body>
        <form action="../controller/add_to_book_list.php" method="get">
            ISBN 
            <select name = "isbn_to_add">
                <?php 
                
                foreach ($booklist as $book) {
                    
                    if (!in_array($book->isbn, $userBooks)) {
                        var_dump($book);
                        echo "<option value = '{$book->isbn}'>{$book->title}</option>";
                    }
                }
                ?>
            </select> 
            <input type = "submit" value = "Add Book">
        </form>
    </body>
</html>