<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "hrd";

# For connection of database
$con = mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    #Why it isn't working?
    #it should be redirected to db_error.php
    #if the database is not found/correct
    header("Location: ../errors/db_error.php"); #the .. is for scaping admin index.php
    die();
}
?>