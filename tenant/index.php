<?php
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4"> 
    <h1 class="mt-4"></h1>
    <div class="row">
        <!--COUNTER FOR UNPAID BILLS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Unpaid Bills</h3>
                    </div>
                    <i class="fas fa-exclamation-triangle" style="font-size:40px;color:white"></i>
                </div>
                <?php
                if(isset($_SESSION['auth_user']))
                {
                    # To fetch data from table bill
                    $user_id = $_SESSION['auth_user']['user_id'];
                        $dash_query = "SELECT * FROM tenant_bill_view WHERE id={$user_id} AND bill_status = 0";
                        $dash_query_run = mysqli_query($con, $dash_query);

                        if($total = mysqli_num_rows($dash_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                }
                ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="bill.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--COUNTER FOR PAID BILLS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Paid Bills</h3>
                    </div>
                    <i class="fas fa-bell" style="font-size:40px;color:white"></i>
                </div>
                <?php
                if(isset($_SESSION['auth_user']))
                {
                    # To fetch data from table bill tenant view
                    $user_id = $_SESSION['auth_user']['user_id'];
                        $dash_query = "SELECT * FROM paid_bills WHERE id={$user_id}";
                        $dash_query_run = mysqli_query($con, $dash_query);

                        if($total = mysqli_num_rows($dash_query_run))
                        {
                            echo '<h3 class="mb-0 text-center">'.$total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                }
                ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="bill.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--TOTAL PAYMENTS -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Payments</h3>
                    </div>
                    <i class="far fa-credit-card" style="font-size:40px;color:white"></i>
                </div>
                <?php
                if(isset($_SESSION['auth_user']))
                {
                    # To fetch data from table bill
                        $user_id = $_SESSION['auth_user']['user_id'];
                        $dash_query = "SELECT *, SUM(payment_total) AS pay
                                        FROM tenant_payments_view 
                                        WHERE id={$user_id} 
                                        GROUP BY id";
                        $dash_query_run = mysqli_query($con, $dash_query);
                        $row = mysqli_fetch_array($dash_query_run);
                        # $paid = ((int)$row['payment_total']);
                        
                        
                        if(mysqli_num_rows($dash_query_run) > 0)
                        {
                            echo '<h3 class="mb-0 text-center">'.'₱'. number_format((int)$row['pay'], 2).'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                }
                ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="payment.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!--TOTAL BALANCE-->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body shadow-sm d-flex justify-content-around align-items-center">
                    <div>
                        <h3 class="fs-5">Balance</h3>
                    </div>
                    <i class="far fa-credit-card" style="font-size:40px;color:white"></i>
                </div>
                <?php
                if(isset($_SESSION['auth_user']))
                {
                    # To fetch data from table bill
                        $user_id = $_SESSION['auth_user']['user_id'];
                        $dash_query = "SELECT *, SUM(payment_total) AS pay, SUM(bill_total) AS bill
                                        FROM tenant_payments_view
                                        WHERE id={$user_id} 
                                        GROUP BY id";
                        $dash_query_run = mysqli_query($con, $dash_query);
                        $row = mysqli_fetch_array($dash_query_run);
                        
                        if(mysqli_num_rows($dash_query_run) > 0)
                        {
                            echo '<h3 class="mb-0 text-center">'.'₱'. number_format((int)$row['bill'] - (int)$row['pay'], 2).'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0 text-center ">No data</h3>';
                        }
                }
                ?>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="payment.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    <!--BASIC INFORMATION-->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Tenant Basic Information</h5>
                </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">House Address</th>
                                    <th class="text-center">House Monthly Rent</th>
                            </thead> 

                            <tbody>
                            <?php
                                # To fetch data from tables
                                $tenant = "SELECT * FROM tenant_user_house WHERE id={$user_id} ";
                                $tenant_run = mysqli_query($con,$tenant);
                                $row = mysqli_fetch_array($tenant_run);
                               
                                #To check each data or table has data
                            
                                if(mysqli_num_rows($tenant_run) > 0 )
                                {
                                    
                                    foreach($tenant_run as $tenant)
                                    { 
                                    
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $tenant['name'] ?></td>
                                            <td class="text-center"><?= $tenant['email'] ?></td>
                                            <td class="text-center"><?= $tenant['phone'] ?></td>
                                            <td class="text-center"><?= $tenant['house_address'] ?></td>
                                            <td class="text-center">₱<?= number_format($tenant['house_price'], 2) ?></td>
                                            
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