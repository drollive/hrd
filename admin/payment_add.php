<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-7">
		
			<?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Payment
                        <a href="payment_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>

                <div class="card-body">
                <form action="code.php" method="POST">
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Unpaid Bills</label>
                            <?php
                                $bills = "SELECT * FROM bills WHERE bill_status = 0 ";
                                $bills_run = mysqli_query($con, $bills);
                                if(mysqli_num_rows($bills_run ) > 0)
                                {
                                    ?>
                                    <select name="bill_id" required class="form-control">
                                        <option value="">Select Unpaid Bills to Pay</option>
                                        <?php
                                            foreach($bills_run as $bills)
                                            {
                                                ?>
                                                <option value="<?=$bills['bill_id']?>"><?=$bills['bill_id'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <h5>No Unpaid Bill</h5>
                                    <?php
                                }
                            ?>
                    
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Total Payment</label>
                            <input type="text" name="total_payment" placeholder="Please input the price" required="required" class="form-control">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="">Payment Description</label>
                            <textarea name="payment_desc"  id="summernote" class="form-control" rows="4"></textarea>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label class="control-label" for="date">Payment Date</label>
                            <div class="col-sm-12">
                                <div class="input-group date" id="datepicker">
                                    <input name="payment_date" type="text" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>    
						
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="add_payment" class="btn btn-primary">Add Payment</button>
                        </div>
                        
                    </div>
                </form>
                
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                        <h4>View Bills
                            <a href="bill_view.php" class="btn btn-primary float-end">Bills</a>
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
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead> 

                            <tbody>
                            <?php
                                # To fetch data from table house
                                $bill = "SELECT * FROM bill_all_stat";
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
                                            <td class="text-center">₱<?= number_format($bill['bill_total'], 2) ?></td>>
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