<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.

include("includes/navbar.php");
include("includes/homes.php");


?>

<section id="slider" class="pt-5">
  <div class="container">
    <h1 class="text-center"><b>Available Houses</b></h1>
	  <div class="slider">
				<div class="owl-carousel">
					<div class="slider-card">
					   <div class="d-flex justify-content-center align-items-center mb-4">
							<img height="300" src="assets/images/slide-1.jpg" alt="" >
						</div>
						<h5 class="mb-0 text-center p-4"><b>House of Hades</b></h5>

					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img height="300"  src="assets/images/slide-2.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center p-4"><b>House of Athena</b></h5>

					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img height="300" src="assets/images/slide-3.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center p-4"><b>House of Poseidon</b></h5>

					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img height="300" src="assets/images/slide-4.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center p-4"><b>House of Zeus</b></h5>

					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img height="300" src="assets/images/slide-5.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center p-4"><b>House of Judell</b></h5>

					</div>
				</div>
			</div>
  </div>
</section>

<?php

include("includes/footer.php");

?>
