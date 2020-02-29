 <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="home.php">
          <strong class="blue-text">Rare Garden Blooms</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
            <a class="nav-link waves-effect waves-light"><i class="fa fa-user" aria-hidden="true"></i> <span class="clearfix d-none d-sm-inline-block"><?php echo $user['firstname']. ' '.$user['lastname']; ?></span></a>
          </li>
            <li class="nav-item">
              <a href="https://www.facebook.com/raregardenblooms" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link waves-effect">
                <i class="fas fa-sign-out-alt"></i>Sign-out
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

       <div class="text-center">
          <a href="https://raregardenblooms.com" target="_blank">
            <img src="logo.jpg" style="height:150px;width:150px;" alt="">
          </a>
        </div>

      <div class="list-group list-group-flush">
          <strong class="mt-2 mb-2">REPORTS</strong>
          <a href="home.php" class="list-group-item list-group-item-action waves-effect <?php if($current == 'home') {echo 'active';} ?>">
            Dashboard</a>
          <a href="invoice.php" class="list-group-item list-group-item-action waves-effect <?php if($current == 'invoice') {echo 'active';} ?>">
           Invoice</a>
          <a href="expenses.php" class="list-group-item list-group-item-action waves-effect <?php if($current == 'expenses') {echo 'active';} ?>">
            Expenses</a>
          <strong class="mt-2 mb-2">MANAGE</strong>
          <a href="customers.php" class="list-group-item list-group-item-action waves-effect <?php if($current == 'customers') {echo 'active';} ?>">
            Customers</a>
          <a href="remittance.php" class="list-group-item list-group-item-action waves-effect <?php if($current == 'remittance') {echo 'active';} ?>">
            Remittance</a>
          <a href="inventory.php" class="list-group-item list-group-item-action waves-effect <?php if($current == 'inventory') {echo 'active';} ?>">
            Inventory</a>
          
        </div>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->