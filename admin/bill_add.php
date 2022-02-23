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
                    <h4>Create Bill
                        <a href="bill_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                <form action="code.php" method="POST"> 
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="">Tenant</label>
                            <?php
                                $tenant = "SELECT t.*, concat(u.fname,' ',u.lname) AS name 
                                    FROM tenant t
                                    RIGHT JOIN users u
                                    ON t.users_id = u.id
                                    WHERE tenant_status='1'";

                                $tenant_run = mysqli_query($con, $tenant);
                                if(mysqli_num_rows($tenant_run) > 0)
                                {
                                    ?>
                                    <select name="tenant_id" required class="form-control">
                                        <option value="">Select Tenant</option>
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
                            <input type="text" name="house_rent_pay" placeholder="Please input the price" required class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Electric Bill</label>
                            <input type="text" name="electric_bill" placeholder="Please input the price" required class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Water BIll</label>
                            <input type="text" name="water_bill" placeholder="Please input the price" required class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Other BIll</label>
                            <input type="text" name="other_bill" placeholder="Please input the price" required class="form-control">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="">Other Bill Description</label>
                            <textarea name="bill_desc"  id="summernote" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="control-label" for="date">Due Date</label>
                            <div class="col-sm-12">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control">
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
                            <input type="checkbox" id="checkbox" name = "bill_status"  width="100px" height="100px">
                            <label for="checkbox">Check this box if the bill is paid</label>
                        </div>
                        
						
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="add_bill" class="btn btn-primary">Add Bill</button>
                        </div>
                        
                    </div>
                </form>

                
                </div>
            </div>
        </div>

    
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>View Tenants
                        <a href="tenant_view.php" class="btn btn-primary float-end">Tenants</a>
                    </h4>
                </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">House Address</th>
                                    <th class="text-center">House Price</th>
                                    <th class="text-center">Date In</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead> 
                            <tbody>
                            <?php
                                # To fetch data from table tenants details
                                $bill = "SELECT *, concat(users.fname,' ',users.lname) AS name, tenant.tenant_status, house.house_address
                                            FROM tenant
                                            INNER JOIN users
                                            INNER JOIN house
                                            ON tenant.users_id = users.id AND tenant.house_id = house.house_id
                                            WHERE tenant_status = 1";
                                $bill_run = mysqli_query($con,$bill);
                                #To check each data or table has data
                                
                            
                                if(mysqli_num_rows($bill_run) > 0 )
                                {
                                    foreach($bill_run as $bill)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $bill['name']?></td>
                                            <td class="text-center"><?= $bill['house_address'] ?></td>
                                            <td class="text-center"><?= $bill['house_price'] ?></td>
                                            <td class="text-center"><?= $bill['date_in'] ?></td>
                                            <td class="text-center">
                                                <?= $bill['tenant_status'] == '1' ? 'Renting':' ' ?>
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