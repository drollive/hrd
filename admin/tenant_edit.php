<?php
include("authentication.php");
include("includes/header.php");

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-4">
		
			<?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Tenant
                        <a href="tenant_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                <?php
                # This is to check if the id is available or not
                if(isset($_GET['id']))
                {
                    $tenant_id = $_GET['id'];
                    $tenant= "SELECT * FROM tenant_user_house WHERE tenant_id='$tenant_id' ";
                    $tenant_run = mysqli_query($con,$tenant);
                    
                    #To check if the data is available inside the query
                    if(mysqli_num_rows($tenant_run) > 0)
                    {
                        $row = mysqli_fetch_array($tenant_run);

                        ?>
                        <form action="code.php" method="POST">
                            
                            <input type ="hidden" name= "tenant_id" value="<?=$row['tenant_id'] ?>"> </input>
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="">Users</label>
                                    <?php
                                        $users = "SELECT * FROM tenant_user_house";
                                        $users_run = mysqli_query($con, $users);
                                        if(mysqli_num_rows($users_run) > 0)
                                        {
                                            ?>
                                            <select name="id" required class="form-control">
                                                <option value="<?=$row['id']?>"> <?=$row['name']?> </option>
                                                
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
                                            <h5>No User Available</h5>
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">House List</label>
                                    <?php
                                        $house = "SELECT * FROM total_house ";
                                        $house_run = mysqli_query($con, $house);
                                        $row_house = mysqli_fetch_array($house_run);
                                        if(mysqli_num_rows($house_run) > 0)
                                        {
                                            ?>
                                            <select name="house_id" required class="form-control">
                                                <option value="<?=$row_house['house_id']?>"><?=$row['house_address']?></option>
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
                                    <input type="checkbox" name="tenant_status" <?= $row['tenant_status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                    <label for="checkbox">Active</label>
                                </div>
                
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" name="update_tenant" onclick="return confirm('Are you sure you want to update?')" class="btn btn-primary">Update Tenant</button>
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

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>House
                        <a href="house_view.php" class="btn btn-primary float-end">House</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Status</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $house = "SELECT * FROM house WHERE house_status != '2' ";
                                $house_run = mysqli_query($con,$house);

                                #To check each data or table has data
                                if(mysqli_num_rows($house_run) > 0 )
                                {

                                    foreach($house_run as $home)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $home['house_id'] ?></td>
                                            <td class="text-center"><?= $home['house_address'] ?></td>
                                            <td class="text-center">
                                                <?= $home['house_status'] == '1' ? 'Available':'Unavailable' ?>
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

        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Registered Users
                            <a href="view-register.php" class="btn btn-primary float-end">Users</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <div class="table-responsive">
                        <table id="myDataTable2" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Status</th>

                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    # To fetch data from table house
                                    $users = "SELECT *, concat(u.fname,' ',u.lname) AS name FROM users u WHERE role_as = 0 ";
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