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

        <!--COUNTER FOR POSTS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Total Posts</h3>
                    </div>
                    <i class="fa fa-sticky-note" style="font-size:40px;color:white"></i>
                </div>

                    <?php
                        $dash_post_query = "SELECT * FROM post WHERE house_status = '1' ";
                        $dash_post_query_run = mysqli_query($con, $dash_post_query);
                        if($post_total = mysqli_num_rows($dash_post_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$post_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center" >No data</h3>';
                        }

                    ?>
                <div class="card-footer d-flex align-items-center justify-content-between">

                    <a class="small text-white stretched-link" href="post_view.php">View Details</a>
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
                        $dash_users_query = "SELECT * FROM users";
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

        <!--MONTHLY REPORTS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Monthly Reports</h3>
                    </div>
                    <i class="far fa-window-restore" style="font-size:40px;color:white"></i>
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
                    <a class="small text-white stretched-link" href="payment_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class ="row">
        <div class="col-sm-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Monthly Revenue
                </div>
                <div class="card-body"><canvas id="myBarChart" width="150%" height="50"></canvas></div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
                                $bill = "SELECT *, concat(users.fname,' ',users.lname) AS name
                                            FROM bills
                                            INNER JOIN tenant
                                            INNER JOIN users
                                            ON bills.tenant_id = tenant.tenant_id AND tenant.users_id = users.id
                                            WHERE bill_status != 2 ";
                                $bill_run = mysqli_query($con,$bill);
                                #To check each data or table has data
                            
                                if(mysqli_num_rows($bill_run) > 0 )
                                {
                                    foreach($bill_run as $bill)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $bill['name']?></td>
                                            <td class="text-center"><?= $bill['bill_total'] ?></td>
                                            <td class="text-center"><?= $bill['due_date']?></td>
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

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="fs-5">Bills</p>
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
                                $bill = "SELECT *, concat(users.fname,' ',users.lname) AS name
                                            FROM bills
                                            INNER JOIN tenant
                                            INNER JOIN users
                                            ON bills.tenant_id = tenant.tenant_id AND tenant.users_id = users.id
                                            WHERE bill_status != 2 ";
                                $bill_run = mysqli_query($con,$bill);
                                #To check each data or table has data
                            
                                if(mysqli_num_rows($bill_run) > 0 )
                                {
                                    foreach($bill_run as $bill)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $bill['name']?></td>
                                            <td class="text-center"><?= $bill['bill_total'] ?></td>
                                            <td class="text-center"><?= $bill['due_date']?></td>
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

        <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Monthly Tenant Rent
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>