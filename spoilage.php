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
            <span>Spoilage</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->

      <!-- DASHBOARD -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">
          <div class="card mb-4 p-3">
            <h4>Spoilage</h4>
            <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Spoilage Date
                    </th>
                    <th class="th-sm">Item Name
                    </th>
                    <th class="th-sm">Quantity
                    </th>
                    <th class="th-sm">Remarks
                    </th>
                    <th class="th-sm">Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td>November 23, 2019</td>
                  <td>Cymbidium Khan Red Flame</td>
                  <td>5</td>
                  <td>Rotten</td>
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
              <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#Spoilage">Add New Spoilage and Damages</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>


<!-- Central Modal Small -->
<div class="modal fade" id="Spoilage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Add Spoilage and Damages</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="customers.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="md-form mb-5">
              <input type="date" id="firstname" name="firstname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="firstname">Date
              </label>
            </div>
            <div class="md-form mb-5">
              <input type="hidden" id="id" name="id" class="form-control validate" required>
            </div>
              <label data-error="wrong" data-success="right" for="firstname">Item Name
              </label>
              <select class="browser-default custom-select" name="salesperson" id="salesperson">
                <option value="1">Cymbidium Khan Red Flame</option >
                <option value="2">Small Pots</option>
              </select>
            <div class="md-form mb-5">
              <input type="number" id="firstname" name="firstname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="firstname">Quantity
              </label>
            </div>
            <div class="md-form mb-5">
              <input type="text" id="firstname" name="firstname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="firstname">Remarks
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
