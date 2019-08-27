<?php
require_once("common.php");
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = new User($_POST['username'], $_POST['password']);

    $dao = new UserDAO();
    
    $dao->registerUser($user);
    header("Location:../view/home.php");
} else {
    header("Location:../view/home.php");
}
?>