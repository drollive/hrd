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
                    <h4>Edit Bill
                        <a href="bill_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                <?php
                # This is to check if the id is available or not
                if(isset($_GET['id']))
                {
                    $house_id = $_GET['id'];
                    $house_edit = "SELECT * FROM house WHERE house_id='$house_id' LIMIT 1";
                    $house_edit_run = mysqli_query($con, $house_edit); 

                    #To check if the data is available inside the query
                    if(mysqli_num_rows($house_edit_run) > 0)
                    {
                        $row = mysqli_fetch_array($house_edit_run);
                        ?>

                        <form action="code.php" method="POST">
                            
                            <input type ="hidden" name= "house_id" value="<?=$row['house_id'] ?>">
                            <div class="row">
                
                                <div class="col-md-12 mb-3">
                                    <label for="">House Address</label>
                                    <input type="text" name="house_address" value="<?=$row['house_address'] ?>" required class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Monthly Rent</label>
                                    <input type="text" name="house_price" value="<?=$row['house_price'] ?>" required class="form-control">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="">House Description</label>
                                    <textarea name="house_desc" id="summernote"  class="form-control" rows="4"><?= $row['house_desc'] ?></textarea>
                                </div>
                                
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label> <br/>
                                    <input type="checkbox" name = "house_status" <?= $row['house_status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Availability</label> <br/>
                                    <input type="checkbox" name = "house_avail" <?= $row['house_avail'] == '1' ? 'checked':'' ?>  width="70px" height="70px">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <button type="submit" name="update_house" class="btn btn-primary">Update House</button>
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
    </div>
</div>

<?php

include("includes/footer.php");
include("includes/scripts.php");

?>