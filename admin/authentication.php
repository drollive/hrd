<?php
session_start();
include("config/db_con.php");
# To check if user is logged in or not

if(!isset($_SESSION["auth"]))
{
    $_SESSION["message"] = "Login to Access Dashboard";
    header("Location: ../login.php");
    exit(0);
}
else
{
    if($_SESSION['auth_role'] != 1)
    {
        $_SESSION["message"] = "You are not authorized as Admin";
        header("Location: ../login.php");
        exit(0);
    }
}

?>