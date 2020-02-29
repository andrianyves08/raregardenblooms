<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "customers";
  include 'includes/navbar.php'; ?>

<?php
  if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];

    $result1 = mysqli_query($conn,"update customers set firstname='$firstname', lastname='$lastname', address='$address', contactNumber='$contactNumber' where id='$id'");
  
}?>

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
            <span>Customers</span>
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

              <table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
 <thead>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                $result4 = mysqli_query($conn, "SELECT * from customers");
                while ($row = mysqli_fetch_array($result4)) { ?>
            <tr>
              <td><?php echo ucwords($row['lastname']);?><?php echo ", ";echo ucwords($row['firstname']);?></td>
              <td><?php echo ucwords($row['address']);?></td>
              <td><?php echo $row['contactNumber'];?></td>
              <td>
                <div class='text-center'><a data-toggle='modal' data-target='#edit<?php echo $row['id']; ?>' href='#edit?id=<?php echo $row['id']; ?>'><i class='fas fa-edit blue-text'></i></a></div>
              </td>
            </tr>
            <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Customers
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <?php 
                      $edit=mysqli_query($conn,"SELECT * from customers where id='".$row['id']."'");
                      $erow=mysqli_fetch_array($edit);
                      ?>
                    <form method="POST" action="customers.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                      <div class="md-form mb-5">
                        <input type="hidden" id="id" name="id" class="form-control validate" value="<?php echo $erow['id']; ?>" required>
                      </div>
                      <div class="md-form mb-5">
                        <input type="text" id="firstname" name="firstname" class="form-control validate" value="<?php echo $erow['firstname']; ?>" required>
                        <label data-error="wrong" data-success="right" for="firstname">First Name
                        </label>
                      </div>
                      <div class="md-form mb-5">
                        <input type="text" id="lastname" name="lastname" class="form-control validate" value="<?php echo $erow['lastname']; ?>" required>
                        <label data-error="wrong" data-success="right" for="lastname">Last Name
                        </label>
                      </div>
                      <div class="md-form mb-5">
                        <input type="text" id="address" name="address" class="form-control validate" value="<?php echo $erow['address']; ?>" required>
                        <label data-error="wrong" data-success="right" for="address">Address
                        </label>
                      </div>
                      <div class="md-form mb-5">
                        <input type="number" id="contactNumber" name="contactNumber" class="form-control validate" value="<?php echo $erow['contactNumber']; ?>" required>
                        <label data-error="wrong" data-success="right" for="contactNumber">Contact Number
                        </label>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button name="edit" class="btn btn-success">Update
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php    } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



    </div>
  </main>
  <!--Main layout-->

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>


</body>

</html>
