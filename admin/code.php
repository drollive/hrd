<?php

include("authentication.php");

if(isset($_POST['add_house']))
{
	$house_add = $_POST['house_address'];
	$house_desc = $_POST['house_desc'];
	
	$house_status = $_POST['house_status'] == true ? '1':'0';
	$house_avail = $_POST['house_status'] == true ? '1':'0';
	
	$query = "INSERT INTO house (house_address, house_desc,house_status,house_avail) 
				VALUES ('$house_add ', '$house_desc', '$house_status', '$house_avail')";
				
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "House added Successfully";
        header("Location: house_add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: house_add.php");
        exit(0);
    }
}

# To delete user
if(isset($_POST['delete_user']))
{
    $user_id = $_POST['delete_user'];

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully!";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: view-register.php");
        exit(0);
    }
}

if(isset($_POST['add_user']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO users (fname,lname,email,phone,password,role_as,status) 
        VALUES('$fname', '$lname', '$email', '$phone', '$password','$role_as','$status' )";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Added Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: view-register.php");
        exit(0);
    }


}

if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', phone='$phone', password='$password', role_as='$role_as', status='$status'
                WHERE id='$user_id' ";
 
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: view-register.php");
        exit(0);
    }
}

?>