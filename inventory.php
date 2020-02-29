<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "inventory";
  include 'includes/navbar.php'; ?>

  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">
        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="home.php">Home Page</a>
            <span>/</span>
            <span>Inventory</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->
      <!-- DASHBOARD -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="inner">
            <div class="card mb-4 p-3 purple-gradient">
              <div class="inner">
        
                <p>Inventory</p>
              </div>
              <div class="card-footer">
                <strong><a href="inventorycount.php" class="small-box-footer white-text">More info </a></strong>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 blue-gradient">
            <div class="inner">

              <p>Products</p>
            </div>
            <div class="card-footer">
              <strong><a href="products.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 aqua-gradient">
            <div class="inner">

              <p>Damages and Spoilages</p>
            </div>
            <div class="card-footer">
              <strong><a href="spoilage.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 peach-gradient">
            <div class="inner">

              <p>Reconcilliation</p>
            </div>
            <div class="card-footer">
              <strong><a href="reconciliation.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
  </main>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>


</body>

</html>
