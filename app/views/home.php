<?php
    require_once("common.php");
?>
<html>
    <head>
    </head>

    <body>
        <?php 
            if (isset($_SESSION['error'])) {
                echo "<p style = 'color:red'>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            };
        ?>
        <form action = "../controllers/process_login.php" method = "POST">
            Username<input type = "text" name = "username">
            Password<input type = "password" name = "password">
            <input type = "submit" value = "Login">
        </form>

        <a href = "../views/register.php">Register New Account</a>
</body>
</html>