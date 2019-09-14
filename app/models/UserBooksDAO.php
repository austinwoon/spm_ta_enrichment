<?php
class UserBooksDAO {
    private $bookList;
    private $username;
    private $conn;

    function __construct($username)         // only need username to construct UserBooksDAO
    {
        $this->username = $username;
        $this->conn = $this->getConn();
        $this->bookList = $this->getUserBooks($this->username); 
    }

    private function getConn()
    {
        $connManager = new ConnectionManager();
        $conn = $connManager->getConnection();
        return $conn;
    }

    # get list of the ISBNs of the books each user owns
    public function getUserBooks()                                       
    {
        $list = [];
        $sql = "select isbn from userbooks where username = :username";   

        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $row["isbn"];
        };

        return $list;
    }

    public function deleteFromBookList($isbn)         // initially takes in a Book object 
    {
        try {
            $sql = "DELETE from userbooks WHERE isbn = :isbn AND username = :username";
            $stmt = $this->conn->prepare($sql);

//            $stmt->bindParam(":isbn", $book->getIsbn());
            $stmt->bindParam(":isbn", $isbn);
            $stmt->bindParam(":username", $this->username);

            $stmt->execute();
            return True;
        } catch (Exception $e) {
            return False;
        }
    }

    public function addToBookList($isbn)        // initially takes in a Book object 
    {
        $sql = "INSERT INTO userbooks VALUES (:username, :isbn)";
        $stmt = $this->conn->prepare($sql);

//        $stmt->bindParam(":isbn", $book->getIsbn());
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":username", $this->username);

        $stmt->execute();
        return True;
    }
}
?>