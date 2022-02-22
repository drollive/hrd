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

<body class="">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <?php
                                    if(isset($_SESSION['status']))
                                    {
                                        ?>
                                        <div class=" alert alert-warning">
                                            <h5 class="text-center"><?=$_SESSION['status']; ?></h5>
                                        </div>
                                        <?php
                                        unset($_SESSION['status']);
                                    }
                                ?>
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>

                                <div class="card-body">
                                    <form action="forgotpass_code.php" method="POST">
                                        <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])) {echo $_GET['token']; } ?>"> </input>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" value="<?php if(isset($_GET['email'])) {echo $_GET['email']; } ?>" required type="email" placeholder="name@gmail.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="new_password" required type="password" placeholder="Password" />
                                            <label for="inputPassword">New Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputCPassword" name="confirm_password" required type="password" placeholder="Confirm Password" />
                                            <label for="inputCPassword">Confirm New Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-md-end">
                                            <button type="submit" name="update_pass" class="btn btn-primary"> Update Password </button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<?php

include("includes/footer.php");

?>