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

    private function validDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

    public function createBook($book)
    {
        if (strlen($book->getIsbn()) != 6) {
            return False;
        }

        if (!$this->validDate($book->getPublishYear())) {
            return False;
        }

        $sql = "INSERT INTO books VALUES (:title, :isbn, :author, :publishYear)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":title", $book->getTitle());
        $stmt->bindParam(":isbn", $book->getIsbn());
        $stmt->bindParam(":author", $book->getAuthor());            // originally getauthor()
        $stmt->bindParam(":publishYear", $book->getPublishYear());

        $stmt->execute();
        return True;
    }

    # delete book by ISBN
    public function deleteBook($book)
    {
        try {
            $sql = "DELETE from books WHERE isbn = :isbn";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":isbn", $book->getIsbn());

            $stmt->execute();
            return True;
        } catch (Exception $e) {
            return False;
        }
    }

    public function updateBook($book)
    {
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

            $stmt->bindParam(":title", $book->getTitle());
            $stmt->bindParam(":isbn", $book->getIsbn());
            $stmt->bindParam(":author", $book->getAuthor());        // originally getauthor()
            $stmt->bindParam(":publishYear", $book->getPublishYear());

            $stmt->execute();
            return True;
        } catch (Exception $e) {
            return False;
        }
    }
}
?>