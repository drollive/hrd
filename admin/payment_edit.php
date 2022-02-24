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
                    <h4>Edit Payment
                        <a href="payment_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                <?php
                # This is to check if the id is available or not
                if(isset($_GET['id']))
                {
                    $payment_id = $_GET['id'];
                    $payment_edit = "SELECT * FROM payments WHERE payment_id='$payment_id' LIMIT 1";
                    $payment_edit_run = mysqli_query($con, $payment_edit); 

                    #To check if the data is available inside the query
                    if(mysqli_num_rows($payment_edit_run) > 0)
                    {
                        $row = mysqli_fetch_array($payment_edit_run);
                        ?>

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
                                            <select name="id" disabled="" required class="form-control">
                                                <option value="<?=$row['bill_id']?>"><?=$row['bill_id']?></option>
                                                <?php
                                                    foreach($bills_run as $bills)
                                                    {
                                                        ?>
                                                        <option value="<?=$bills['bill_id']?>"><?=$bills['bill_id']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <h5>No Unpaid Bills</h5>
                                            <?php
                                        }
                                    ?>
                        
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="house_price" placeholder="Please input the price" required="required" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Payment Total</label>
                                    <input type="text" name="payment_total" placeholder="Please input the price" required="required" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Payment Description</label>
                                    <textarea name="house_desc" id="summernote"  class="form-control" rows="4"><?= $row['house_desc'] ?></textarea>
                                </div>
                                    
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Payment Status</label> <br/>
                                    <input type="checkbox" name = "payment_status"  width="70px" height="70px">
                                </div>
                                
                        
                                <div class="col-md-6 mb-3">
                                    <button type="submit" name="add_payment" class="btn btn-primary">Add Payment</button>
                                </div>
                                
                            </div>
                        </form>
                        
                        <?php 
                    }
                # if the data is not available
                    else
                    {
                        ?>
                        <h4> No Record Found</h4>
                        <?php
                    }
                }

                ?>

                
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include("includes/footer.php");
include("includes/scripts.php");

?>