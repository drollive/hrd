<?php
include("../config/db_con.php");
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4"> 
    <h1 class="mt-4"></h1>
    <?php include("message.php"); ?>   
    <div class="row">
        <!--COUNTER FOR AVAILABLE HOUSES -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Available House</h3>
                    </div>
                    <i class="fa fa-home" style="font-size:40px;color:white"></i>
                </div>
        
                    <?php
                        $dash_house_query = "SELECT * FROM house WHERE house_status = '1' ";
                        $dash_house_query_run = mysqli_query($con, $dash_house_query);

                        if($house_total = mysqli_num_rows($dash_house_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$house_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center" >No data</h3>';
                        }

                    ?>
                 
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="house_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--COUNTER FOR USERS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Total Users</h3>
                    </div>
                    <i class="fa fa-users" style="font-size:40px;color:white"></i>
                </div>
                    <?php
                        $dash_users_query = "SELECT * FROM users WHERE status != 2";
                        $dash_users_query_run = mysqli_query($con, $dash_users_query);
                        if($users_total = mysqli_num_rows($dash_users_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$users_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                    ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--COUNTER FOR TENANTS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Total Tenants</h3>
                    </div>
                    <i class="fa fa-user" style="font-size:40px;color:white"></i>
                </div>
                    <?php
                        $dash_users_query = "SELECT * FROM tenant WHERE tenant_status = 1";
                        $dash_users_query_run = mysqli_query($con, $dash_users_query);
                        if($tenant_total = mysqli_num_rows($dash_users_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$tenant_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                    ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--COUNTER FOR UNPAID -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Unpaid Bills</h3>
                    </div>
                    <i class="fas fa-exclamation-triangle" style="font-size:40px;color:white"></i>
                </div>
                    <?php
                        $dash_users_query = "SELECT * FROM bills WHERE bill_status = 0";
                        $dash_users_query_run = mysqli_query($con, $dash_users_query);
                        if($bill_total = mysqli_num_rows($dash_users_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$bill_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                    ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="bill_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--COUNTER FOR NUMBER OF PAYMENTS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Payments</h3>
                    </div>
                    <i class="far fa-credit-card" style="font-size:40px;color:white"></i>
                </div>
                    <?php
                        $dash_users_query = "SELECT * FROM payments WHERE payment_status != 2";
                        $dash_users_query_run = mysqli_query($con, $dash_users_query);
                        if($payment_total = mysqli_num_rows($dash_users_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$payment_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                    ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="payment_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--BALANCE REPORTS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Total Balance</h3>
                    </div>
                    <i class="fas fa-money-check-alt" style="font-size:40px;color:white"></i>
                </div>
                    <?php
                        $balance = 0;
                        $total = "SELECT SUM(payments.payment_total) AS paid, SUM(bills.bill_total) AS t_bill
                                    FROM payments 
                                    JOIN bills
                                    ON bills.bill_id=payments.bill_id
                                    WHERE payment_status !=2";
                        $total_run = mysqli_query($con, $total);
                        $row = mysqli_fetch_array($total_run);
                        $paid = $row['paid'];
                        $bills = $row['t_bill'];

                        $balance = $row['t_bill'] - $row['paid'];


                        echo '<h3 class="mb-0 text-center">'.'₱'.$balance.'</h3>';
  
                    ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="tenant_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="fs-5 text-center">Payments</p>
                </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Total Payment</th>
                                    <th class="text-center">Balance</th>
                                    <th class="text-center">Date</th>
                            </thead> 

                            <tbody>
                            <?php
                                # To fetch data from tables
                                $bill = $balance = 0;
                                $payment = "SELECT p.*, concat(u.fname,' ',u.lname) AS name, b.bill_total,
                                            DATE_FORMAT(p.payment_date, '%m/%d/%Y') AS pay
                                            FROM payments p 
                                            INNER JOIN bills b 
                                            INNER JOIN tenant t 
                                            INNER JOIN users u 
                                            ON p.bill_id = b.bill_id AND b.tenant_id = t.tenant_id AND t.users_id = u.id 
                                            WHERE payment_status != '2'
                                            ORDER BY pay ASC LIMIT 10";
                                $payment_run = mysqli_query($con,$payment);
                                $row = mysqli_fetch_array($payment_run);
                               
                                #To check each data or table has data
                            
                                if(mysqli_num_rows($payment_run) > 0 )
                                {
                                    foreach($payment_run as $pay)
                                    { 
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $pay['name'] ?></td>
                                            <td class="text-center"><?= '₱'.$pay['payment_total'] ?></td>
                                            <td class="text-center"><?php echo '₱'.$pay['bill_total'] - $pay['payment_total']?></td>
                                            <td class="text-center"><?= $pay['pay'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="6"> No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                
                            ?>
                            </tbody>

                        </table>
                </div>


                </div>
                
            </div>
            
        </div>

    

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <p class="fs-5 text-center">Bills</p>
                </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Total Bill</th>
                                    <th class="text-center">Due Date</th>
                            </thead> 

                            <tbody>
                            <?php
                                # To fetch data from table house
                                $bill = "SELECT concat(users.fname,' ',users.lname) AS name,  DATE_FORMAT(bills.due_date, '%m/%d/%Y') AS due,
                                            bills.bill_total
                                            FROM bills
                                            INNER JOIN tenant
                                            INNER JOIN users
                                            ON bills.tenant_id = tenant.tenant_id AND tenant.users_id = users.id
                                            WHERE bill_status = 0 
                                            ORDER BY due ASC LIMIT 10";
                                $bill_run = mysqli_query($con,$bill);
                                #To check each data or table has data
                            
                                if(mysqli_num_rows($bill_run) > 0 )
                                {
                                    foreach($bill_run as $bill)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $bill['name']?></td>
                                            <td class="text-center">₱<?= $bill['bill_total'] ?></td>
                                            <td class="text-center"><?= $bill['due']?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="6"> No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                
                            ?>
                            </tbody>

                        </table>
                </div>


                </div>
                
            </div>
            
        </div>
        
        
    </div>

    


<?php
include("includes/footer.php");
include("includes/scripts.php");
?>