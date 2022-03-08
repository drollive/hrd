<?php
session_start();
include('config/db_con.php');

#check if the button is clicked
if(isset($_POST['register_btn']) && $_POST['g-recaptcha-response'] != "")
{
    $secret = 'secret key';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if($password == $confirm_password)
    {
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        #This is to check email if it is already registered
        #Set up query
        $check_email = "SELECT email FROM users WHERE email='$email'";
        #to execute query
        $check_email_run = mysqli_query($con, $check_email);

        if(mysqli_num_rows($check_email_run) > 0 )
        {
            # email input already exist
            $_SESSION["message"] = "Email address already exist";
            header("Location: register.php");
            exit(0);
        }
        else
        {
            $fname = mysqli_real_escape_string($con, $_POST['fname']);
            $lname = mysqli_real_escape_string($con, $_POST["lname"]);
            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $password = mysqli_real_escape_string($con, $_POST["password"]);
            $confirm_password = mysqli_real_escape_string($con, $_POST["confirm_password"]);
            $phone = (is_numeric($_POST['phone']) ? (int)$_POST['phone'] : '');
            
            #password hashing for security
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user_query = "INSERT INTO users (fname,lname,email,phone,password) 
                            VALUES ('$fname','$lname','$email','$phone','$hash')";
            $user_query_run = mysqli_query($con, $user_query);
            
            if($user_query_run)
            {
                $_SESSION["message"] = "Registration Successful";
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION["message"] = "Something Went Wrong!";
                header("Location: register.php");
                exit(0);
            }
        }
    }
    #This is for not same password input
    else
    {
        $_SESSION["message"]= "Password and Confirm password doesn't match!";
        header("Location: register.php");
        exit(0);
    }


}
#if someone will access outside:
else
{
    header("Location: register.php");
    exit(0);
}

?>