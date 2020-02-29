<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "expenses";
  include 'includes/navbar.php'; 

  if (isset($_POST['excell'])) {
   $export = mysqli_query($conn,"SELECT * from expenses");

    $fields = mysqli_num_fields ( $export );

    for ( $i = 0; $i < $fields; $i++ )
    {
        $header .= mysql_field_name($export , $i) . "\t";
    }

    while( $row = mysqli_fetch_row( $export ) )
    {
        $line = '';
        foreach( $row as $value )
        {                                            
            if ( ( !isset( $value ) ) || ( $value == "" ) )
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
    $data = str_replace( "\r" , "" , $data );

    if ( $data == "" )
    {
        $data = "\n(0) Records Found!\n";                        
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=your_desired_name.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$data";

  }



  ?>

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
<!--   <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
      aria-controls="pills-home" aria-selected="true">Company</a>
  </li> -->
<!--   <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
      aria-controls="pills-profile" aria-selected="false">Personal</a>
  </li> -->
</ul>
<div class="tab-content pt-2 pl-1" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Expense Number
      </th>
      <th class="th-sm">Total Amount
      </th>
      <th class="th-sm">Recipient
      </th>
      <th class="th-sm">Remarks
      </th>
      <th class="th-sm">Mode of Payment
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM expenses where identity = 'Company'");
            while ($row = mysqli_fetch_array($result3)) {
                  ?>
            <tr>
              <td><?php echo date("F d, Y", strtotime($row['date']));?></td>
              <td><?php echo $row['expenseID'];?></td>
              <td><?php echo $row['totalAmount'];?></td>
              <td><?php echo ucwords($row['nameOfSupplier']);?></td>
              <td><?php echo ucwords($row['remarks']);?></td>
              <td><?php echo $row['modeOfPayment'];?></td>
              <td><a href="expenseView.php?id=<?php echo $row['expenseID'];?>" class="btn btn-info btn-sm m-0">VIEW</a></td>
            </tr>
    
            <?php   } ?>
  </tbody>
</table>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <?php
    $result3 = mysqli_query($conn, "SELECT sum(totalAmount) as total FROM expenses where identity = 'Personal'");
    $row1 = mysqli_fetch_assoc($result3);
    $expenseID = $row1['total'];
  ?>
  <h2>Total: <i class='prefix'>₱ </i><?php echo number_format($expenseID, 2); ?></h2>

    <table class="table display table-striped table-bordered table-sm table-responsive-md" cellspacing="0" width="100%">

  <thead>
    <tr>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Expense Number
      </th>
      <th class="th-sm">Reference Number
      </th>
      <th class="th-sm">Total Amount
      </th>
      <th class="th-sm">Recipient
      </th>
      <th class="th-sm">Mode of Payment
      </th>
      <th class="th-sm">Remarks
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
            $result3 = mysqli_query($conn, "SELECT * FROM expenses where identity = 'Personal'");
            while ($row = mysqli_fetch_array($result3)) {
                  ?>
            <tr>
              <td><?php echo $row['date'];?></td>
              <td><?php echo $row['expenseID'];?></td>
              <td><?php echo $row['referenceNumber'];?></td>
              <td><?php echo $row['totalAmount'];?></td>
              <td><?php echo ucwords($row['nameOfSupplier']);?></td>
              <td><?php echo $row['modeOfPayment'];?></td>
              <td><?php echo $row['remarks'];?></td>
            </tr>
    
            <?php   } ?>
  </tbody>
</table>
        <form action="export.php" method="POST">
        <button type="submit" name="excell" id="excell" class="btn btn-success btn-rounded mb-4">Download as Excell</button>
      </form>
  </div>

</div>

         
</div>
</div>
              </div>
             
      </div>

      <div class="text-center">
        <a href="expensesCreate.php" class="btn btn-primary btn-rounded mb-4">Add Expenses</a>
      </div>


</div><!--Container-->

    </div>
  </main>
  <!--Main layout-->



<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>


</body>

</html>
