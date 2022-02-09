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
                    <h4>View Post
                        <a href="post_add.php" class="btn btn-primary float-end">Add Post</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripe">
                        <thead>
                            <th>ID</th>
                            <th>Post Title</th>
                            <th>House Address</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <?php
                            # $post = "SELECT * FROM post WHERE house_status !='2' ";
                            $post = "SELECT p.*, h.house_address AS address FROM post p,house h WHERE h.house_id = p.house_id AND p.house_status !='2' ";
                            $post_run = mysqli_query($con, $post);

                            if(mysqli_num_rows($post_run) > 0)
                            {
                                foreach($post_run as $post)
                                {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$post['post_id']?></td>
                                            <td><?=$post['post_name']?></td>
                                            <td><?=$post['address']?></td>
                                            <td><img src="../uploads/posts/<?= $post['image'] ?>" alt="Image" width="60px" height="60px"/></td>
                                            <td> 
                                                <?=$post['house_status'] == '1' ? 'Visible':'Hidden'?>
                                            </td>
                                            <td>
                                                <a href="post_edit.php?id=<?=$post['post_id']?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" class="btn btn-danger" value="<?=$post['post_id']?>" name="post_delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <?php

                                }
                                
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td colspan="6">No record found</td>
                                </tr>

                                <?php

                            }
                        ?>
                       
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