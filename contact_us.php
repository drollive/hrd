<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
include ('sendEmail.php');
?>


    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->

<section class="section">
    <div class="container-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.224040267518!2d121.08108151616378!3d14.699918532878613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba7528549fb1%3A0x62d21f0cc60f364d!2sPolytechnic%20University%20of%20the%20Philippines%20Quezon%20City!5e0!3m2!1sen!2sph!4v1645880744555!5m2!1sen!2sph" width="100%" height="550" style="border: 24px;;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <div class="col-md-4 row gx-5 ">
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" id="inputName" type="text" placeholder="Name" />
                                <label for="inputName">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                            </div>
                            
                        
                            <div class="form-floating mb-3">
                                <textarea name="message" class="form-control" style="height: 100%" placeholder="Type your message" rows="10" ></textarea>
                            </div>
                                
                            <div class="row"></div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="submit" value="Send" class="btn btn-primary btn-block">Submit</button>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="underline mr-2 ml-2 mb-15"></div>
                                <p> Get in touch with Elysium Web Designer for latest updates   
                                </p>
                            </div>

                        </form>
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