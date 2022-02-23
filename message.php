<?php
if(isset($_SESSION["message"]))
{
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" > <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h5 class="text-center"><?=$_SESSION['message']; ?></h5>
        </div>
    
    <?php
    unset($_SESSION["message"]);
}
?>