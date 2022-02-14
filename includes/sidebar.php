<div id="layoutSidenav_nav">

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="tenant_bills.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Bills
                </a>

                <a class="nav-link" href="tenant_payments.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Payments
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php if(isset($_SESSION['auth_user'])) : ?>
            <?= $_SESSION['auth_user']['user_name']; ?>
            <?php endif;?>
        </div>
    </nav>
</div>