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
                    <h4>Add Post
                        <a href="post_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                            
                                
                    <form action="code.php" enctype="multipart/form-data" method="POST">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
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
                                                    <option value="<?=$rent_home['house_id']?>"><?=$rent_home['house_id'] ?></option>
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
                                <label for="">Post Title</label>
                                <input type="text" name="post_name" required class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Monthly Rent</label>
                                <input type="text" name="house_price" placeholder="Please input the price (number)" required="required" class="form-control">
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="">House Description</label>
                                <textarea name="house_desc"  id="summernote" class="form-control" required="required" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name = "house_status"  width="70px" height="70px">
                             </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            
                            
                            
                            <div class="col-md-6 mb-3">
                                <button type="submit" name="add_post" class="btn btn-primary">Save Post</button>
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