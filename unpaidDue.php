<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
  if (isset($_POST['edit'])) {
    $mode = $_POST['mode'];
    $id = $_POST['id'];
    $new = $_POST['amountDue'];
    $new1 = $_POST['amounttopay'];
    $final = $new-$new1;
    
    $adminID = $_POST['adminID'];
    $timestamp = date("Y-m-d H:i:s");

    $result1 = mysqli_query($conn,"UPDATE invoice set amountDue='$final' where id='$id'");

    if ($mode == 'online'){
      $remittanceCode = strtolower($_POST['remittanceCode']);
      $remittanceCourier = strtolower($_POST['remittanceCourier']);
      $modeOfPayment = $_POST['modeOfPayment'];
      $returningremittance = $_POST['returningremittance'];
      $date = $_POST['date'];

      if ($returningremittance == 'newremittance') {
        $rfirstname = strtolower($_POST['rfirstname']);
        $rlastname = strtolower($_POST['rlastname']);
        $raddress = strtolower($_POST['raddress']);
        $rcontactNumber = $_POST['rcontactNumber'];
        $result4 = mysqli_query($conn, "INSERT INTO remittance(rfirstname, rlastname, raddress, rcontactNumber) VALUES('$rfirstname', '$rlastname', '$raddress', '$rcontactNumber')");

        $result5 = mysqli_query($conn, "SELECT * FROM remittance where `rfirstname` = '$rfirstname' and `rlastname` = '$rlastname' and `raddress` = '$raddress' and `rcontactNumber` = '$rcontactNumber'");
          $row = mysqli_fetch_assoc($result5);
          $remittanceID = $row['id'];

        $result = mysqli_query($conn, "INSERT INTO amountdues(invoiceID, remittanceID, amountPaid, date, remittanceCode, remittanceCourier, modeOfPayment, timestamp, adminID) VALUES('$id', '$remittanceID', '$new1', '$date', '$remittanceCode', '$remittanceCourier', '$modeOfPayment', '$timestamp', '$adminID')");

      } else {
        $result = mysqli_query($conn, "INSERT INTO amountdues(invoiceID, remittanceID, amountPaid, date, remittanceCode, remittanceCourier, modeOfPayment, timestamp, adminID) VALUES('$id', '$returningremittance', '$new1', '$date', '$remittanceCode', '$remittanceCourier', '$modeOfPayment', '$timestamp', '$adminID')");
      }
      

    } else {
      $modeOfPayment = $_POST['modeOfPayment'];
      $returningremittance = $_POST['returningremittance'];
      $date = $_POST['date'];

      if ($returningremittance == 'newremittance') {
        $rfirstname = strtolower($_POST['rfirstname']);
        $rlastname = strtolower($_POST['rlastname']);
        $raddress = strtolower($_POST['raddress']);
        $rcontactNumber = $_POST['rcontactNumber'];
        $result4 = mysqli_query($conn, "INSERT INTO remittance(rfirstname, rlastname, raddress, rcontactNumber) VALUES('$rfirstname', '$rlastname', '$raddress', '$rcontactNumber')");

        $result5 = mysqli_query($conn, "SELECT * FROM remittance where `rfirstname` = '$rfirstname' and `rlastname` = '$rlastname' and `raddress` = '$raddress' and `rcontactNumber` = '$rcontactNumber'");
          $row = mysqli_fetch_assoc($result5);
          $remittanceID = $row['id'];

        $result = mysqli_query($conn, "INSERT INTO amountdues(invoiceID, remittanceID, amountPaid, date, modeOfPayment, timestamp, adminID) VALUES('$id', '$remittanceID', '$new1', '$date', '$modeOfPayment', '$timestamp', '$adminID')");

      } else {
        $result = mysqli_query($conn, "INSERT INTO amountdues(invoiceID, remittanceID, amountPaid, date, modeOfPayment, timestamp, adminID) VALUES('$id', '$returningremittance', '$new1', '$date', '$modeOfPayment', '$timestamp', '$adminID')");
      }
    }
   // $_SESSION['error'] = mysqli_error($conn);
   $_SESSION['success'] = 'Amount Due Updated';
  
}?>
<body class="grey lighten-3">
  <?php 
  $current = "home";
  include 'includes/navbar.php'; ?>

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

            <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']. "
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="home.php">Home Page</a>
            <span>/</span>
            <span>Unpaid Due</span>
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
      aria-controls="pills-home" aria-selected="true">All</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
      aria-controls="pills-profile" aria-selected="false">Transactions</a>
  </li>
