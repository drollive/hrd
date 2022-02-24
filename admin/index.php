<?php
include("config/db_con.php");
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
                        <h3 class="fs-5">Avail House</h3>
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
                    <i class="fa fa-users" style="font-size:40px;color:white"></i>
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
                    <i class="fa fa-money" style="font-size:40px;color:white"></i>
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


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Area Chart Example
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="150%" height="30"></canvas></div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Pie Chart Example
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