<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand ps-3 " href="index.php"><img src=images/logo.png alt="" width="100" height="100"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="house.php">Houses</a>
        </li>

        <?php if(isset($_SESSION['auth_user'])) : ?>
            <li class="nav-item">
               <a class="nav-link" href="tenant/index.php">Dashboard</a>
            </li>
            <li class="nav-item dropdown">  
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['auth_user']['user_name']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <form action="all_code.php" method="POST">
                    <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>
            </li>

        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>