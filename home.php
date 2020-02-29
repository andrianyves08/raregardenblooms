<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="grey lighten-3">
  <?php 
    $current = "home";
    include 'includes/navbar.php'; ?>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">
        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="home.php">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">
          <div class="card mb-4 p-3">
            <h4>Gross Sales</h4>
        <canvas id="lineChart"></canvas>
        
        </div>
      </div>
      </div><br>
      <!-- DASHBOARD -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="inner">
            <div class="card mb-4 p-3 purple-gradient">
              <div class="inner">
                <?php
                  $result4 = mysqli_query($conn, "SELECT SUM(sales) as sum_total FROM invoice");
                  $row = mysqli_fetch_assoc($result4); 
                  $totalAmount = $row['sum_total'];
                  
                  echo "<h4><strong><i class='prefix'>₱ </i>".number_format($totalAmount, 2)."</strong></h4>";
                  ?>
                <p>Gross Sales</p>
              </div>
              <div class="card-footer">
                <strong><a href="invoice.php" class="small-box-footer white-text">More info </a></strong>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 blue-gradient">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM invoice";
                $query = mysqli_query($conn, $sql);
                
                echo "<h4><strong>".mysqli_num_rows($query)."</strong></h4>";
                ?>
              <p>No. of Invoices</p>
            </div>
            <div class="card-footer">
              <strong><a href="invoice.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 aqua-gradient">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM customers";
                $query = mysqli_query($conn, $sql);
                
                echo "<h4><strong>".mysqli_num_rows($query)."</strong></h4>";
                ?>
              <p>No. of Customers</p>
            </div>
            <div class="card-footer">
              <strong><a href="customers.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 peach-gradient">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM remittance";
                $query = mysqli_query($conn, $sql);
                
                echo "<h4><strong>".mysqli_num_rows($query)."</strong></h4>";
                ?>
              <p>No. of Remittance</p>
            </div>
            <div class="card-footer">
              <strong><a href="remittance.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <br>
      <!-- DASHBOARD -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="inner">
            <div class="card mb-4 p-3 rgba-blue-strong">
              <div class="inner">
                <?php
                  $result4 = mysqli_query($conn, "SELECT SUM(sales) as sum_total FROM invoice");
                  $row = mysqli_fetch_assoc($result4); 
                  $totalAmount = $row['sum_total'];
                  
                  $result5 = mysqli_query($conn, "SELECT SUM(amountDue) as amountdue_total FROM invoice");
                  $row1 = mysqli_fetch_assoc($result5); 
                  $totaldue = $row1['amountdue_total'];
                  
                  $currentSales =  $totalAmount - $totaldue;
                  
                  echo "<h4><strong><i class='prefix'>₱ </i>".number_format($currentSales, 2)."</strong></h4>";
                  ?>
                <p>Current Sales</p>
              </div>
              <div class="card-footer">
                <strong><a href="invoice.php" class="small-box-footer white-text">More info </a></strong>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 rgba-red-strong">
            <div class="inner">
              <?php
                $result5 = mysqli_query($conn, "SELECT SUM(amountDue) as amountdue_total FROM invoice");
                $row1 = mysqli_fetch_assoc($result5); 
                $totaldue = $row1['amountdue_total'];
                
                echo "<h4><strong><i class='prefix'>₱ </i>".number_format($totaldue, 2)."</strong></h4>";
                ?>
              <p>Total Unpaid Due</p>
            </div>
            <div class="card-footer">
              <strong><a href="unpaidDue.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 rgba-pink-strong">
            <div class="inner">
              <?php
                $result5 = mysqli_query($conn, "SELECT SUM(quantity) as quantity_total FROM invoiceitems");
                $row1 = mysqli_fetch_assoc($result5); 
                $totalquantity = $row1['quantity_total'];
                
                echo "<h4><strong>".number_format($totalquantity)."</strong></h4>";
                ?>
              <p>Total Quantity Sold</p>
            </div>
            <div class="card-footer">
              <strong><a href="inventory.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="card mb-4 p-3 rgba-purple-strong">
            <div class="inner">
              <h4><strong>0</strong></h4>
              <p>Total Inventory</p>
            </div>
            <div class="card-footer">
              <strong><a href="inventory.php" class="small-box-footer white-text">More info </a></strong>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <br>
    </div>
  </main>
  <!--Main layout-->
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/scripts.php'; ?>
  <script type="text/javascript">
    //line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
datasets: [{
label: "BBC",
data: [65, 59, 80, 81, 56, 55, 40, 40, 40, 50, 60],
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},
{
label: "IN-HOUSE",
data: [28, 48, 40, 19, 86, 27, 90],
backgroundColor: [
'rgba(0, 137, 132, .2)',
],
borderColor: [
'rgba(0, 10, 130, .7)',
],
borderWidth: 2
},
{
label: "Online",
data: [50, 60, 80, 85, 88, 90, 95],
backgroundColor: [
'rgba(255, 206, 86, 0.2)',
],
borderColor: [
'rgba(255, 206, 86, 1)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});
  </script>
</body>
</html>