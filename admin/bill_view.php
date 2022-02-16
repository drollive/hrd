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
                    <h4>View Bills
                        <a href="bill_add.php" class="btn btn-primary float-end">Add Bill</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tenant</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $house = "SELECT * 
                                            FROM bills
                                            INNER JOIN tenant
                                            ON bills.tenant_id = tenant.tenant_id
                                            WHERE bill_status != '2' ";

                                $house_run = mysqli_query($con,$house);

                                #To check each data or table has data
                                if(mysqli_num_rows($house_run) > 0 )
                                {
                                    foreach($house_run as $home)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $home['bill_id'] ?></td>
                                            <td><?= $home['total'] ?></td>
                                            <td><?= $home['bill_total'] ?></td>
                                            <td>
                                                <?= $home['bill_status'] == '1' ? 'Paid':'Not Paid' ?>
                                            </td>
                                        
                                            <td>
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="bill_edit.php?id=<?= $home['bill_id'] ?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="delete_bill" value="<?= $home['bill_id'] ?> "href="" class="btn btn-danger">Delete</button>
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