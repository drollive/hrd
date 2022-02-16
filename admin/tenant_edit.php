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
                    <h4>Edit Post
                        <a href="post_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                <?php
                    if(isset($_GET['id']))
                    {
                        $post_id = $_GET['id'];
                        $post_query ="SELECT * FROM post WHERE post_id='$post_id' LIMIT 1"; 
                        $post_query_run = mysqli_query($con, $post_query);

                        if(mysqli_num_rows($post_query_run) > 0)
                        {
                            $post_row = mysqli_fetch_array($post_query_run);
                            ?>
                            <form action="code.php" enctype="multipart/form-data" method="POST">
                                
                                <input type="hidden" name="post_id" value="<?= $post_row['post_id']?>" />
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
                                                        <option value="<?=$rent_home['house_id']?>" 
                                                            <?=$rent_home['house_id'] == $post_row['house_id'] ? 'selected':'' ?> >
                                                            <?=$rent_home['house_id'] ?>
                                                        </option>
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
                                        <input type="text" name="post_name"  value="<?= $post_row['post_name']?>" required class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Monthly Rent</label>
                                        <input type="text" name="house_price"  value="<?= $post_row['house_price']?>" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="">House Description</label>
                                        <textarea name="house_desc"  id="summernote" class="form-control" rows="4"><?= $post_row['house_desc']?></textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name ="house_status"  <?= $post_row['house_status'] == '1' ? 'checked': '' ?>   width="70px" height="70px">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Image</label>
                                        <input type="hidden" name="old_image" value="<?= $post_row['image']?>" />
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-6 mb-3">
                                        <button type="submit" name="update_post" class="btn btn-primary">Update Post</button>
                                    </div>
                                    
                                </div>
                            </form>

                            <?php

                        }
                        else
                        {
                            ?>
                            <h4>No Record found</h4>

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