<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add tenant
                        <a href="tenant_list.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="tenant_code.php" method="POST">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="t_fname" class="form-control" required="required">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="t_lname" class="form-control" required="required">
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="">Email Address</label>
                            <input type="email" name="tenant_email" class="form-control" required="required">
                        </div>
                        
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Phone Number</label>
                            <input type="number" name="t_phone"  class="form-control" required="required">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">House Rent Address</label>
                            <input type="text" name="t_rented_address" class="form-control" required="required">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Tenant Advance Payment</label>
                            <input type="number" name="t_advance" class="form-control" required="required">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Tenant Monthly Rent</label>
                            <input type="number" name="t_rent_monthly" class="form-control" required="required">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">House Rent Date</label>
                            <input type="date" name="t_rent_date" class="form-control" required="required">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">House Left Rent</label>
                            <input type="date" name="t_rent_gone" class="form-control">
                        </div>
                        
                        <div class="col-md-8 mb-3">
                            <button type="submit" name="add_tenant" class="btn btn-primary">Add Tenant</button>
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
