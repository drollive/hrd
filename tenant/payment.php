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
                                       $payment = "SELECT payments.*, concat(users.fname,' ',users.lname) AS name, bills
                                                    DATE_FORMAT(payments.payment_date, '%M %e, %Y') AS pay
                                                    FROM payments
                                                    INNER JOIN bills
                                                    INNER JOIN tenant
                                                    INNER JOIN users
                                                    ON payments.bill_id = bills.bill_id AND bills.tenant_id = tenant.tenant_id AND tenant.users_id = users.id
                                                    WHERE payment_status != '2'AND users.id={$user_id} ";
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
                                                    <td class="text-center">₱<?=$pay['payment_total'] ?></td>
                                                    <td class="text-center"><?php echo '₱'.$pay['bill_total'] - $pay['payment_total']?></td>
                                                    <td class="text-center"><?=$pay['payment_desc'] ?></td>
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