</ul>
<div class="tab-content pt-2 pl-1" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">



               <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th width="100">Date
      </th>
      <th width="120">Invoice Number
      </th>
      <th width="130">Full Name
      </th>
      <th width="130">Unpaid Due
      </th>
      <th width="100">Shop
      </th>
      <th width="100">Action
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM customers join invoice on customers.id = invoice.customerID where `amountDue` != '0'");
            while ($row = mysqli_fetch_array($result3)) { 
                  ?>
            <tr>
              <td><?php echo $row['date'];?></td>
              <td><?php echo $row['id'];?></td>
              <td><?php echo ucwords($row['lastname']);?><?php echo ", ";echo ucwords($row['firstname']);?></td>
              <td><?php echo number_format($row['amountDue'], 2);?></td>
              <td><?php echo $row['shop'];?></td>
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
                    <form method="POST" action="unpaidDue.php" enctype="multipart/form-data">
                      <div class="md-form mb-5">
                        <input type="hidden" id="id" name="id" class="form-control validate" value="<?php echo $row['id']; ?>" required>
                        <input type="hidden" id="amountDue" name="amountDue" class="form-control validate" value="<?php echo $row['amountDue'];?>" required>
                        <input type="hidden" id="adminID" name="adminID" class="form-control validate" value="<?php echo $user['id'];?>" required>
                      </div>
                        <select id="<?php echo $row['id']; ?>" class="browser-default custom-select" name="mode">
                          <option value="offline">Offline Payment</option>
                          <option value="online">Online Payment</option>
                        </select><br><br>
                        <input type="number" id="amounttopay" name="amounttopay" placeholder="Amount to Pay" class="form-control mb-4" max="<?php echo $row['amountDue'];?>" required>

                        <select class="browser-default custom-select" id="two" name="returningremittance">
                          <option value="newremittance">New Remittance</option>
                           <?php
                              $result5 = mysqli_query($conn, "SELECT * from remittance");?>
                        <?php foreach($result5 as $remittance): ?>
                            <option value="<?= $remittance['id']; ?>"><?= $remittance['rcontactNumber']; ?> - <?=  ucwords($remittance['rlastname']); ?>, <?=  ucwords($remittance['rfirstname']); ?></option>
                        <?php endforeach; ?>
                        </select><br><br>
                        <input type="date" id="date" name="date" class="form-control mb-4" placeholder="Date">
                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name -->
                                <input type="text" id="rfirstname" name="rfirstname" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <input type="text" id="rlastname" name="rlastname" class="form-control" placeholder="Last name" required>
                            </div>
                        </div>
                        <input type="text" id="raddress" name="raddress" class="form-control mb-4" placeholder="Address" required>
                        <input type="number" id="rcontactNumber" name="rcontactNumber" class="form-control mb-4" placeholder="Phone Number" required>
                        <input type="text" id="remittanceCode" name="remittanceCode" class="form-control mb-4" placeholder="Remittance Code">
                        <input type="text" id="remittanceCourier" name="remittanceCourier" class="form-control mb-4" placeholder="Courier">
                        <select class="browser-default custom-select" name="modeOfPayment" id="modeOfPayment">
                          <option value="1">Bank</option>
                          <option value="2">Money Transfer</option>
                          <option value="3">Cash</option>
                        </select>
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
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

    <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th width="100">Date
      </th>
      <th width="120">Invoice Number
      </th>
      <th width="130">Full Name
      </th>
      <th width="130">Amount Paid
      </th>
      <th width="100">Remittance Code
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM amountdues join remittance on amountdues.remittanceID = remittance.id");
            while ($row = mysqli_fetch_array($result3)) { 
                  ?>
            <tr>
              <td><?php echo $row['date'];?></td>
              <td><?php echo $row['id'];?></td>
              <td><?php echo ucwords($row['rlastname']);?><?php echo ", ";echo ucwords($row['rfirstname']);?></td>
              <td><?php echo number_format($row['amountPaid'], 2);?></td>
              <td><?php echo $row['remittanceCode'];?></td>
            </tr>
            <?php    } ?>
                </tbody>
              </table>
</div>
</div>



          </div> <!--Card content-->
          </div>
              </div>
      </div>


    </div>  <!--Container-->
  </main>
  <!--Main layout-->

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
 
  $('#two').change(function() {
    if( $(this).val() == 'newremittance') {
      $('#rremittanceDate').prop( "disabled", false ); 
      $('#rfirstname').prop( "disabled", false );
      $('#rlastname').prop( "disabled", false );
      $('#raddress').prop( "disabled", false );
      $('#rcontactNumber').prop( "disabled", false );
      $('#rremittanceCourier').prop( "disabled", false );
      $('#rremittanceAmount').prop( "disabled", false );
      $('#rremittanceCode').prop( "disabled", false );
      $('#modeofpayment').prop( "disabled", false );
    } else {
      $('#rfirstname').prop( "disabled", true );
      $('#rlastname').prop( "disabled", true );
      $('#raddress').prop( "disabled", true );
      $('#rcontactNumber').prop( "disabled", true );
    }
  });
 
});
</script>
</body>

</html>
