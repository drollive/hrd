<?php

include("authentication.php");

# Payment's table CRUD
if(isset($_POST['delete_btn_payment']))
{
    $payment_id = $_POST['delete_id'];

    if(isset($_SESSION['auth_user'])){
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Deleted payment '.$payment_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }
      
    $query = "CALL sp_payment_delete('$payment_id')";
    $query_run = mysqli_query($con, $query);

}
if(isset($_POST['update_payment']))
{
    $payment_id = $_POST['payment_id'];
    $bill_id = $_POST['bill_id'];
    $payment_total = (is_numeric($_POST['total_payment']) ? (int)$_POST['total_payment'] : 0);
    $payment_desc = $_POST['payment_desc'];
	$payment_date = date('Y-m-d', strtotime($_POST['payment_date']));

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Updated payment '.$payment_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }
	$query = "CALL sp_payment_update('$payment_id','$bill_id','$payment_total', '$payment_desc','$payment_date')";
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "Payment Updated Successfully";
        header("Location: payment_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: payment_add.php");
        exit(0);
    }
}
if(isset($_POST['add_payment']))
{
    $payment_id = $_POST['payment_id'];
    $bill_id = $_POST['bill_id'];
    # To check input if it's a number
    $payment_total = (is_numeric($_POST['total_payment']) ? (int)$_POST['total_payment'] : 0);
    $payment_desc = $_POST['payment_desc'];
	$payment_date = date('Y-m-d', strtotime($_POST['date']));

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Added payment '.$payment_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }

	$query = "CALL sp_payment_add('$bill_id', '$payment_total', '$payment_desc', '$payment_date')";
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "Payment added Successfully";
        header("Location: payment_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: payment_add.php");
        exit(0);
    }
}

# Bill's table CRUD 
if(isset($_POST['delete_btn_bill']))
{
    $bill_id = $_POST['delete_id'];

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Deleted bill '.$bill_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }

    $query ="CALL sp_bill_delete('$bill_id')";
    $query_run = mysqli_query($con, $query);
}
if(isset($_POST['update_bill']))
{
    $tenant_id = $_POST['tenant_id'];
    $bill_id = $_POST['bill_id'];
    $house_rent_pay = (is_numeric($_POST['house_rent_pay']) ? (int)$_POST['house_rent_pay'] : 0);
    $electric_bill = (is_numeric($_POST['electric_bill']) ? (int)$_POST['electric_bill'] : 0);
    $water_bill = (is_numeric($_POST['water_bill']) ? (int)$_POST['water_bill'] : 0);
    $other_bill = (is_numeric($_POST['other_bill']) ? (int)$_POST['other_bill'] : 0);
    $bill_desc = $_POST['bill_desc'];
	$bill_status = $_POST['bill_status'] == true ? '1':'0';
    $due_date = date('Y-m-d', strtotime($_POST['due_date']));

    $total_bill =  $house_rent_pay + $electric_bill + $water_bill + $other_bill;
	
    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Updated bill for tenant '.$tenant_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }

	$query = "CALL sp_bill_update ('$bill_id','$tenant_id', '$house_rent_pay','$electric_bill', '$water_bill',
                '$other_bill', '$bill_desc', '$bill_status', '$due_date','$total_bill')";
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "Bill Updated Successfully";
        header("Location: bill_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: bill_add.php");
        exit(0);
    }
}
if(isset($_POST['add_bill']))
{
    $tenant_id = $_POST['tenant_id'];
    $house_rent_pay = (is_numeric($_POST['house_rent_pay']) ? (int)$_POST['house_rent_pay'] : 0);
    $electric_bill = (is_numeric($_POST['electric_bill']) ? (int)$_POST['electric_bill'] : 0);
    $water_bill = (is_numeric($_POST['water_bill']) ? (int)$_POST['water_bill'] : 0);
    $other_bill = (is_numeric($_POST['other_bill']) ? (int)$_POST['other_bill'] : 0);
    $bill_desc = $_POST['bill_desc'];
	$bill_status = $_POST['bill_status'] == true ? '1':'0';
	$due_date = date('Y-m-d', strtotime($_POST['date']));

    $total_bill = $house_rent_pay + $electric_bill + $water_bill + $other_bill;

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Added bill for tenant '.$tenant_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }

	$query = "CALL sp_bill_add('$tenant_id', '$house_rent_pay','$electric_bill','$water_bill', '$other_bill','$bill_desc','$bill_status', '$due_date', '$total_bill')";
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "Bill added Successfully";
        header("Location: bill_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: bill_add.php");
        exit(0);
    }
}



