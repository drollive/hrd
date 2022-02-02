<?php
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registered Possible Tenants
                        <a href="tenant_add.php" class= "btn btn-primary float-end" >Add Tenant</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Rented House Address</th>
                                <th>Tenant Advance Payment</th>
                                <th>Tenant Monthly Rent</th>
                                <th>Tenant Rent Date</th>
                                <th>Tenant Left Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tenant
                                    ";
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
                                            <!--This for specific user call if-->
                                            <!--someone will edit data of specific user-->
                                            <!--ex. id=1, then only the user has id=1-->
                                            <!--will appear to be modify-->
                                            <td><a href="tenant_edit.php?id=<?=$row['tenant_id'];?>" class="btn btn-success">Edit</a></td>
                                            <td>
                                                <form action="tenant_code.php" method="POST">
                                                    <button type="submit" name="delete_user" value="<?= $row['tenant_id'];?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
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