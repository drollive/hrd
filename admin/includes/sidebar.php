<div id="layoutSidenav_nav">

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="view-register.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Registered Users
                </a>

                <div class="sb-sidenav-menu-heading">Menu</div>
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHouse" aria-expanded="false" aria-controls="collapseHouse">
                    <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                    House
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseHouse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="house_add.php">Add House</a>
                        <a class="nav-link" href="house_view.php">View House</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTenants" aria-expanded="false" aria-controls="collapseTenants">
                    <div class="sb-nav-link-icon"><i class="fa fa-user-plus"></i></div>
                    Tenants
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTenants" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="tenant_view.php">Add Tenant</a>
                        <a class="nav-link" href="tenant_list.php">List of Tenants</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBills" aria-expanded="false" aria-controls="collapseBills">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Bills
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseBills" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="bill/bill_add.php">Add Bills</a>
                        <a class="nav-link" href="bill/bill_list.php">List of Bills</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePayments" aria-expanded="false" aria-controls="collapsePayments">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                    Payments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePayments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="bill/bill_add.php">Add Payments</a>
                        <a class="nav-link" href="bill/bill_list.php">List of Payments</a>
                    </nav>
                </div>
                
                <div class="sb-sidenav-menu-heading">Add Ons</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapsePost">
                    <div class="sb-nav-link-icon"><i class="fa fa-server"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePost" aria-labelledby="Post" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="post_add.php">Add Post</a>
                        <a class="nav-link" href="post_view.php">View Post</a>
                    </nav>
                </div>
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