<?php
require_once("common.php");
class User {
    private $username;
    private $password;
    private $type;

    function __construct($username, $password, $type) {
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    }

    public function authenticateUser($enteredPassword){
        return password_verify($enteredPassword, $this->password);
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getType() {
        return $this->type;
    }

}