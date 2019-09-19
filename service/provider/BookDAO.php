<?php
require_once("common.php");
class BookDAO
{
    private $conn;

    function __construct()
    {
        $this->conn = $this->getConn();
    }

    private function getConn()
    {
        $connManager = new ConnectionManager();
        $conn = $connManager->getConnection();
        return $conn;
    }

    public function getAllBooks()
    {   
        $booklist = [];
        $sql = "select * from books";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $booklist[] = new Book($row['title'], $row['isbn'], $row['author'], $row['publishYear']);
        };

        return $booklist;
    }

    # get book by ISBN
    public function getBookDetails($bookisbn)
    {
        $sql = "select * from books where isbn=:isbn";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        # bind as string
        $stmt->bindParam(":isbn", $bookisbn, PDO::PARAM_STR);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Book($row['title'], $row['isbn'], $row['author'], $row['publishYear']);
        }
    }

    public function createBook($title, $isbn, $author, $publishYear) {
        $sql = "INSERT INTO books VALUES (:title, :isbn, :author, :publishYear)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":author", $author);        
        $stmt->bindParam(":publishYear", $publishYear);

        $stmt->execute();
        return True;
    }

    # delete book by ISBN
    public function deleteBook($isbn) {
        try {
            $sql = "DELETE from books WHERE isbn = :isbn";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":isbn", $isbn);

            $stmt->execute();
            return True;
        } catch (Exception $e) {
            return False;
        }
    }

    # update book by ISBN
    public function updateBook($title, $isbn, $author, $publishYear) {
        try {
            $sql = "UPDATE
                        books
                    SET
                        title = :title,
                        author = :author,
                        publishYear = :publishYear
                    WHERE
                        isbn = :isbn";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":isbn", $isbn);
            $stmt->bindParam(":author", $author);        
            $stmt->bindParam(":publishYear", $publishYear);

            $stmt->execute();
            return True;
        } catch (Exception $e) {
            return False;
        }
    }
}
?>