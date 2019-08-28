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
    
        <form>
            <input type="button" value="Add a Book" onclick="window.location.href='./add_book.php'" />
            <!-- <input type="button" value="Delete a Book" onclick="window.location.href='./delete_book.html'" /> -->
            <?php 
            if ($_SESSION['userType'] == "admin") {
                echo "<input type='button' value='Update Book Details' onclick='window.location.href='./update_book.html'' />";
            }
            ?>
            
        </form>

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
                    <td>{$book->title}</td>
                    <td>{$book->author}</td>
                    <td>{$book->publishYear}</td>
                    <td>{$book->isbn}</td>
                    <td><input type='button' value='Delete ' onclick=\"window.location.href='../controller/delete_book.php?isbn={$book->isbn}'\" /></td>
                </tr>";
            }
        }

        ?>
        </table>
    </body>
</html>