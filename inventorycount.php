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
        <div class="col-lg-12 col-xs-6">
          <div class="card mb-4 p-3">
            <h4>Inventory</h4>
            <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Product Name
                    </th>
                    <th class="th-sm">Description
                    </th>
                    <th class="th-sm">Category
                    </th>
                    <th class="th-sm">Quantity
                    </th>
                    <th class="th-sm">Unit
                    </th>
                    <th class="th-sm">Status
                    </th>
                    <th class="th-sm">Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Cymbidium Khan Red Flame</td>
                  <td>Red bulbs.....</td>
                  <td>Plants</td>
                  <td>15</td>
                  <td>piece</td>
                  <td><span class='badge badge-pill badge-success'>Normal</span></td>
                  <td>
                    <a data-toggle='modal' data-target='#view<>'><i class="fas fa-edit text-primary"></i></a> | <a data-toggle='modal' data-target='#view<>'><i class="fas fa-trash text-danger"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Dendrobium</td>
                  <td>Red bulbs.....</td>
                  <td>Plants</td>
                  <td>3</td>
                  <td>piece</td>
                  <td><span class='badge badge-pill badge-warning'>Low</span></td>
                  <td>
                    <a data-toggle='modal' data-target='#view<>'><i class="fas fa-edit text-primary"></i></a> | <a data-toggle='modal' data-target='#view<>'><i class="fas fa-trash text-danger"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Small Pots</td>
                  <td>Re.....</td>
                  <td>Plant Materials</td>
                  <td>0</td>
                  <td>cm</td>
                  <td><span class='badge badge-pill badge-danger'>Empty</span></td>
                  <td>
                    <a data-toggle='modal' data-target='#view<>'><i class="fas fa-edit text-primary"></i></a> | <a data-toggle='modal' data-target='#view<>'><i class="fas fa-trash text-danger"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Wamle Wire</td>
                  <td>Re.....</td>
                  <td>Plant Materials</td>
                  <td>0</td>
                  <td>cm</td>
                  <td><span class='badge badge-pill badge-danger'>Empty</span></td>
                  <td>
                    <a data-toggle='modal' data-target='#view<>'><i class="fas fa-edit text-primary"></i></a> | <a data-toggle='modal' data-target='#view<>'><i class="fas fa-trash text-danger"></i></a>
                  </td>
                </tr>
<!--                           <?php
                          $result3 = mysqli_query($conn, "SELECT * FROM customers join invoice on customers.id = invoice.customerID");
                          while ($row = mysqli_fetch_array($result3)) {
                                    if ($row['shop'] == 'Online'){
                                      $link = 'onlineView';
                                    } else {
                                      $link = 'invoiceView';
                                    } 
                                ?>
                          <tr>
                            <td><?php echo date("F d, Y", strtotime($row['date']));?></td>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['sales'];?></td>
                            <td><?php echo ucwords($row['lastname']);?><?php echo ", ";echo ucwords($row['firstname']);?></td>
                            <td><?php echo $row['totalAmount'];?></td>
                            <td><?php echo $row['amountPaid'];?></td>
                            <td><?php echo $row['shop'];?></td>
                            <td><a href="<?php echo $link;?>.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
                          </tr>
                  
                          <?php   } ?> -->
                </tbody>
            </table>
            <div class="row">
              <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#inventory">Add Inventory</a>
              <a href="" class="btn btn-info btn-rounded mb-4" data-toggle="modal" data-target="#quantity">Add Quantity</a>
              </div>
          </div>
        </div>
      </div>

            <!-- DASHBOARD -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">
          <div class="card mb-4 p-3">
            <h4>Ledger</h4>
            <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Date
                    </th>
                    <th class="th-sm">Item Name
                    </th>
                    <th class="th-sm">Quantity
                    </th>
                    <th class="th-sm">Transaction
                    </th>
                    <th class="th-sm">Remarks
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>November 29, 2019</td>
                    <td>Cymbidum khan flame</td>
                    <td class="text-success">15</td>
                    <td>Added</td>
                    <td>New arrival</td>
                  </tr>
                  <tr>
                    <td>November 29, 2019</td>
                    <td>Small Pots</td>
                    <td class="text-danger">5</td>
                    <td>Spoilage and damages</td>
                    <td>...</td>
                  </tr>
                  <tr>
                    <td>December 02, 2019</td>
                    <td>Cymbidum khan flame</td>
                    <td class="text-danger">1</td>
                    <td>Ordered Product</td>
                    <td>...</td>
                  </tr>
                  <tr>
                    <td>December 02, 2019</td>
                    <td>Small pots</td>
                    <td class="text-danger">1</td>
                    <td>Ordered Product</td>
                    <td>...</td>
                  </tr>
               <!--            <?php
                          $result3 = mysqli_query($conn, "SELECT * FROM customers join invoice on customers.id = invoice.customerID");
                          while ($row = mysqli_fetch_array($result3)) {
                                    if ($row['shop'] == 'Online'){
                                      $link = 'onlineView';
                                    } else {
                                      $link = 'invoiceView';
                                    } 
                                ?>
                          <tr>
                            <td><?php echo date("F d, Y", strtotime($row['date']));?></td>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['sales'];?></td>
                            <td><?php echo ucwords($row['lastname']);?><?php echo ", ";echo ucwords($row['firstname']);?></td>
                            <td><?php echo $row['totalAmount'];?></td>
                            <td><?php echo $row['amountPaid'];?></td>
                            <td><?php echo $row['shop'];?></td>
                            <td><a href="<?php echo $link;?>.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
                          </tr>
                  
                          <?php   } ?> -->
                </tbody>
            </table>
          </div>
        </div>
      </div>
      



    </div>
  </main>


<!-- Central Modal Small -->
<div class="modal fade" id="inventory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Add Inventory</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="customers.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="md-form mb-5">
              <input type="hidden" id="id" name="id" class="form-control validate" required>
            </div>
            <div class="md-form mb-5">
              <input type="text" id="firstname" name="firstname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="firstname">Item Name
              </label>
            </div>
            <div class="md-form mb-5">
              <input type="text" id="lastname" name="lastname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="lastname">Description
              </label>
            </div>
              <label data-error="wrong" data-success="right" for="lastname">Category
              </label>
              <select class="browser-default custom-select" name="salesperson" id="salesperson">
                <option value="1">Plants</option >
                <option value="2">Plants Materials</option>
                <option value="7">Office Materials</option>
              </select><br><br>
              <label data-error="wrong" data-success="right" for="lastname">Unit of Measurement
              </label>
              <select class="browser-default custom-select" name="salesperson" id="salesperson">
                <option value="1">kg</option >
                <option value="2">piece</option>
                <option value="3">ml</option>
                <option value="4">m</option>
                <option value="5">cm</option>
              </select>
            <div class="md-form mb-5">
              <input type="number" id="lastname" name="lastname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="lastname">Set Low Stock Notification
              </label>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button name="edit" class="btn btn-success">Save
              </button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->


<!-- Central Modal Small -->
<div class="modal fade" id="quantity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Add Quantity</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="customers.php" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="md-form mb-5">
            <input type="hidden" id="id" name="id" class="form-control validate" required>
          </div>
          <label data-error="wrong" data-success="right" for="lastname">Item Name
              </label>
              <select class="browser-default custom-select" name="salesperson" id="salesperson">
              </select>
          <div class="md-form mb-5">
            <input type="number" id="lastname" name="lastname" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="lastname">Quantity
            </label>
          </div>
          <div class="md-form mb-5">
            <input type="text" id="address" name="address" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="address">Remarks
            </label>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button name="edit" class="btn btn-success">Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>


</body>

</html>
