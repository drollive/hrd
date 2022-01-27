<?php
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registered Users
                        <a href="add-admin.php" class= "btn btn-primary float-end" >Add Admin</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['fname']; ?></td>
                                            <td><?= $row['lname']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['phone']; ?></td>
                                            <td>
                                                <?php
                                                if($row['role_as'] == 1) # Admin
                                                {
                                                    echo 'Owner';
                                                }
                                                elseif ($row['role_as'] == 0) # tenants
                                                {
                                                    echo 'Tenant';
                                                }
                                                ?>

                                            </td>
                                            <!--This for specific user call if-->
                                            <!--someone will edit data of specific user-->
                                            <!--ex. id=1, then only the user has id=1-->
                                            <!--will appear to be modify-->
                                            <td><a href="edit-register.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="delete_user" value="<?= $row['id'];?>" class="btn btn-danger">Delete</button>
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
                                    <td colspan="6">No Record Found</td>
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

<?php

include("includes/footer.php");
include("includes/scripts.php");

?>