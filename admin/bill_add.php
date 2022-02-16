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
                    <h4>Add House
                        <a href="house_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                <form action="code.php" method="POST"> 
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="">Tenant</label>
                            <?php
                                $tenant = "SELECT t.*, concat(u.lname,', ',u.fname) AS name 
                                    FROM tenant t
                                    RIGHT JOIN users u
                                    ON t.users_id = u.id
                                    WHERE tenant_status='1'";

                                $tenant_run = mysqli_query($con, $tenant);
                                if(mysqli_num_rows($tenant_run) > 0)
                                {
                                    ?>
                                    <select name="id" required class="form-control">
                                        <option value="">Select Tenant</option>
                                        <?php
                                            foreach($tenant_run as $tenant)
                                            {
                                                ?>
                                                <option value="<?=$tenant['tenant_id']?>"><?=$tenant['name'] ?></option>
                                                <?php
                                            }
                                        ?>
                                
                                        </select
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <h5>No House Available</h5>
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">House Monthly Rent Payment</label>
                            <input type="text" name="house_price" placeholder="Please input the price" required="required" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Electric Bill</label>
                            <input type="text" name="house_price" placeholder="Please input the price" required="required" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Water BIll</label>
                            <input type="text" name="house_price" placeholder="Please input the price" required="required" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Other BIll</label>
                            <input type="text" name="house_price" placeholder="Please input the price" required="required" class="form-control">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="">Other Bill Description</label>
                            <textarea name="house_desc"  id="summernote" class="form-control" required="required" rows="4"></textarea>
                        </div>
                        
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label> <br/>
                            <input type="checkbox" id="checkbox" name = "house_status"  width="100px" height="100px">
                            <label for="checkbox">Check this box if the bill is not paid</label>
                        </div>
                        
						
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="add_bill" class="btn btn-primary">Add Bill</button>
                        </div>
                        
                    </div>
                </form>

                
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include("includes/footer.php");
include("includes/scripts.php");

?>