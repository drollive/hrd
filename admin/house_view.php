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
                    <h4>View House/s
                        <a href="house_add.php" class="btn btn-primary float-end">Add House</a>
                    </h4>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>

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
                                            <td class="text-center"><?= $home['house_price'] ?></td>
                                            <td class="text-center">
                                                <?= $home['house_status'] == '1' ? 'Available':'Unavailable' ?>
                                            </td>
                                        
                                            <td>
                                                <! --- Pass the parameter id to edit a row --->
                                                <a href="house_edit.php?id=<?= $home['house_id'] ?>" class="btn btn-info">Edit</a>
                                            </td>
                                            
                                            <td>
                                                <input type="hidden" class="delete_id_house" value="<?= $home['house_id'] ?>"> </input>
                                                <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a> 
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