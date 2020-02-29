<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="grey lighten-3">

  <?php 
  $current = "invoice";
  include 'includes/navbar.php'; ?>

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="invoice.php">Invoice</a>
            <span>/</span>
            <span>Inhouse</span>
          </h4>
        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <div class="row">
                <div class="col-6 text-left">
                  <?php
                    $sql = "SELECT * FROM invoice";
                    $query = mysqli_query($conn, $sql);
                  ?>
                  <h3>Invoice Number: <?php echo mysqli_num_rows($query) + 1;?> </h3>
                </div>
                <div class="col-6 text-right">
                  <?php echo "<h3>" . date("F d, Y") . "</h3>"; ?>
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
          <div class="card">

            <!--Card content-->
            <div class="card-body">
              <form class="text-center" action="inhouseSubmit.php" method="POST">
              <table id="dynamic_field" class="table table-striped table-bordered table-sm table-responsive item" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="160">Item Name
                    </th>
                    <th width="200">Description
                    <th width="80">Quantity
                    </th>
                    <th width="80">Price
                    </th>
                    <th width="100">Total
                    </th>
                    <th width="100">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="item[]" class="form-control" required/></td>
                    <td><input type="text" name="description[]" id="description" class="form-control"/></td>
                    <td><input type="number" min="1" name="quantity[]" id="quantity_1" class="form-control quantity" required/></td>
                    <td><input type="number" min="0" name="price[]" id="price_1" class="form-control" required/></td>
                    <td><input type="number" min="0" name="total_[]" id="total_1" class="form-control total" disabled="" /></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success btn-rounded px-2" style="margin: 0;padding: 5px;">ADD item</button></td>
                  </tr>
                </tbody>
              </table>
            </div><!--Card content-->
          </div><!--/.Card-->
        </div><!--Grid column-->
      </div><!--Grid row-->
      

            <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-5">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">
<p class="h4 mb-4">To</p>

    <select id="one" class="browser-default custom-select" name="returningcustomer">
      <option value="newcustomer">New Customer</option>
      <?php
          $result4 = mysqli_query($conn, "SELECT * from customers");?>
    <?php foreach($result4 as $customers): ?>
        <option value="<?= $customers['id']; ?>"><?= $customers['contactNumber']; ?> - <?= ucwords($customers['lastname']); ?>, <?= ucwords($customers['firstname']); ?></option>
    <?php endforeach; ?>
    </select><br><br>

    <input type="date" name="date" id="date" class="form-control mb-4" placeholder="Date" required>

    <div class="form-row mb-4">
      <div class="col">
      <!-- First name -->
       
<input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" required>

      </div>
      <div class="col">
      <!-- Last name -->
       <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name" required>
      </div>
    </div>

    <input type="text" id="address" name="address" class="form-control mb-4" placeholder="Address">

    <input type="number" min="0" id="contactNumber" name="contactNumber" class="form-control mb-4" placeholder="Phone Number">

    <select class="browser-default custom-select" name="modeofpayment" id="modeofpayment">
      <option value="1">Cash</option>
    </select>





            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->


        <!--Grid column-->
        <div class="col-md-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">


            <p class="h4 mb-4">Overall Total</p>

            
            <div class="md-form">
              <input type="hidden" id="adminID" name="adminID" class="form-control validate" value="<?php echo $user['id'];?>" required>
                <input id="totalquantity" type="number" name="totalquantity"  class="form-control mb-4" placeholder="0" readonly>
                <label for="materialContactFormMessage">Total Quantity</label>
            </div>

            <input id="sales" type="number" name="sales"  class="form-control mb-4" placeholder="0" readonly hidden>

            <div class="md-form">
                <i class="prefix">₱</i>
                <input type="number" id="subTotal" name="subTotal" class="form-control mb-4" placeholder="0" readonly>
                <label for="materialContactFormMessage">Total Amount</label>
            </div>

            <div class="md-form">
              <i class="prefix">₱</i>
              <input type="number" name="amountDue" id="amountDue" class="form-control mb-4" placeholder="0" value="0" readonly>
                <label for="materialContactFormMessage">Amount Due</label>
            </div>

            <div class="md-form">
                <i class="prefix">₱</i>
                <input type="number" min="0" id="amountPaid" name="amountPaid" require class="form-control mb-4" required>
                <label for="materialContactFormMessage">Amount Paid</label>
            </div>

              <label for="salesperson">Sales Person</label>
              <select class="browser-default custom-select" name="salesperson" id="salesperson">
                <option value="3">None</option>
                <option value="1">Maui Bayona</option>
                <option value="2">Mary Ann</option>
              </select>

            <div class="md-form">
              <i class="prefix">₱</i>
              <input type="number" min="0" id="commission" name="commission" require class="form-control mb-4" value="0">
              <label for="materialContactFormMessage">Commission</label>
            </div>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

         <!--Grid column-->
        <div class="col-md-3">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

            <div class="text-center">
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modalLoginForm">Submit</button>
            </div>
            </div><!--Container-->

          


            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->





    </div>
  </main>
  <!--Main layout-->

