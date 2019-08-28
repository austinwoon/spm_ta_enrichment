<?php
include_once("common.php");
unset($_SESSION['username']);
unset($_SESSION['userType']);
header("Location:../views/home.php");
exit();