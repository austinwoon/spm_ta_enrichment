<?php
class ConnectionManager {
    # edit this according to your settings
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    # uncomment for mamp users
    # private $password = "root";
    private $db_name = "enrichment_ex_1";
    private $conn;

    public function getConnection() {
        $dns = "mysql:host={$this->host};dbname={$this->db_name}";

        try {
            $this->conn = new PDO($dns, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }

}
?>