<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "hrdrtt";

# For connection
$conn = mysqli_connect("$host","$username","$password","$database");

if(!$conn){
    header("Location: ../errors/dberror.php");
    die();
}
?>