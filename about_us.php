
<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
?>
<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container w-100 p-3 h-75 d-inline-block">
            <div class="row justify-content-center">

                <div class="col-lg-5">
                    <div class="card" style="width: 30rem; height: 30rem;">
                        <img src="images/forRent.png" class="card-img-top" style="height: 25rem;"alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center">MISSION</h5>
                            <p class="card-text text-center ">Shape the future of the Internet by creating unprecedented value and opportunity for our customers, employees, investors, and ecosystem partners.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card" style="width: 30rem; height: 30rem;">
                        <img src="images/forRent3.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center">VISION</h5>
                            <p class="card-text text-center">

                                Changing the way we work, live, play, and learn
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>

<?php

include("includes/footer.php");

?>