<!-- Are you sure -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Are you sure?</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <img src="logo.jpg" class="center mb-3 animated rotateIn rounded-circle" style="width: 150px; height: 150px;"> </div>
          <div id="final_body"></div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No</a>
        <button type="submit" class="btn btn-primary waves-effect" name="submit" id="submit"><i class="fa fa-check-square-o"></i>Yes</button>
                    </form>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
 
  $('#one').change(function() {
    if( $(this).val() == 'newcustomer') {
      $('#firstname').prop( "disabled", false );
      $('#lastname').prop( "disabled", false );
      $('#address').prop( "disabled", false );
      $('#contactNumber').prop( "disabled", false );
    } else {       
      $('#firstname').prop( "disabled", true );
      $('#lastname').prop( "disabled", true );
      $('#address').prop( "disabled", true );
      $('#contactNumber').prop( "disabled", true );
    }
  });
 
});
</script>
<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="item[]" class="form-control" required/></td><td><input type="text" name="description[]" id="description" class="form-control"/></td><td><input type="number" min="1" name="quantity[]" id="quantity_'+i+'" class="form-control quantity" required/></td><td><input type="number" min="0" name="price[]" id="price_'+i+'" class="form-control" required/></td><td><input type="number" min="0" name="total[]" id="total_'+i+'" class="form-control" disabled/></td><td><a type="button" name="remove" id="'+i+'" class="btn_remove text-danger">DELETE</a></td></tr>');

      $("[id^=quantity_]").keyup(function() {
    var sum = 0;
    $("[id^=quantity_]").each(function() {
        sum += Number($(this).val());
    });
  $('#totalquantity').val(sum);
  });

  });
  
  $(document).on('blur', "[id^=quantity_]", function(){
    calculateTotal();
  }); 
  $(document).on('blur', "[id^=price_]", function(){
    calculateTotal();
  });


  $("[id^=quantity_]").keyup(function() {
    var sum = 0;
    $("[id^=quantity_]").each(function() {
        sum += Number($(this).val());
    });
  $('#totalquantity').val(sum);
  });



  $(document).on('blur', "#amountPaid", function(){
    var amountPaid = $(this).val();
     var subTotal = $('#subTotal').val();  
    if(amountPaid && subTotal) {
      var newTotal = (subTotal)- (amountPaid);     
      $('#amountDue').val(parseFloat(newTotal));
    } else {    
      $('#amountDue').val(subTotal);
    }
  }); 

  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
  // $('#submit').click(function(){    
  //   $.ajax({
  //     url:"inhouseSUbmit.php",
  //     method:"POST",
  //     data:$('#addinhouse').serialize(),
  //     success:function(data){
  //       $('#addinhouse')[0].reset();
  //     }
  //   });
  //   location.reload(true);
  // });
  
});

function calculateTotal(){
  var totalAmount = 0; 
  $("[id^='price_']").each(function() {
    var id = $(this).attr('id');
    id = id.replace("price_",'');
    var price = $('#price_'+id).val();
    var quantity  = $('#quantity_'+id).val();
    if(!quantity) {
      quantity = 1;
    }

    var total = (price*quantity);
    //var total = total1 + shippingprice;
    $('#total_'+id).val(parseFloat(total));
    totalAmount += total;     
  });
  $('#subTotal').val(parseFloat(totalAmount));  
  var subTotal = $('#subTotal').val();
  if(subTotal) {  
    var amountPaid = $('#amountPaid').val();
    if(amountPaid && subTotal) {
      var newTotal = (subTotal)- (amountPaid);     
      $('#amountDue').val(parseFloat(newTotal));
    } else {    
      $('#amountDue').val(subTotal);
    }
  }

  var sales = (subTotal);
  $('#sales').val(parseFloat(sales));
}

</script>
<script type="text/javascript">
// $(document).ready(function () {

//      //iterate through each textboxes and add keyup
//      //handler to trigger sum event
//      $(".quantity").each(function () {

//          $(this).keyup(function () {
//              calculateSum();
//          });
//      });

//  });
//  function calculateSum() {
//      var sum = 0;
//      //iterate through each textboxes and add the values
//      $(".quantity").each(function () {

//          //add only if the value is number
//          if (!isNaN(this.value) && this.value.length != 0) {
//              sum += parseFloat(this.value);
//          }

//      });
//      //.toFixed() method will roundoff the final sum to 2 decimal places
//      $("#sum").html(sum.toFixed(2));
//  }

</script>


</body>

</html>
