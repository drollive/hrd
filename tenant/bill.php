<?php
include("authentication.php");
include("includes/header.php");
?>


<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bill Records
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
                                        <th class="text-center">Bill Description</th>
                                        <th class="text-center">Due Date</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead> 

                                <tbody>
                                    <?php
                                    if(isset($_SESSION['auth_user']))
                                    {
                                       # To fetch data from table house
                                        $user_id = $_SESSION['auth_user']['user_id'];
                                        $bill = "SELECT * FROM tenant_bill_view WHERE id={$user_id}";
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
                                                    <td class="text-center">₱<?=$bill['bill_total'] ?></td>
                                                    <td class="text-center"><?=$bill['bill_desc'] ?></td>
                                                    <td class="text-center"><?= $bill['due']?></td>
                                                    <td class="text-center">
                                                        <?= $bill['bill_status'] == '1' ? 'Paid':'Unpaid' ?>
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