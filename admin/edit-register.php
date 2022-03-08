<?php
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">

                    <?php

                    if(isset($_GET['id']))
                    {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM users WHERE id='$user_id'";
                        $users_run = mysqli_query($con, $users);

                        if(mysqli_num_rows($users_run) > 0)
                        {
                            foreach($users_run as $user)
                            {
                             
                            ?>

                            <form action="code.php" method="POST">
                                <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                                    
                                <div class="row">
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="fname" value= "<?=$user['fname'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lname" value= "<?=$user['lname'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email Address</label>
                                        <input type="text" name="email" value= "<?=$user['email'];?>" class="form-control">
                                    </div>
                                    
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" value= "<?=$user['phone'];?>" class="form-control">
                                    </div>
                                    
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Role</label>
                                        <select name="role_as" required class="form-control">
                                            <option value="">>--Select Role--</option>
                                            <option value="1" <?=$user['role_as'] == '1' ? 'selected':''?>>Owner</option>
                                            <option value="0" <?=$user['role_as'] == '0' ? 'selected':''?>>Tenant</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Status</label><br/>
                                        <input type="checkbox" id="checkbox" name = "status" <?=$user['status'] == '1' ? 'checked':''?> width="70px" height="70px">
                                        <label for="checkbox">Active</label>
                                    </div>
                                    
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit"  onclick="return confirm('Are you sure you want to update?')" name="update_user" class="btn btn-primary">Update User</button>
                                    </div>
                                    
                                </div>
                            </form>
                                    
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }


                    }
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

include("includes/footer.php");
include("includes/scripts.php");

?>