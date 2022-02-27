<?php
include("../config/db_con.php");
include("authentication.php");
include("includes/header.php");
?>

<div class="container-fluid px-4"> 
    <h1 class="mt-4"></h1>
    <?php $_SESSION['auth_user'] ?>
    <?php include("../message.php"); ?>   
    <div class="row">
        
    </div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>