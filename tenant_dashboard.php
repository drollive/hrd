
<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
?>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <?php include("includes/sidebar.php"); ?>

        <div id="layoutSidenav_content">
            <main>










<?php

include("includes/footer.php");

?>