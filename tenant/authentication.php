<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("../config/db_con.php"); # To check data in database

if(!isset($_SESSION['auth'])) # To check if user is logged in or not
{
    $_SESSION["message"] = "Login to Access Dashboard";
    header("Location: ../login.php");
    exit(0);
}
else
{
    if($_SESSION['auth_role'] != 0)
    {
        $_SESSION["message"] = "You are not authorized as Tenant";
        header("Location: ../login.php");
        exit(0);
    }
}

?>