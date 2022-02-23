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
                                    $users = "SELECT u.*,concat(u.fname,' ',u.lname) AS name FROM users u WHERE role_as='0' ";
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
                                <label for="">Status</label> <br/>
                                <input type="checkbox" name = "tenant_status"  width="70px" height="70px">
                                <label for="checkbox">Check this box if the tenant is active</label>
                             </div>
                            
                            
                             <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="add_tenant" class="btn btn-primary me-md-2">Add tenant</button>
                            </div>
                            
                        </div>
                    </form>
                            
                
                </div>
            </div>
        </div>
        <div class="col-md-5">
            
            <div class="card">
                <div class="card-header">
                    <h4>View Registered Users
                        <a href="view-register.php" class="btn btn-primary float-end">Users</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Status</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $users = "SELECT *, concat(u.fname,' ',u.lname) AS name FROM users u WHERE status != '2' ";
                                $users_run = mysqli_query($con,$users);

                                #To check each data or table has data
                                if(mysqli_num_rows($users_run) > 0 )
                                {
                                    foreach($users_run as $user)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $user['id'] ?></td>
                                            <td class="text-center"><?= $user['name'] ?></td>
                                            <td class="text-center"><?= $user['email'] ?></td>
                                            <td class="text-center"><?= $user['phone'] ?></td>
                                            <td class="text-center">
                                                <?= $user['status'] == '1' ? 'Active':'Inactive' ?>
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