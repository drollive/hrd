<?php
session_start();
include("admin/config/db_con.php"); # Path where database locates


function send_password_reset($get_fname, $get_email, $token)
{
    

}



if(isset($$_POST['forgot_pass']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);


    if(mysqli_num_rows($check_email_run) > 0 )
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_fname = $row['fname'];
        $get_email = $row['email'];
        
        #Update token every time the user click reset password
        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            #function to send password reset email
            send_password_reset($get_fname, $get_email, $token);
            $_SESSION['status'] = "We have sent you a link to your email";
            header("Location: forgotpass.php");
            exit(0);


        }
        else
        {
            $_SESSION['status'] = "Something went wrong!";
            header("Location: forgotpass.php");
            exit(0);

        }
    }
    #if no email found in the database
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("Location: forgotpass.php");
        exit(0);

    }
}











?>