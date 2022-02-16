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
                    <h4>Add Tenant
                        <a href="tenant_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">           
                    <form action="code.php" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Registered Users</label>
                                <?php
                                    $users = "SELECT u.*,concat(u.lname,', ',u.fname) AS name FROM users u WHERE role_as='0' ";
                                    $users_run = mysqli_query($con, $users);
                                    if(mysqli_num_rows($users_run ) > 0)
                                    {
                                        ?>
                                        <select name="id" required class="form-control">
                                            <option value="">Select Registered Users</option>
                                            <?php
                                                foreach($users_run as $users)
                                                {
                                                    ?>
                                                    <option value="<?=$users['id']?>"><?=$users['name'] ?></option>
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
                                <label for="">House List</label>
                                <?php
                                    $house = "SELECT * FROM house WHERE house_status='1' ";
                                    $house_run = mysqli_query($con, $house);
                                    if(mysqli_num_rows($house_run) > 0)
                                    {
                                        ?>
                                        <select name="house_id" required class="form-control">
                                            <option value="">Select House ID</option>
                                            <?php
                                                foreach($house_run as $rent_home)
                                                {
                                                    ?>
                                                    <option value="<?=$rent_home['house_id']?>"><?=$rent_home['house_address'] ?></option>
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
                                <label for="">Status</label>
                                <input type="checkbox" name = "tenant_status"  width="70px" height="70px">
                             </div>
                            
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="add_tenant" class="btn btn-primary me-md-2">Add tenant</button>
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