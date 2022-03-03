
<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
?>

<div id="intro" class="bg-image shadow-2-strong">
	<div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
		<div class="container-sm">
			<div class="row mt-5">	
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="images/home5.jpg" alt="First slide">
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
									<img class="d-block w-100" src="images/home9.jpg" alt="Second slide">
									<div class="carousel-caption d-none d-md-block">
										<h4>Get your unit now!</h4>
										<p>For as low as PHP 4500.00/month!</p><br><br><br><br><br><br>
										<div class="slider-btn">
											<a class="btn btn-1" href="contact_us.php" role="button">Contact Us</a>
											<a class="btn btn-1" href="house.php" role="button">Learn More</a>
										</div>
									</div>
								</div>

								<div class="carousel-item">
									<img class="d-block w-100" src="images/home6.jpg" alt="Third slide">
									<div class="carousel-caption d-none d-md-block">
										<h4>Rent your home now!</h4>
										<p>Inquire today, Live today!</p><br><br><br><br><br><br>
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
</div>


<?php

include("includes/footer.php");

?>