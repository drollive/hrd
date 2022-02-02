<?php

include("authentication.php");


if(isset($_POST['add_tenant']))
{
    $fname = $_POST['t_fname'];
    $lname = $_POST['t_lname'];
    $email = $_POST['tenant_email'];
    $phone = $_POST['t_phone'];
    $address = $_POST['t_rented_address'];
    $advance = $_POST['t_advance'];
    $rent_monthly = $_POST['t_rent_monthly'];
    $rent_date = date('Y-m-d', strtotime($_POST['t_rent_date']));
    $rent_gone = date('Y-m-d', strtotime($_POST['t_rent_gone']));

    $query = "INSERT INTO tenant (t_fname,t_lname,tenant_email,t_phone, t_rented_address, t_advance, t_rent_monthly, t_rent_date, t_rent_gone) 
                VALUES('$fname, '$lname', '$email', '$phone', '$address'. '$advance', '$rent_monthly','$rent_date','$rent_gone')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Added Successfully";
        header("Location: tenant_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: tenant_view.php");
        exit(0);
    }


}

?>