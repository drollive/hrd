<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
		
			<?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Post
                        <a href="tenant_add.php" class="btn btn-primary float-end">Add Tenant</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">House Address</th>
                            <th class="text-center">Monthly Rate</th>
                            <th class="text-center">Outstanding Balance</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </thead>
                        <?php
                            $tenant = "SELECT t.*,concat(u.lname,', ',u.fname) AS name, h.house_price, h.house_address
                                        FROM tenant t 
                                        INNER JOIN house h ON h.house_id = t.house_id
                                        INNER JOIN users u ON u.id = t.users_id";
                            $tenant_run = mysqli_query($con, $tenant);

                            if(mysqli_num_rows($tenant_run) > 0)
                            {
                                foreach($tenant_run as $tenant)
                                {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$tenant['tenant_id']?></td>
                                            <td><?=$tenant['name']?></td>
                                            <td><?=$tenant['house_address']?></td>
                                            <td><?=$tenant['house_price']?></td>
                                            <td> 
                                                <?=$tenant['tenant_status'] == '1' ? 'Renting':'Not Renting'?>
                                            </td>
                                            <td>
                                                <a href="tenant_edit.php?id=<?=$tenant['tenant_id']?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" class="btn btn-danger" value="<?=$tenant['tenant_id']?>" name="tenant_delete">Delete</button>
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
                                    <td colspan="6">No record found</td>
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