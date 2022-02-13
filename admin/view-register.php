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
                    <h4>View Registered Users
                        <a href="add-admin.php" class="btn btn-primary float-end">Add Admin</a>

                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                # To fetch data from table house
                                $users = "SELECT * FROM users WHERE status != '2' ";
                                $users_run = mysqli_query($con,$users);

                                #To check each data or table has data
                                if(mysqli_num_rows($users_run) > 0 )
                                {
                                    foreach($users_run as $user)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['fname'] ?></td>
                                            <td><?= $user['lname'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['phone'] ?></td>
                                            <td>
                                                <?= $user['status'] == '1' ? 'Visible':'Hidden' ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($user['role_as'] == '1') { echo 'Landlord'; } else { echo 'Tenant'; }
                                                ?>
                                            </td>
                                            <td>
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="edit-register.php?id=<?= $user['id'] ?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="delete_user" value="<?= $user['id'] ?> " href="" class="btn btn-danger">Delete</button>
                                                </form>
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