<?php
session_start();

# This is for an user trying to access login.php
# but still trying to access the file 
if(isset($_SESSION["auth"]))
{
    $_SESSION["message"] = "You are already logged in!";
    header("Location: index.php");
    exit(0);
}
include("includes/header.php");
include("includes/navbar.php");
?>

<section class="u-align-left u-clearfix u-grey-5 u-section-1" id="carousel_f5c7">
  <div class="u-clearfix u-sheet u-sheet-1">
    <h2 class="u-text u-text-default u-text-1">About Us</h2>
    <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
      <ul class="u-spacing-15 u-tab-list u-unstyled" role="tablist">
        <li class="u-tab-item" role="presentation">
          <a class="active u-active-black u-button-style u-custom-color-1 u-tab-link u-text-active-white u-text-black u-text-hover-grey-75 u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">Overview</a>
        </li>
      </ul>
      <div class="u-tab-content">
        <div class="u-align-left u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
          <div class="u-container-layout u-valign-top u-container-layout-1">
            <h5 class="u-custom-font u-font-montserrat u-text u-text-2"> Elysium is a website that enables landlord and tenants to keep track of their rent.</h5>
            <p class="u-text u-text-3"> This website allows all parties involved in the transaction, including the landowner/landlord and the tenant, to see how much rent they will have to pay. And when do they make a payment, and when is their rent due date?</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="u-clearfix u-image u-section-2" id="sec-2d39" data-image-width="1600" data-image-height="1121">
  <div class="u-clearfix u-sheet u-sheet-1">
    <div class="u-align-left u-black u-container-style u-group u-group-1" data-animation-name="fadeIn" data-animation-duration="1500" data-animation-direction="Left" data-animation-delay="250">
      <div class="u-container-layout u-container-layout-1">
        <h5 class="u-text u-text-1"> about us</h5>
        <h1 class="u-custom-font u-font-montserrat u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Down">Elsyium</h1>
      </div>
    </div>
    <div class="u-black u-container-style u-group u-shape-rectangle u-group-2" data-animation-name="fadeIn" data-animation-duration="1750" data-animation-direction="Up" data-animation-delay="250">
      <div class="u-container-layout u-container-layout-2">
        <div class="u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-left u-container-style u-hover-feature u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                <h4 class="u-align-center u-text u-text-default u-text-3" data-animation-name="fadeIn" data-animation-duration="1250" data-animation-direction="Right" data-animation-delay="500">Our Mission</h4>
                <div class="u-border-2 u-border-black u-line u-line-horizontal u-line-1" data-animation-name="fadeIn" data-animation-duration="1250" data-animation-direction="Right" data-animation-delay="750"></div>
                <p class="u-text u-text-4" data-animation-name="zoomIn" data-animation-duration="1250" data-animation-direction="" data-animation-delay="500"> The goal of Elsyium's house rent tracker is to set a high standard of excellence and manage both residential and commercial properties to ensure our clients' success. Our amazing management team is the driving force behind our success and growth, and we work together to achieve excellence and assure the success of our clients, the well-being of our properties, and Elsyium's future.</p>
              </div>
            </div>
            <div class="u-align-left u-container-style u-hover-feature u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-2">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4">
                <h4 class="u-align-center u-text u-text-default u-text-5" data-animation-name="fadeIn" data-animation-duration="1250" data-animation-direction="Right" data-animation-delay="500">Our Vision</h4>
                <div class="u-border-2 u-border-black u-line u-line-horizontal u-line-2" data-animation-name="fadeIn" data-animation-duration="1250" data-animation-direction="Right" data-animation-delay="750"></div>
                <p class="u-text u-text-6" data-animation-name="zoomIn" data-animation-duration="1250" data-animation-direction="" data-animation-delay="500"> By setting the standard in the&nbsp;housing and&nbsp;property management, Elsyium's aim is to continue to be the preferred property management firm, giving comprehensive service and care to our clients, properties, and team members.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>

<?php

include("includes/footer.php");

?>
    
