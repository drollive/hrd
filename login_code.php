<?php
session_start();

include("config/db_con.php"); # Path where database locates

#if login button is clicked
if(isset($_POST['login_btn'])) 
{
    # mysqli_real_escape_string()
    # used to escape all special characters for use in an SQL query
    # Escape special characters, if any
    $email = mysqli_real_escape_string($con, $_POST["email"]); #
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    #normal user
    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data)
        {
            $user_id = $data['id'];
            $user_name = $data['fname']. ' '.$data['lname'];
            $user_email = $data['email'];
            $role_as = $data['role_as'];
        }
        $_SESSION['auth'] = true;
        #determine what role: 1-house owner, 0-tenant
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = 
        [
            "user_id"=>$user_id,
            "user_name"=>$user_name,
            "user_email"=>$user_email
        ];
    
        #redirect to tenant's dashboard
        if($_SESSION['auth_role'] == '1') # if the user is tenant
        {
            $_SESSION["message"] = "Welcome to Dashboard";
            header('Location: admin/index.php');
            exit(0);
        }

        #redirect to house owner's  dashboard
        elseif($_SESSION['auth_role'] == '0') # if the user is the house owner
        {
            $_SESSION["message"] = "You are logged in!";
            header('Location: tenant/index.php');
            exit(0);
        }
    
    }
    else
    {
        $_SESSION["message"] = "Invalid Email or Password";
        header("Location: login.php");
        exit(0);
    }
}
else
{
    $_SESSION["message"] = "You are not allowed to access!";
    header("Location: login.php");
    exit(0);
}
?>