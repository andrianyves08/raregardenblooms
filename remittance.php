<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "remittance";
  include 'includes/navbar.php'; ?>

<?php
  if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    $rfirstname = $_POST['rfirstname'];
    $rlastname = $_POST['rlastname'];
    $raddress = $_POST['raddress'];
    $rcontactNumber = $_POST['rcontactNumber'];

    $result1 = mysqli_query($conn,"update remittance set rfirstname='$rfirstname', rlastname='$rlastname', raddress='$raddress', rcontactNumber='$rcontactNumber' where id='$id'");
  
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
            <span>Remittance</span>
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
                $result4 = mysqli_query($conn, "SELECT * from remittance");
                while ($row = mysqli_fetch_array($result4)) { ?>
            <tr>
              <td><?php echo ucwords($row['rlastname']);?><?php echo ", ";echo ucwords($row['rfirstname']);?></td>
              <td><?php echo ucwords($row['raddress']);?></td>
              <td><?php echo $row['rcontactNumber'];?></td>
              <td>
                <div class='text-center'><a data-toggle='modal' data-target='#edit<?php echo $row['id']; ?>' href='#edit?id=<?php echo $row['id']; ?>'><i class='fas fa-edit blue-text'></i></a></div>
              </td>
            </tr>
            <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Remittance
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <?php 
                      $edit=mysqli_query($conn,"SELECT * from remittance where id='".$row['id']."'");
                      $erow=mysqli_fetch_array($edit);
                      ?>
                    <form method="POST" action="customers.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                      <div class="md-form mb-5">
                        <input type="hidden" id="id" name="id" class="form-control validate" value="<?php echo $erow['id']; ?>" required>
                      </div>
                      <div class="md-form mb-5">
                        <input type="text" id="rfirstname" name="rfirstname" class="form-control validate" value="<?php echo $erow['rfirstname']; ?>" required>
                        <label data-error="wrong" data-success="right" for="rfirstname">First Name
                        </label>
                      </div>
                      <div class="md-form mb-5">
                        <input type="text" id="rlastname" name="rlastname" class="form-control validate" value="<?php echo $erow['rlastname']; ?>" required>
                        <label data-error="wrong" data-success="right" for="rlastname">Last Name
                        </label>
                      </div>
                      <div class="md-form mb-5">
                        <input type="text" id="raddress" name="raddress" class="form-control validate" value="<?php echo $erow['raddress']; ?>" required>
                        <label data-error="wrong" data-success="right" for="raddress">Address
                        </label>
                      </div>
                      <div class="md-form mb-5">
                        <input type="number" id="rcontactNumber" name="rcontactNumber" class="form-control validate" value="<?php echo $erow['rcontactNumber']; ?>" required>
                        <label data-error="wrong" data-success="right" for="rcontactNumber">Contact Number
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
