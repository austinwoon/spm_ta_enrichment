<?php
require_once("common.php");
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

$username = $_SESSION['username'];
# list of all books that the user owns
$bookDAO = new BookDAO();
$booklistDAO = new UserBooksDAO($username);
$booklist = $booklistDAO->getUserBooks();
?>

<html>
    <head>

    </head>

    <body>
        <div class = "container-fluid">
            <div>
                <form>
                    <input type="button" value="Add a Book" onclick="window.location.href='./add_book.php'" />
                    <!-- <input type="button" value="Delete a Book" onclick="window.location.href='./delete_book.html'" /> -->
                    <?php 
                    if ($_SESSION['userType'] == "admin") {
                        echo "<input type='button' value='Update Book Details' onclick='window.location.href='./update_book.html'' />";
                    }
                    ?>
                    
                </form>
            </div>
            <div>
                <table border = 1>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year Published</th>
                        <th>ISBN</th>
                        <th>Delete</th>
                    </tr>
                <?php
                if (!empty($booklist)) {
                    foreach ($booklist as $bookisbn) {
                        $book = $bookDAO->getBookDetails($bookisbn);
            
                        echo "
                        <tr>
                            <td>{$book->getTitle()}</td>
                            <td>{$book->getauthor()}</td>
                            <td>{$book->getPublishYear()}</td>
                            <td>{$book->getIsbn()}</td>
                            <td><input type='button' value='Delete ' onclick=\"window.location.href='../controllers/delete_book.php?isbn={$book->getIsbn()}'\" /></td>
                        </tr>";
                    }
                }

                ?>
                </table>
            </div>
        </div>
    </body>
</html>