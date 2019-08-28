<?php
require_once("common.php");
class UserDAO {

    public function getUser($username) {
        $connManager = new ConnectionManager();
        $conn = $connManager->getConnection();
        
        $sql = "select * from user where username=:username";
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        # bind as string
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new User($row['username'], $row['password'], $row['type']);
        }
    }

    public function registerUser($user) {
        $username = $user->getUsername();
        $connManager = new ConnectionManager();
        $conn = $connManager->getConnection();

        $sql = "INSERT INTO user VALUES (:username, :password, 'user')";
        $stmt = $conn->prepare($sql);
        # if user exists, dont register
        if (empty($this->getUser($username))) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(":username", $username);
            $hash_pw = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $stmt->bindParam(":password", $hash_pw);
    
            $stmt->execute();
            return True;
        } 

        return False;

    }

}
?>