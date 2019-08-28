<?php
include_once("common.php");
?>
<html>
    <form action="../controllers/process_register.php" method = "POST">
        Username<input type="text" name="username">
        Password<input type="password" name="password">
        <input type = "submit" value = "Register">
    </form>
</html>