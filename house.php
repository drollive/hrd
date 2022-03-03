<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/homes.php");
include("includes/header.php");
include("includes/navbar.php");

?>
<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
		<div class="container-sm">
			<div class="row mt-1">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<section id="slider" class="pt-5">
							<div class="container">
								<h1 style="color: white;" class="text-center"><b>Available Houses</b></h1>
								<div class="slider">
									<div class="owl-carousel">
										<div class="slider-card">
										<div class="d-flex justify-content-center align-items-center mb-4">
												<img height="250" width="100" src="images/slide-1.jpg" alt="" >
											</div>
											<h5 class="mb-0 text-center p-4"><b>House of Hades</b></h5>

										</div>
										<div class="slider-card">
											<div class="d-flex justify-content-center align-items-center mb-4">
												<img height="250"  src="images/slide-2.jpg" alt="">
											</div>
											<h5 class="mb-0 text-center p-4"><b>House of Athena</b></h5>

										</div>
										<div class="slider-card">
											<div class="d-flex justify-content-center align-items-center mb-4">
												<img height="250" src="images/slide-3.jpg" alt="">
											</div>
											<h5 class="mb-0 text-center p-4"><b>House of Poseidon</b></h5>

										</div>
										<div class="slider-card">
											<div class="d-flex justify-content-center align-items-center mb-4">
												<img height="250" src="images/slide-4.jpg" alt="">
											</div>
											<h5 class="mb-0 text-center p-4"><b>House of Zeus</b></h5>

										</div>
										<div class="slider-card">
											<div class="d-flex justify-content-center align-items-center mb-4">
												<img height="250" src="images/slide-5.jpg" alt="">
											</div>
											<h5 class="mb-0 text-center p-4"><b>House of Medusa</b></h5>

										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
