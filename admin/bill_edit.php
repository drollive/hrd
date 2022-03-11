<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-6">
			<?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Bill
                        <a href="Bill_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php
                # This is to check if the id is available or not
                if(isset($_GET['id']))
                {
                    $bill_id = $_GET['id'];
                    $bill_edit = "SELECT * FROM bill_all WHERE bill_id = $bill_id";
                    $bill_edit_run = mysqli_query($con, $bill_edit); 

                    #To check if the data is available inside the query
                    if(mysqli_num_rows($bill_edit_run) > 0)
                    {
                        $row = mysqli_fetch_array($bill_edit_run);
                        ?>

                        <form action="code.php" method="POST"> 
                            <input type ="hidden" name= "bill_id" value="<?=$row['bill_id'] ?>"> </input>
                            
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="">Tenant</label>
                                    <?php
                                        
                                        $tenant = "SELECT * FROM tenant_user";
                                        $tenant_run = mysqli_query($con, $tenant);
                                        if(mysqli_num_rows($tenant_run) > 0)
                                        {
                                            ?>
                                            <select name="tenant_id" required class="form-control">
                                                <option value="<?=$row['tenant_id']?>"> <?=$row['tenant_id']?></option>
                                                <?php
                                                    foreach($tenant_run as $tenant)
                                                    {
                                                        ?>
                                                        <option value="<?=$tenant['tenant_id']?>"><?=$tenant['name'] ?></option>
                                                        <?php
                                                    }
                                                ?>
                                        
                                                </select>
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
                                    <input type="text" name="house_rent_pay" value="<?=$row['house_rent_pay']?>" placeholder="Please input the price" required class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Electric Bill</label>
                                    <input type="text" name="electric_bill" value="<?=$row['electric_bill']?>" placeholder="Please input the price" required class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Water BIll</label>
                                    <input type="text" name="water_bill" value="<?=$row['water_bill']?>" placeholder="Please input the price" required class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Other BIll</label>
                                    <input type="text" name="other_bill" value="<?=$row['other_bill']?>" placeholder="Please input the price" required class="form-control">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="">Other Bill Description</label>
                                    <textarea name="bill_desc"  id="summernote" class="form-control" rows="4"><?=$row['bill_desc']?></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="control-label" for="date">Due Date</label>
                                    <div class="col-sm-12">
                                        <div class="input-group date" id="datepicker">
                                            <input name="due_date" type="text" class="form-control" value="<?=$row['due']?>">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label> <br/>
                                    <input type="checkbox" id="checkbox" name = "bill_status" <?= $row['bill_status'] == '1' ? 'checked':'' ?> width="100px" height="100px">
                                    <label for="checkbox">Paid</label>
                                </div>
                                
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" onclick="return confirm('Are you sure you want to update?')" name="update_bill" class="btn btn-primary">Update Bill</button>
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tenants
                        <a href="tenant_view.php" class="btn btn-primary float-end">Tenants</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">House Address</th>
                                <th class="text-center">Monthly House Rent</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                $tenant = "SELECT * FROM tenant_user_house";
                                $tenant_run = mysqli_query($con, $tenant);

                                if(mysqli_num_rows($tenant_run) > 0)
                                {
                                    $balance = 0;

                                    foreach($tenant_run as $tenant)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?=$tenant['tenant_id']?></td>
                                            <td class="text-center"><?=$tenant['name']?></td>
                                            <td class="text-center"><?=$tenant['house_address']?></td>
                                            <td class="text-center">₱<?= number_format($tenant['house_price'], 2) ?></td>
                                            <td class="text-center"> 
                                                <?=$tenant['tenant_status'] == '1' ? 'Renting':'Not Renting'?>
                                            </td>

                                        </tr>

                                        <?php

                                    }
                                    
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="6">No record found</td>
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