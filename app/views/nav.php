<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<?php require_once("common.php") ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class = 'navbar-collapse collapse'>
        <ul class = "navbar-nav">
            <li class = "nav-item">
                <a class="nav-link" href = "./register.php">Sign Up</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
                echo "
                    <li class = 'nav-item'>
                        <a class='nav-link' href = '../controllers/process_logout.php'>Log Out</a>
                    </li>";
            } else {
                echo "
                <li class = 'nav-item'>
                    <a class='nav-link' href = './home.php'>Log In</a>
                </li>
                ";
            }
            ?>

            
        </ul>
    </div>


    <?php
    if (isset($_SESSION['username'])) {
        echo '<p class="my-2 my-sm-0" style="color:white">' . "Welcome {$_SESSION['username']}" . '</p>';
    }
    ?>

    <!-- about, app, login, signup, log out -->
</nav>