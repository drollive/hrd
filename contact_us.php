<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
?>

<section class="section">
    <div class="container-lg">
        <div class="row gx-5">
                <div class="col-md-12 text-center">
                    <h2 class="section-title">
                        <span class="text-red">Contact </span>
                        Us
                    </h2>
                    <div class="underline mr-2 ml-2 mb-20"></div>
                    <p> Get in touch with Elysium Web Designer for latest updates   
                    </p>
                </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.224040267518!2d121.08108151616378!3d14.699918532878613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba7528549fb1%3A0x62d21f0cc60f364d!2sPolytechnic%20University%20of%20the%20Philippines%20Quezon%20City!5e0!3m2!1sen!2sph!4v1645880744555!5m2!1sen!2sph" width="100%" height="550" style="border: 24px;;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <div class="col-md-4 row gx-5 ">
                            
                            <label for="firstName" class= "form-label"></label>
                            <input type="text" class="form-control" id="firstName" placeholder="First Name" required> 

                            <label for="lastName" class= "form-label"></label>
                            <input type="text" class="form-control" id="lastName" placeholder="Last Name" required> 
                            
                            <label for="email" class= "form-label"></label>
                            <input type="text" class="form-control" id="email" placeholder="Email Address" required> 

                            <span class="form-label" id="basic-addon1"></span>
                             <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">

                             <label> </label>
                                <textarea name="" class="form-control" placeholder="Type your message" rows="3"></textarea>
                                
                            <div class="row"></div>

                            <button type="submit" class="btn btn-primary btn-block">Submit</button>

                            <div class="row"></div>
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