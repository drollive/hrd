<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Activity Logs</h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">Activity #</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Activity Date</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $logs = "SELECT * FROM logs";
                                $logs_run = mysqli_query($con,$logs);

                                #To check each data or table has data
                                if(mysqli_num_rows($logs_run) > 0 )
                                {
                                    foreach($logs_run as $log)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $log['log_id'] ?></td>
                                            <td class="text-center"><?= $log['user'] ?></td>
                                            <td class="text-center"><?= $log['action'] ?></td>
                                            <td class="text-center"><?= $log['log_date'] ?></td>
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
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>