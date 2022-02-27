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
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Total Payment</th>
                                <th class="text-center">Payment Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $payment = "SELECT payments.*, concat(users.fname,' ',users.lname) AS name 
                                            FROM payments
                                            INNER JOIN bills
                                            INNER JOIN tenant
                                            INNER JOIN users
                                            ON payments.bill_id = bills.bill_id AND bills.tenant_id = tenant.tenant_id AND tenant.users_id = users.id
                                            WHERE payment_status != '2' ";
                                $payment_run = mysqli_query($con,$payment);

                                #To check each data or table has data
                                if(mysqli_num_rows($payment_run) > 0 )
                                {
                                    foreach($payment_run as $pay)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $pay['payment_id'] ?></td>
                                            <td class="text-center"><?= $pay['name'] ?></td>
                                            <td class="text-center"><?= $pay['payment_total'] ?></td>
                                            <td class="text-center"><?= $pay['payment_date'] ?></td>
                                            <td class="text-center">
                                                <?= $pay['payment_status'] == '1' ? 'Visible':'Hidden' ?>
                                            </td class="text-center">
                                            
                                            <td class="text-center">
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="payment_edit.php?id=<?= $pay['payment_id'] ?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" class="delete_id_payment" value="<?= $pay['payment_id'] ?>"> </input>
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