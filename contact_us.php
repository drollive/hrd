<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
include ('sendEmail.php');
?>

<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container mt-4">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.224040267518!2d121.08108151616378!3d14.699918532878613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba7528549fb1%3A0x62d21f0cc60f364d!2sPolytechnic%20University%20of%20the%20Philippines%20Quezon%20City!5e0!3m2!1sen!2sph!4v1645880744555!5m2!1sen!2sph" width="100%" height="550" style="border: 24px;;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                    <div class="col-md-4 mt-5">
                                        <div class="col-md-12 text-center">
                                            <!--alert messages start-->
                                            <?php echo $alert; ?>
                                            <!--alert messages end-->
                                        </div>
                                        <form action="" method="POST">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" required name="name" id="inputName" type="text" placeholder="Name" />
                                                <label for="inputName">Name</label>
                                            </div>

                                            <div class="form-floating mb-4">
                                                <input class="form-control" required name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            
                                            <div class="form-floating mb-4">
                                                <textarea required name="message" class="form-control" id="inputText" style="height: 100%" placeholder="Type your message" rows="10" ></textarea>
                                                <label for="inputText">Message</label>
                                            </div>
                                                
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" name="submit" value="Send" class="btn btn-primary btn-block">Send</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
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