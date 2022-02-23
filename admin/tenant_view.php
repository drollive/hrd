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
                    <h4>View Tenants
                        <a href="tenant_add.php" class="btn btn-primary float-end">Add tenant</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">House Address</th>
                                <th class="text-center">Monthly House Rent</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                $tenant = "SELECT t.*,concat(u.fname,' ',u.lname) AS name, u.email, u.phone,u.id, h.house_price, h.house_address
                                            FROM tenant t 
                                            INNER JOIN house h ON h.house_id = t.house_id
                                            INNER JOIN users u ON u.id = t.users_id
                                            WHERE tenant_status != 2";
                                $tenant_run = mysqli_query($con, $tenant);

                                if(mysqli_num_rows($tenant_run) > 0)
                                {
                                    $balance = 0;

                                    foreach($tenant_run as $tenant)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?=$tenant['tenant_id']?></td>
                                            <td class="text-center"><?=$tenant['name']?></td>
                                            <td class="text-center"><?=$tenant['email']?></td>
                                            <td class="text-center"><?=$tenant['phone']?></td>
                                            <td class="text-center"><?=$tenant['house_address']?></td>
                                            <td class="text-center"><?=$tenant['house_price']?></td>
                        
                                            <td class="text-center"> 
                                                <?=$tenant['tenant_status'] == '1' ? 'Renting':'Not Renting'?>
                                            </td>
                                            <td class="text-center">
                                                <a href="tenant_edit.php?id=<?=$tenant['tenant_id']?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" class="delete_id_value" value="<?= $tenant['tenant_id'] ?>"> </input>
                                                <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a> 
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