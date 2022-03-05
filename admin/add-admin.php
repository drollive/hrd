<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add user
                        <a href="view-register.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" required class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" required class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Email Address</label>
                            <input type="text" name="email" required class="form-control">
                        </div>
                        
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone"  required class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password"  required class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Role</label>
                            <select name="role_as" required class="form-control">
                                <option value="">>--Select Role--</option>
                                <option value="1">Landowner</option>
                                <option value="0">Tenant</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label> <br/>
                            <input type="checkbox" name = "status"  width="70px" height="70px">
                            <label for="checkbox">Active User</label>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
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