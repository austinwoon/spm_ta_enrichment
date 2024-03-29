<?php
require_once("common.php");
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $input_pw = $_POST['password'];

    # intialize DAO and extract User Objct
    $dao = new UserDAO();
    $user = $dao->getUser($username);

    # getUser($username) will be empty if no user in database
    if (!isset($user)) {
        $_SESSION['error'] = "Invalid Username or Password";
    } else {
        # check if password matches
        if ($user->authenticateUser($input_pw)) {
            $_SESSION['username'] = $username;
            $_SESSION['userType'] = $user->getType();;
            header("Location: ../views/book_list.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid Username or Password";
        }
    }
    
    if (!empty($_SESSION['error'])) {
        header("Location: ../views/home.php");
        exit();
    }
} else {
    header("Location:../views/home.php");
    exit();
}