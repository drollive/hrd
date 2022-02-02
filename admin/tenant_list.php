<?php
include("config/db_con.php");
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Tenants</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registered Tenants</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tenant";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                
                                foreach($query_run as $row)
                                {
                                ?>
                                <tr>
                                    <td><?= $row['tenant_id']; ?></td>
                                    <td><?= $row['t_fname']; ?></td>
                                    <td><?= $row['t_lname']; ?></td>
                                    <td><?= $row['tenant_email']; ?></td>
                                    <td><?= $row['t_phone']; ?></td>
                                    <td><?= $row['t_rented_address']; ?></td>
                                    <td><?= $row['t_advance']; ?></td>
                                    <td><?= $row['rent_monthly']; ?></td>
                                    <td><?= $row['t_rent_date']; ?></td>
                                    <td><?= $row['t_gone_date']; ?></td>
                                    <td><a href="tenant_add.php" class="btn btn-success">Edit</a></td>
                                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                                </tr>
                                <?php
                            
                                }

                            }
                            else 
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
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