<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="assets/css/index.css">
  </head>

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
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/home5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>ELYSIUM</h5>
        <p>Be a good neighbor to have a good neighbors</p><br><br><br><br><br><br>
        <div class="slider-btn">
          <a class="btn btn-1" href="contact_us.php" role="button">Contact Us</a>
          <a class="btn btn-1" href="house.php" role="button">Learn More</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/home9.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>Rent your home now!</h4>
        <p>Inquire today, Live today!</p><br><br><br><br><br><br>
        <div class="slider-btn">
          <a class="btn btn-1" href="contact_us.php" role="button">Contact Us</a>
          <a class="btn btn-1" href="house.php" role="button">Learn More</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/home7.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>Get your unit now!</h4>
        <p>For as low as PHP 4500.00/month!</p><br><br><br><br><br><br>
        <div class="slider-btn">
          <a class="btn btn-1" href="contact_us.php" role="button">Contact Us</a>
          <a class="btn btn-1" href="house.php" role="button">Learn More</a>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
            </div>
        </div>
    </div>
</div>
<?php

include("includes/footer.php");

?>