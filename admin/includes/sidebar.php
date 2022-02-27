<div id="layoutSidenav_nav">
    <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);?>

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                
                <a class="nav-link <?= $page == 'index.php' ? 'active': ''?>" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard     
                </a>

                <a class="nav-link <?= $page == 'view-register.php' ? 'active': ''?>" href="view-register.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Registered Users
                </a>

                <div class="sb-sidenav-menu-heading">Menu</div>
				<a class="nav-link collapsed <?= $page == 'house_add.php' || $page == 'house_view.php' || $page == 'house_edit.php' ? 'active': ''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHouse" aria-expanded="false" aria-controls="collapseHouse">
                    <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                    House
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'house_add.php' || $page == 'house_view.php' || $page == 'house_edit.php'  ? 'show': ''?>" id="collapseHouse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'house_add.php' ? 'active': ''?>" href="house_add.php">Add House</a>
                        <a class="nav-link <?= $page == 'house_view.php' ? 'active': ''?>" href="house_view.php">View House</a>
                    </nav>
                </div>

                <a class="nav-link collapsed <?= $page == 'tenant_add.php' || $page == 'tenant_view.php' || $page == 'tenant_edit.php' ? 'active': ''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTenants" aria-expanded="false" aria-controls="collapseTenants">
                    <div class="sb-nav-link-icon"><i class="fa fa-user-plus"></i></div>
                    Tenants
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse  <?= $page == 'tenant_add.php' || $page == 'tenant_view.php' || $page == 'tenant_edit.php' ? 'show': ''?>" id="collapseTenants" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'tenant_add.php' ? 'active': ''?>" href="tenant_add.php">Add Tenant</a>
                        <a class="nav-link <?= $page == 'tenant_view.php' ? 'active': ''?>" href="tenant_view.php">View Tenants</a>
                    </nav>
                </div>

                <a class="nav-link collapsed <?= $page == 'bill_add.php' || $page == 'bill_view.php' || $page == 'bill_edit.php'? 'active': ''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBills" aria-expanded="false" aria-controls="collapseBills">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Bills
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'bill_add.php' || $page == 'bill_view.php' || $page == 'bill_edit.php' ? 'show': ''?>" id="collapseBills" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'bill_add.php' ? 'active': ''?>" href="bill_add.php">Add Bills</a>
                        <a class="nav-link <?= $page == 'bill_view.php' ? 'active': ''?>" href="bill_view.php">View Bills</a>
                    </nav>
                </div>

                <a class="nav-link collapsed <?= $page == 'payment_add.php' || $page == 'payment_view.php' || $page == 'payment_edit.php' ? 'active': ''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePayments" aria-expanded="false" aria-controls="collapsePayments">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                    Payments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'payment_add.php' || $page == 'payment_view.php' || $page == 'payment_edit.php' ? 'show': ''?>" id="collapsePayments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'payment_add.php' ? 'active': ''?>" href="payment_add.php">Add Payments</a>
                        <a class="nav-link <?= $page == 'payment_view.php' ? 'active': ''?>" href="payment_view.php">View Payments</a>
                    </nav>
                </div>
                
                
                <a class="nav-link collapsed <?= $page == 'monthly_report.php' || $page == 'balance_report.php' ? 'active': ''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReports" aria-expanded="false" aria-controls="collapseReports">
                    <div class="sb-nav-link-icon"><i class="fa fa-server"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'monthly_report.php' || $page == 'balance_report.php' || $page == 'post_edit.php' ? 'show': ''?>" id="collapseReports" aria-labelledby="Reports" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'monthly_report.php' ? 'active': ''?>" href="monthly_report.php">Monthly Report</a>
                        <a class="nav-link <?= $page == 'balance_report.php' ? 'active': ''?>" href="balance_report.php">Balance Report</a>
                    </nav>
                </div>

                <a class="nav-link collapsed <?= $page == 'post_add.php' || $page == 'post_view.php' || $page == 'post_edit.php' ? 'active': ''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapsePost">
                    <div class="sb-nav-link-icon"><i class="fa fa-server"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'post_add.php' || $page == 'post_view.php' || $page == 'post_edit.php' ? 'show': ''?>" id="collapsePost" aria-labelledby="Post" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'post_add.php' ? 'active': ''?>" href="post_add.php">Add Post</a>
                        <a class="nav-link <?= $page == 'post_view.php' ? 'active': ''?>" href="post_view.php">View Post</a>
                    </nav>
                </div>


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