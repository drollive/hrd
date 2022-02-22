<?php
include("config/db_con.php");
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4"> 
    <h1 class="mt-4">House Owner</h1>
    <?php include("message.php"); ?>   
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Available House/s

                    <?php
                        $dash_house_query = "SELECT * FROM house WHERE house_status = '1' ";
                        $dash_house_query_run = mysqli_query($con, $dash_house_query);

                        if($house_total = mysqli_num_rows($dash_house_query_run))
                        {
                            echo '<h4 class="mb-0">'.$house_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0" >No data</h4>';
                        }

                    ?>
            
                  </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="house_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                Total Posts

                <?php
                    $dash_post_query = "SELECT * FROM post WHERE house_status = '1' ";
                    $dash_post_query_run = mysqli_query($con, $dash_post_query);
                    if($post_total = mysqli_num_rows($dash_post_query_run))
                    {
                        echo '<h4 class="mb-0">'.$post_total.'</h4>';
                    }
                    else
                    {
                        echo '<h4 class="mb-0" >No data</h4>';
                    }

                ?>

                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="post_view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                Total Users
                <?php
                    $dash_users_query = "SELECT * FROM users";
                    $dash_users_query_run = mysqli_query($con, $dash_users_query);
                    if($users_total = mysqli_num_rows($dash_users_query_run))
                    {
                        echo '<h4 class="mb-0">'.$users_total.'</h4>';
                    }
                    else
                    {
                        echo '<h4 class="mb-0" >No data</h4>';
                    }

                ?>


                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                Total Blocked Users

                <?php
                    $dash_users_query = "SELECT * FROM users WHERE status = '1'";
                    $dash_users_query_run = mysqli_query($con, $dash_users_query);
                    if($users_total = mysqli_num_rows($dash_users_query_run))
                    {
                        echo '<h4 class="mb-0">'.$users_total.'</h4>';
                    }
                    else
                    {
                        echo '<h4 class="mb-0" >No data</h4>';
                    }

                ?>
            
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
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