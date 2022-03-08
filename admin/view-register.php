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
                    <h4>Registered Users
                        <a href="add-admin.php" class="btn btn-primary float-end">Add Admin</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FirstName</th>
                                <th class="text-center">LastName</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $users = "SELECT * FROM users";
                                $users_run = mysqli_query($con,$users);

                                #To check each data or table has data
                                if(mysqli_num_rows($users_run) > 0 )
                                {
                                    foreach($users_run as $user)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $user['id'] ?></td>
                                            <td class="text-center"><?= $user['fname'] ?></td>
                                            <td class="text-center"><?= $user['lname'] ?></td>
                                            <td class="text-center"><?= $user['email'] ?></td>
                                            <td class="text-center"><?= $user['phone'] ?></td>
                                            <td class="text-center">
                                                <?= $user['status'] == '1' ? 'Active':'Inactive' ?>
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                    if($user['role_as'] == '1') { echo 'Landlord'; } else { echo 'Tenant'; }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="edit-register.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to Edit?')" class="btn btn-info">Edit</a>
                                            </td>

                                            <td class="text-center">
                                                <input type="hidden" class="delete_id_value" value="<?php echo $user['id'] ?>"> </input>
                                                <a href="javascript:void(0)" class="delete_user btn btn-danger">Delete</a> 
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