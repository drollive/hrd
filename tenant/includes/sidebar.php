<div id="layoutSidenav_nav">
    <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);?>

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>

                <a class="nav-link <?= $page == 'index.php' ? 'active': ''?>" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link <?= $page == 'house_view.php' ? 'active': ''?>" href="house_view.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    House 
                </a>
                
                <a class="nav-link <?= $page == 'bill.php' ? 'active': ''?>" href="bill.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bills    
                </a>

                <a class="nav-link <?= $page == 'payment.php' ? 'active': ''?>" href="payment.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Payments
                </a>

               
            </div>
        </div>
        <!--To determine the name of user in landlord page -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php if(isset($_SESSION['auth_user'])) : ?>
            <?= $_SESSION['auth_user']['user_name']; ?>
            <?php endif;?>
        </div>
    </nav>
</div>