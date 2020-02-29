<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "expenses";
  include 'includes/navbar.php'; ?>

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
<?php
  if(isset($_SESSION['error'])){
    ?> 
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php
          foreach($_SESSION['error'] as $error){
            echo "
              ".$error."
            ";
          }
        ?>
    </div>
    <?php
    unset($_SESSION['error']);

  }
  if(isset($_SESSION['success'])){
      echo "
        <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-check'></i> Success!</h4>
          ".$_SESSION['success']."
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
            <span>Expenses</span>
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
                    aria-controls="pills-profile" aria-selected="false">Tools and Equipments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                    aria-controls="pills-contact" aria-selected="false">Marketing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-online-tab" data-toggle="pill" href="#pills-online" role="tab"
                    aria-controls="pills-contact" aria-selected="false">Salaries</a>
                </li>
              </ul>
              <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Date
                        </th>
                        <th class="th-sm">Invoice Number
                        </th>
                        <th class="th-sm">Sales
                        </th>
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Amount
                        </th>
                        <th class="th-sm">Amount Paid
                        </th>
                        <th class="th-sm">Shop
                        </th>
                        <th class="th-sm">Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
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
                        <td><?php echo $row['lastname'];?><?php echo ", ";echo $row['firstname'];?></td>
                        <td><?php echo $row['totalAmount'];?></td>
                        <td><?php echo $row['amountPaid'];?></td>
                        <td><?php echo $row['shop'];?></td>
                        <td><a href="<?php echo $link;?>.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Invoice Number
      </th>
      <th class="th-sm">Sales
      </th>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Amount
      </th>
      <th class="th-sm">Amount Paid
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM customers join invoice on customers.id = invoice.customerID where `shop` = 'BCC' ");
            while ($row = mysqli_fetch_array($result3)) { 
                  ?>
            <tr>
              <td><?php echo date("F d, Y", strtotime($row['date']));?></td>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['sales'];?></td>
              <td><?php echo $row['lastname'];?><?php echo ", ";echo $row['firstname'];?></td>
              <td><?php echo $row['totalAmount'];?></td>
              <td><?php echo $row['amountPaid'];?></td>
              <td><a href="invoiceView.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
            </tr>
    
            <?php   } ?>
  </tbody>
  <tfoot>
  </tfoot>
</table>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
     <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Invoice Number
      </th>
      <th class="th-sm">Sales
      </th>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Amount
      </th>
      <th class="th-sm">Amount Paid
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM customers join invoice on customers.id = invoice.customerID where `shop` = 'In-House' ");
            while ($row = mysqli_fetch_array($result3)) { 
                  ?>
            <tr>
              <td><?php echo date("F d, Y", strtotime($row['date']));?></td>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['sales'];?></td>
              <td><?php echo $row['lastname'];?><?php echo ", ";echo $row['firstname'];?></td>
              <td><?php echo $row['totalAmount'];?></td>
              <td><?php echo $row['amountPaid'];?></td>
              <td><a href="invoiceView.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
            </tr>
    
            <?php   } ?>
  </tbody>
  <tfoot>
  </tfoot>
</table>
  </div>
      <div class="tab-pane fade" id="pills-online" role="tabpanel" aria-labelledby="pills-online-tab">
           <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Invoice Number
      </th>
      <th class="th-sm">Sales
      </th>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Amount
      </th>
      <th class="th-sm">Amount Paid
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM customers join invoice on customers.id = invoice.customerID where `shop` = 'Online' ");
            while ($row = mysqli_fetch_array($result3)) { 
                  ?>
            <tr>
              <td><?php echo date("F d, Y", strtotime($row['date']));?></td>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['sales'];?></td>
              <td><?php echo $row['lastname'];?><?php echo ", ";echo $row['firstname'];?></td>
              <td><?php echo $row['totalAmount'];?></td>
              <td><?php echo $row['amountPaid'];?></td>
              <td><a href="onlineView.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
            </tr>
    
            <?php   } ?>
  </tbody>
  <tfoot>
  </tfoot>
</table>
  </div>
</div>

         
</div>
</div>
              </div>
             
      </div>

<div class="text-center">
  <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Add Expenses</a>
  </div>
</div><!--Container-->

    </div>
  </main>
  <!--Main layout-->

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>


</body>

</html>