# Tenant's table CRUD 
if(isset($_POST['delete_btn_tenant']))
{
    $tenant_id = $_POST['delete_id'];

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Deleted tenant '.$tenant_id .' by '.$user;
        $query = mysqli_query($con,"INSERT INTO logs (user,log_date,action) values ('".$user."', NOW(), '".$action."')");
    }
    $query ="UPDATE tenant SET tenant_status=2 WHERE tenant_id='$tenant_id' LIMIT 1 ";
    $query_run = mysqli_query($con, $query);

}
if(isset($_POST['update_tenant']))
{
    $users_id = $_POST['id'];
    $tenant_id = $_POST['tenant_id'];
    $house_id = $_POST['house_id'];
	$tenant_status = $_POST['tenant_status'] == true ? '1':'0';
	
    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Updated tenant '.$tenant_id .' by '.$user;
        $query = mysqli_query($con,"INSERT INTO logs (user,log_date,action) values ('".$user."', NOW(), '".$action."')");
    }
	$query = "UPDATE tenant SET users_id= '$users_id', house_id='$house_id', tenant_status='$tenant_status'
                WHERE tenant_id='$tenant_id'";
				
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "Tenant Updated Successfully";
        header("Location: tenant_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: tenant_add.php");
        exit(0);
    }
}

if(isset($_POST['add_tenant']))
{
	$users_id = $_POST['id'];
    $house_id = $_POST['house_id'];
	$tenant_status = $_POST['tenant_status'] == true ? '1':'0';
	
    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Added tenant '.$tenant_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }
	$query = "INSERT INTO tenant (users_id, house_id, tenant_status)
				VALUES ('$users_id', '$house_id', '$tenant_status')";
				
	$query_run = mysqli_query($con,$query);

   if($query_run)
    {
        $_SESSION['message'] = "Tenant added Successfully";
        header("Location: tenant_view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: tenant_add.php");
        exit(0);
    }
}

# House's table CRUD 
if(isset($_POST['delete_btn_house']))
{
    $house_id = $_POST['delete_id'];

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Deleted house '.$house_id .' by '.$user;
        $query = mysqli_query($con,"INSERT INTO logs (user,log_date,action) values ('".$user."', NOW(), '".$action."')");
    }
    $query ="UPDATE house SET house_status='2' WHERE house_id='$house_id' LIMIT 1 ";
    $query_run = mysqli_query($con, $query);

}
if(isset($_POST['update_house']))
{
    
    $house_id = $_POST['house_id'];
    $house_add = $_POST['house_address'];
    $house_price = (is_numeric($_POST['house_price']) ? (int)$_POST['house_price'] : 0);
    $house_desc = $_POST['house_desc'];
	$house_status = $_POST['house_status'] == true ? '1':'0';
	
    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Updated house '.$house_id .' by '.$user;
        $query = mysqli_query($con,"INSERT INTO logs (user,log_date,action) values ('".$user."', NOW(), '".$action."')");
    }
	$query = "UPDATE house SET house_address='$house_add', house_price='$house_price', house_desc='$house_desc', house_status='$house_status'
                WHERE house_id='$house_id' ";
    $query_run = mysqli_query($con, $query);

    
   if($query_run)
   {
       $_SESSION['message'] = "House Information Has Been Updated Successfully";
       #To go back ro the same form with the same id
       header("Location: house_edit.php?id=".$house_id);
       exit(0);
   }
   else
   {
       $_SESSION['message'] = "Something Went Wrong!";
       #To go back ro the same form with the same id
       header('Location: house_edit.php?id='.$house_id);
       exit(0);
   }
}
if(isset($_POST['add_house']))
{
	$house_add = $_POST['house_address'];
    $house_price = (is_numeric($_POST['house_price']) ? (int)$_POST['house_price'] : 0);
	$house_desc = $_POST['house_desc'];
	$house_status = $_POST['house_status'] == true ? '1':'0';
	
    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Added house '.$house_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }
	$query = "INSERT INTO house (house_address, house_price, house_desc,house_status) 
				VALUES ('$house_add ', '$house_price', '$house_desc', '$house_status')";
				
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

# User's table CRUD

if(isset($_POST['delete_btn_users']))
{
    $user_id = $_POST['delete_id'];

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Deleted user '.$user_id .' by '.$user;
        $query = mysqli_query($con,"INSERT INTO logs (user,log_date,action) values ('".$user."', NOW(), '".$action."')");
    }
    $query = "UPDATE users SET status = 2 WHERE id='$user_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
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

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Updated user '.$user_id .' by '.$user;
        $query = mysqli_query($con,"CALL sp_insert_logs('$user', NOW(), '$action')");
    }
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
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    if(isset($_SESSION['auth_user']))
    {
        $user = $_SESSION['auth_user']['user_name'];
        $action = 'Updated user '.$user_id .' by '.$user;
        $query = mysqli_query($con,"INSERT INTO logs (user,log_date,action) values ('".$user."', NOW(), '".$action."')");
    }
    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', phone='$phone', role_as='$role_as', status='$status'
                WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
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
