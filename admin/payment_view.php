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
                    <h4>View Payment
                        <a href="payment_add.php" class="btn btn-primary float-end">Add Payment</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">Payment Invoice</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Total Payment</th>
                                <th class="text-center">Total Balance</th>
                                <th class="text-center">Payment Description</th>
                                <th class="text-center">Date</th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                            
                                $payment = "SELECT * FROM pay_view";
                                $payment_run = mysqli_query($con,$payment);
                                $row = mysqli_fetch_array($payment_run);
                                
                                #To check each data or table has data
                                if(mysqli_num_rows($payment_run) > 0 )
                                {
                                    foreach($payment_run as $pay)
                                    {
                                        $val = ((int)$pay['bill_total'] - (int)$pay['payment_total']);
                                        
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $pay['payment_id'] ?></td>
                                            <td class="text-center"><?= $pay['name'] ?></td>

                                            <td class="text-center">₱<?= number_format($pay['payment_total'], 2) ?></td>
                                            <td class="text-center">₱<?= number_format($val, 2) ?></td>
                                            <td class="text-center"><?= $pay['payment_desc'] ?></td>
                                            <td class="text-center"><?= $pay['pay'] ?></td>
                                            <td class="text-center">
                                                <a href="payment_edit.php?id=<?=$pay['payment_id']?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" class="delete_id_value" value="<?= $pay['payment_id'] ?>"> </input>
                                                <a href="javascript:void(0)" class="delete_payment btn btn-danger">Delete</a> 
                                            </td>
                                            
                                        </tr>
                                        <?php

                                        

                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                            <td colspan="9"> No Record Found</td>
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