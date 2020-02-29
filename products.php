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
            <span>Products</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->

      <!-- DASHBOARD -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">
          <div class="card mb-4 p-3">
            <h4>Products</h4>
            <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Item Name
                    </th>
                    <th class="th-sm">Description
                    </th>
                    <th class="th-sm">Category
                    </th>
                    <th class="th-sm">Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Cymbidium Khan Red Flame</td>
                  <td>Red bulbs.....</td>
                  <td>Cymbidium Collections</td>
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
              <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#Products">Create Products</a>
              </div>
          </div>
        </div>
      </div>

    
      



    </div>
  </main>


<!-- Central Modal Small -->
<div class="modal fade" id="Products" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Add Products</h4>
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
              <label data-error="wrong" data-success="right" for="firstname">Product Name
              </label>
            </div>
            <div class="md-form mb-5">
              <input type="text" id="firstname" name="firstname" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="firstname">Description
              </label>
            </div>
              <label data-error="wrong" data-success="right" for="lastname">Category
              </label>
              <select class="browser-default custom-select" name="salesperson" id="salesperson">
                <option value="1">Cymbidium Collections</option >
                <option value="2">Hoya</option>
                <option value="3">Hybrid Orchids</option>
                <option value="4">Orchid Species</option>
                <option value="5">Ornamentals</option>
              </select>
<br><br>
               <label for="inputEmail3">Recipe</label>
                  
                  <table id="dynamic_field" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="120">Item Name</th>
                    <th width="50">Quantity</th>
                    <th width="30">Add</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <select class="form-control" name="itemname[]" id="itemname_1">
                        <option>Cymbidium Khan Red Flame, piece</option>
                        <option>Small Pots, piece</option>
                        <option>Wamble wire, cm</option>
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control" step=".01" name="quantity[]" id="quantity_1">
                    </td>
                    <td>
                    <button type="button" name="add" id="add">Add Item</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select class="form-control" name="itemname[]" id="itemname_1">
                        <option>Cymbidium Khan Red Flame, piece</option>
                        <option>Small Pots, piece</option>
                        <option>Wamble wire, cm</option>
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control" step=".01" name="quantity[]" id="quantity_1">
                    </td>
                    <td>
                    <button type="button" name="add" id="add">Add Item</button>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      <select class="form-control" name="itemname[]" id="itemname_1">
                        <option>Cymbidium Khan Red Flame, piece</option>
                        <option>Small Pots, piece</option>
                        <option>Wamble wire, cm</option>
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control" step=".01" name="quantity[]" id="quantity_1">
                    </td>
                    <td>
                    <button type="button" name="add" id="add">Add Item</button>
                    </td>
                  </tr>

                  </tbody>
                </table>

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
