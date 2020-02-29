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
            <span>Reconciliation</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->

         <!-- DASHBOARD -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <!--Card content-->
            <div class="card-body">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
      aria-controls="pills-home" aria-selected="true">New</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
      aria-controls="pills-profile" aria-selected="false">History</a>
  </li>
</ul>
<div class="tab-content pt-2 pl-1" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th class="th-sm">Item Name
      </th>
      <th class="th-sm">Inventory Quantity
      </th>
      <th class="th-sm">Counted
      </th>
      <th class="th-sm">Remarks
      </th>
    </tr>
  </thead>
  <tbody>
           <tr>
             <td>Cymbidium Khan Flame</td>
             <td>15</td>
             <td>
                <input type="number" id="amounttopay" name="amounttopay" class="form-control mb-4"required>
              </td>
              <td>
                <input type="text" id="amounttopay" name="amounttopay" class="form-control mb-4"required>
              </td>
           </tr>
  </tbody>
</table>
                 <div class="text-center">
        <a class="btn btn-success btn-rounded mb-4">Save</a>
      </div> 
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
  </div>

</div>

         
</div>
</div>
              </div>
 
      </div>


</div><!--Container-->

    </div>
  </main>


<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>


</body>

</html>
