<?php

$WEB_URL = 'http://127.0.0.1/hrd/';
$ROOT_PATH = 'C:\xampp\htdocs\hrd';

$host = "localhost";
$username = "root";
$password = "";
$database = "hrd2";

# For connection of database
$con = mysqli_connect("$host","$username","$password","$database");

# For connection failed
if (!$con) 
{   header("Location: ../errors/db_error.php");
    die();
  }
?>