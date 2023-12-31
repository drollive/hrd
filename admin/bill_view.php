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
                                    <th class="text-center">Bill Invoice</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Total Bill</th>
                                    <th class="text-center">Due Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead> 

                            <tbody>
                            <?php
                                # To fetch data from table house
                                $bill = "SELECT * FROM bill_users";
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
                                            <td class="text-center">₱<?= number_format($bill['bill_total'], 2) ?></td>
                                            <td class="text-center"><?= $bill['due']?></td>
                                            <td class="text-center">
                                                <?= $bill['bill_status'] == '1' ? 'Paid':'Unpaid' ?>
                                            </td>
                                        
                                            <td class="text-center">
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="bill_edit.php?id=<?= $bill['bill_id'] ?>" class="btn btn-info">Edit</a>
                                            </td>
                                        
                                            <td class="text-center">
                                                <input type="hidden" class="delete_id_value" value="<?= $bill['bill_id'] ?>"> </input>
                                                <a href="javascript:void(0)" class="delete_bill btn btn-danger">Delete</a> 
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