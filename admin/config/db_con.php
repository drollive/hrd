<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "hrd";

# For connection of database
$con = mysqli_connect("$host","$username","$password","$database");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>