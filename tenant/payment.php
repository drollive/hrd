<?php
include("authentication.php");
include("includes/header.php");
?>


<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Records
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
                                        <th class="text-center">Balance</th>
                                        <th class="text-center">Payment Description</th>
                                        <th class="text-center">Payment Date</th>
                                    </tr>
                                </thead> 

                                <tbody>
                                    <?php
                                    if(isset($_SESSION['auth_user']))
                                    {
                                       # To fetch data from table 
                                       $user_id = $_SESSION['auth_user']['user_id'];
                                       $payment = "SELECT * FROM tenant_payments_view WHERE id={$user_id} ";
                                        $payment_run = mysqli_query($con,$payment);
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
                                                    <td class="text-center">₱<?= number_format($val, 2) ?></td>                                                    <td class="text-center"><?=$pay['payment_desc'] ?></td>
                                                    <td class="text-center"><?= $pay['pay'] ?></td>
                                                
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
                                    }
                                    ?>
                                    </tbody>

                        </table>
                    </div>
                
                </div>
            </div>
        </div>
<?php
include("includes/footer.php");
include("includes/scripts.php");

?>