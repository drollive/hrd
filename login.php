<?php
session_start(); # To store information to be used across multiple pages
                 # Unlike a cookie, the information is not stored on the users computer.

# This is for an user trying to access login.php
# but still but already logged in

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION["message"]))
    {
        $_SESSION["message"] = "You are already logged in!";
    }
    header("Location: index.php");
    exit(0);
}

include("includes/header.php");
include("includes/navbar.php");
?>

<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-4">
                <?php include("message.php"); ?>
                <div class="card">
                    <div class="card-header"><h3 class="text-center font-weight-light my-3">Login</div>

                    <div class="card-body">
                        
                        <form action="login_code.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <input required type="email" name="email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input required type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                        
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="forgotpass.php">Forgot Password?</a>
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
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