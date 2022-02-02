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
                    <h4>Add House
                        <a href="house_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                <form action="code.php" method="POST">
                    
                    <div class="row">
           
                        <div class="col-md-12 mb-3">
                            <label for="">House Address</label>
                            <input type="text" name="house_address" required="required" class="form-control">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="">House Description</label>
                            <textarea name="house_desc" class="form-control" required="required" rows="4"></textarea>
							
                        </div>
                        
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label> <br/>
                            <input type="checkbox" name = "house_status"  width="70px" height="70px">
                        </div>
                        
						<div class="col-md-6 mb-3">
                            <label for="">Availability</label> <br/>
                            <input type="checkbox" name = "house_avail"  width="70px" height="70px">
                        </div>
						
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="add_house" class="btn btn-primary">Add House</button>
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