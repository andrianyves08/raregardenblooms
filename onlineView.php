<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "invoice";
  include 'includes/navbar.php'; ?>

  <?php
  $productid = $_GET['id'];
  
  $result = mysqli_query($conn, "SELECT * FROM invoice join customers on invoice.customerID = customers.id WHERE invoice.id=$productid");

  while($row = mysqli_fetch_array($result)){
    $invoiceID = $row['id'];
    $totalAmount = $row['totalAmount'];
    $shop = $row['shop'];
    $date = date("F d, Y", strtotime($row['date']));
    $amountPaid = $row['amountPaid'];
    $amountDue = $row['amountDue'];
    $note = $row['note'];
    $modeofpayment = $row['modeofpayment']; 
    $shippingDate = $row['shippingDate'];
    $trackingNumber = $row['trackingNumber'];
    $shippingPrice = $row['shippingPrice'];
    $shippingCourier = $row['shippingCourier']; 
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $address = $row['address'];
    $contactNumber = $row['contactNumber'];

  }
  ?>

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <div id="capture">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

       <div class="text-center">

        </div>
              <div class="row">
                <div class="col-6 text-left">
                            <a href="https://raregardenblooms.com" target="_blank">
            <img src="logo.jpg" style="height:250px;width:250px;" alt="">
          </a>

                  
                </div>
                <div class="col-6 text-right">
                  <h3>Invoice Number: <?php echo $invoiceID;?> </h3><br><br>
                  <h3><?php echo $date;?></h3>
                </div>
              </div>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">
              <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Item Name
                    </th>
                    <th class="th-sm">Description
                    </th>
                    <th class="th-sm">Quantity
                    </th>
                    <th class="th-sm">Price
                    </th>
                    <th class="th-sm">Total
                    </th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                   $result5 = mysqli_query($conn, "SELECT SUM(quantity) AS totalquantity FROM invoice join invoiceitems on invoiceitems.invoiceID = invoice.id where invoice.id = $productid"); 
                  $row5 = mysqli_fetch_assoc($result5); 
                  $totalquantity = $row5['totalquantity'];
  
            $result3 = mysqli_query($conn, "SELECT * FROM invoice join invoiceitems on invoiceitems.invoiceID = invoice.id where invoice.id = $productid");
            while ($row = mysqli_fetch_array($result3)) { 
                  ?>
            <tr>
              <td><?php echo ucwords($row['item']);?></td>
              <td><?php echo ucwords($row['description']);?></td>
              <td><?php echo $row['quantity'];?></td>
              <td><?php echo $row['price'];?></td>
              <td><?php echo $row['totalamount'];?></td>
            </tr>
            <?php   } ?>
                </tbody>
              </table>
            </div><!--Card content-->
          </div><!--/.Card-->
        </div><!--Grid column-->
      </div><!--Grid row-->
      

            <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-4">

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">
<p class="h4 mb-4">Shipping Address</p>

            <div class="md-form">
                  <input type="text" name="shippingCourier" class="form-control mb-4" placeholder="Courier" value="<?php echo ucwords($shippingCourier);?>" readonly>
                <label for="materialContactFormMessage">Shipping Courier</label>
            </div>

                <div class="md-form">
                     <input type="text" name="trackingNumber" class="form-control mb-4" placeholder="Tracking Number" value="<?php echo ucwords($trackingNumber);?>" readonly>
                <label for="materialContactFormMessage">Tracking Number</label>
            </div>

                                                  <div class="md-form">
    <textarea type="text" name="address" class="form-control mb-4 rounded-0" rows="3" readonly><?php echo ucwords($address);?></textarea>
             
              </div>




            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

  <!--Grid column-->
        <div class="col-md-4">

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">
<p class="h4 mb-4">To</p>


                    <div class="md-form">
     <input type="text" name="firstname" class="form-control" placeholder="First name" value="<?php echo ucwords($firstname);?>" readonly>
                <label for="materialContactFormMessage">First Name</label>
                    </div>

                                    <div class="md-form">
     <input type="text" name="lastname" class="form-control" placeholder="Last name" value="<?php echo ucwords($lastname);?>" readonly>
                <label for="materialContactFormMessage">Last name</label>
              </div>

                                                  <div class="md-form">
     <!-- Password -->
  <input type="number" min="0" name="contactNumber" class="form-control mb-4" placeholder="Phone Number" value="<?php echo $contactNumber;?>" readonly>
             <label for="materialContactFormMessage">Phone Number</label>
              </div>



            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->


        <!--Grid column-->
        <div class="col-md-4">

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">


            <p class="h4 mb-4">Overall Total</p>

            
            <div class="md-form">
                <input id="totalquantity" type="number" name="totalquantity"  class="form-control mb-4" placeholder="0" value="<?php echo $totalquantity;?>" readonly>
                <label for="materialContactFormMessage">No. of Quantity</label>
            </div>

            <div class="md-form">
                <i class="prefix">₱</i>
                <input type="number" id="subTotal" name="subTotal" class="form-control mb-4" placeholder="0" value="<?php echo $totalAmount;?>" readonly>
                <label for="materialContactFormMessage">Total Amount</label>
            </div>

            <div class="md-form">
                <i class="prefix">₱</i>
                <input type="number" id="totalshipping" name="totalshipping" class="form-control mb-4" placeholder="0" value="<?php echo $shippingPrice;?>" readonly>
                <label for="materialContactFormMessage">Total Shipping Price</label>
            </div>

            <div class="md-form">
              <i class="prefix">₱</i>
              <input type="number" name="amountDue" id="amountDue" class="form-control mb-4" placeholder="0" value="<?php echo $amountDue;?>" readonly>
                <label for="materialContactFormMessage">Amount Due</label>
            </div>


            <div class="md-form">
                <i class="prefix">₱</i>
                <input type="number" min="0" id="amountPaid" name="amountPaid" require class="form-control mb-4" value="<?php echo $amountPaid;?>" readonly>
                <label for="materialContactFormMessage">Amount Paid</label>
            </div>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>
      
<br><br>
    <div class="row">
      <div class="col-4">
       <button class="noprint btn btn-primary" onclick="myFunction()">Print this page</button>
      </div>
<!--       <div class="col-4">
       <button class="noprint btn btn-primary" onclick="screenshot()">Screen Capture</button>
      </div>
      <div class="col-4 noprint">
        <a href="https://www.facebook.com/raregardenblooms/inbox" target="_blank" class="noprint btn btn-primary btn-rounded">Facebook Messenger</a>
      </div> -->
    </div>

    </div>
  </main>
  <!--Main layout-->

<div id="preview"></div>
<?php //include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>

<script>
function myFunction() {
  window.print();
}
</script>

<script type="text/javascript">
function screenshot(){
  html2canvas(document.querySelector("#capture"), {
        ignoreElements: true,
        y: 0,
        x: 0,
        scrollX: 0,
        scrollY: 0,
        scale: 1,
        width: 800,
        height: 2000,
    }).then(canvas => {

    $("#preview").append(canvas);
    var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = '<?php echo $invoiceID;?> - <?php echo $lastname;?>, <?php echo $firstname;?>.jpg';
        a.click();
  });
}
</script>
</body>

</html>
