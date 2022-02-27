<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
        
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="py-5">
    <div class="banner">
      <div class="content">
        <h1>Good neighbors. Accessible. Low Rent</h1> 
        <p> Rent your home today! Check the latest listing.</p>
        <div>
            <button type="button"><span></span>Learn more</button>
            <button type="button"><span></span>Login</button>
        </div>
      </div>
    </div>

</div>

<?php

include("includes/footer.php");

?>