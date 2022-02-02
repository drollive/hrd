<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include("message.php"); ?>
                <h3> Elysium </h3>
            </div>
        </div>
    </div>
</div>

<?php

include("includes/footer.php");

?>