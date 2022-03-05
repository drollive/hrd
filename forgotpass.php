
<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.
include("includes/header.php");
include("includes/navbar.php");
?>

<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                <?php include("message.php"); ?>
                    <div class="card shadow-lg border-0 rounded-lg mt-1">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                        <div class="card-body">
                            <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                            
                            <form action="forgot_pass_code.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="login.php">Return to login</a>
                                    <button type="submit" name="forgot_pass" class="btn btn-primary"> Reset Password </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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