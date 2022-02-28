<?php
session_start();
include("config/db_con.php"); # Path where database locates


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';

function send_password_reset($get_fname, $get_email, $token)
{
    $mail = new PHPMailer(true);
                    
    $mail->isSMTP();                                           
    $mail->SMTPAuth   = true;
                                       
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->Username   = 'hrdelysium@gmail.com';
    $mail->Password   = 'elysium123';       
                            
    $mail->SMTPSecure = "tls";            
    $mail->Port       = 587;                                   

    //Recipients
    $mail->setFrom('hrdelysium@gmail.com', $get_email);
    $mail->addAddress($get_email);   
    

    $mail->isHTML(true);                                
    $mail->Subject = 'Reset Password Notification';


    $email_template ="
        <h2> Hello </h2>
        <h2> You received this email because tou are trying to recover your account</h2>
        <br></br>
        <a href= 'http://localhost/hrd/password_change.php?token=$token&email=$get_email'> Click this!</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}



if(isset($_POST['forgot_pass']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);


    if(mysqli_num_rows($check_email_run) > 0 )
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_fname = $row['fname'];
        $get_email = $row['email'];
        
        #Update token every time the user click reset password
        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
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


if(isset($_POST['update_pass'])) 
{
    $email = mysqli_real_escape_string($con, $_POST['email']); 
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($token) && !empty($new_password ) && !empty($confirm_password))
        {
            #To check if the token is valid
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1 ";
            $check_token_run = mysqli_query($con, $check_token);

            if(mysqli_num_rows($check_token_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    # To update the password in the database
                    $update_password = "UPDATE users SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run)
                    {
                        #New token
                        $new_token = md5(rand())."elysium";
                        $update_token = "UPDATE users SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_token_run = mysqli_query($con, $update_token);

                        $_SESSION['status'] = "New Password Successfully Updated!";
                        header("Location: login.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status'] = "Something Went Wrong. Password did not update!";
                        header("Location: password_change.php?token=$token&email=$email");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = "Password and Confirm password did not match!";
                    header("Location: password_change.php?token=$token&email=$email");
                    exit(0);
                }
                
            }
            else
            {
                $_SESSION['status'] = "Invalid Token!";
                header("Location: password_change.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "All fields are required!";
            header("Location: password_change.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Token Available";
        header("Location: password_change.php?token=$token&email=$email");
        exit(0);
    }
}

?>