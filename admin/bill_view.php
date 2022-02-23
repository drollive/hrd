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
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Total Bill</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
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
                                            <td class="text-center"><?= $bill['bill_id'] ?> </td>
                                            <td class="text-center"><?= $bill['name']?></td>
                                            <td class="text-center"><?= $bill['bill_total'] ?></td>
                                            <td class="text-center"><?= $bill['due_date']?></td>
                                            <td class="text-center">
                                                <?= $bill['bill_status'] == '1' ? 'Paid':'Unpaid' ?>
                                            </td>
                                        
                                            <td class="text-center">
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="bill_edit.php?id=<?= $bill['bill_id'] ?>" class="btn btn-info">Edit</a>
                                            </td>
                                        
                                            <td class="text-center">
                                                <input type="hidden" class="delete_id_value" value="<?= $bill['bill_id'] ?>"> </input>
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
                                        <td colspan="6"> No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                
                            ?>
                        </tbody>
                        <table>
                        
                        </table>
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