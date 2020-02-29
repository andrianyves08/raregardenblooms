<?php include 'includes/session.php'; ?>
<?php

$conn = mysqli_connect("localhost", "root", "", "raregardenblooms");
if(isset($_POST['submit'])){ 
  $number = count($_POST["item"]);
  if($number > 0) {

    $returningcustomer = $_POST['returningcustomer'];
    $adminID = $_POST['adminID'];

      if ($returningcustomer == 'newcustomer'){
        $firstname = strtolower($_POST['firstname']);
        $lastname = strtolower($_POST['lastname']);
        $address = strtolower($_POST['address']);
        $contactNumber = $_POST['contactNumber'];

        $result = mysqli_query($conn, "INSERT INTO customers(firstname, lastname, address, contactNumber) VALUES('$firstname', '$lastname', '$address', '$contactNumber')");

        $result2 = mysqli_query($conn, "SELECT * FROM customers where `firstname` = '$firstname' and `lastname` = '$lastname' and `address` = '$address' and `contactNumber` = '$contactNumber'");
          $row = mysqli_fetch_assoc($result2);
          $customID = $row['id'];
      } else {
        $result2 = mysqli_query($conn, "SELECT * FROM customers where `id` = '$returningcustomer'");
        $row = mysqli_fetch_assoc($result2);
        $customID = $row['id'];
      }

    $remittanceID = $_POST['returningremittance'];
    $shop = 'Online';
    $date = date('Y-m-d');
    $sales = $_POST['sales'];
    $totalAmount = $_POST['subTotal'];
    $amountPaid = $_POST['amountPaid'];
    $amountDue = $_POST['amountDue'];
    $note = strtolower($_POST['note']);
    $modeofpayment = $_POST['modeofpayment'];
    $shippingDate = $_POST['shippingDate'];
    $commission = $_POST['commission'];
    $salesperson = $_POST['salesperson'];
    $trackingNumber = strtolower($_POST['trackingNumber']);
    $shippingPrice = $_POST['totalshipping'];
    $shippingCourier = strtolower($_POST['shippingCourier']);
    $timestamp = date('Y-m-d H:i:s');

    $result3 = mysqli_query($conn, "SELECT count(*) as total FROM invoice");
    $row1 = mysqli_fetch_assoc($result3);
    $invoiceID = $row1['total'] + 1;

                   
    for($i=0; $i<$number; $i++) {
      if(trim($_POST["item"][$i] != '')) {
        $totalamount = mysqli_real_escape_string($conn, ($_POST["price"][$i] * $_POST["quantity"][$i]));

        $sql = "INSERT INTO invoiceitems(invoiceID, item, description, quantity, price, shippingprice, totalamount) VALUES('$invoiceID', '".mysqli_real_escape_string($conn, strtolower($_POST["item"][$i]))."', '".mysqli_real_escape_string($conn, strtolower($_POST["description"][$i]))."', '".mysqli_real_escape_string($conn, $_POST["quantity"][$i])."', '".mysqli_real_escape_string($conn, $_POST["price"][$i])."', '".mysqli_real_escape_string($conn, $_POST["shippingprice"][$i])."', '$totalamount')";
        mysqli_query($conn, $sql);
      }
    }

      if ($remittanceID == 'newremittance'){
        $rfirstname = strtolower($_POST['rfirstname']);
        $rlastname = strtolower($_POST['rlastname']);
        $raddress = strtolower($_POST['raddress']);
        $rcontactNumber = $_POST['rcontactNumber'];
        $remittanceDate = $_POST['remittanceDate'];
        $remittanceCode = strtolower($_POST['remittanceCode']);
        $remittanceAmount = $_POST['remittanceAmount'];
        $remittanceCourier = strtolower($_POST['remittanceCourier']);

        $result4 = mysqli_query($conn, "INSERT INTO remittance(rfirstname, rlastname, raddress, rcontactNumber) VALUES('$rfirstname', '$rlastname', '$raddress', '$rcontactNumber')");

        $result5 = mysqli_query($conn, "SELECT * FROM remittance where `rfirstname` = '$rfirstname' and `rlastname` = '$rlastname' and `raddress` = '$raddress' and `rcontactNumber` = '$rcontactNumber'");
          $row = mysqli_fetch_assoc($result5);
          $remittanceID = $row['id'];

      $result6 = mysqli_query($conn, "INSERT INTO invoice(customerID, remittanceID, shop, date, sales, totalAmount, amountPaid, amountDue, note, modeofpayment, commission, commissioner, remittanceDate, remittanceCode, remittanceAmount, remittanceCourier, shippingDate, trackingNumber, shippingPrice, shippingCourier, timestamp, adminID) VALUES('$customID', '$remittanceID', '$shop', '$date', '$sales', '$totalAmount', '$amountPaid', '$amountDue', '$note', '$modeofpayment', '$commission', '$salesperson', '$remittanceDate', '$remittanceCode', '$remittanceAmount', '$remittanceCourier', '$shippingDate', '$trackingNumber', '$shippingPrice', '$shippingCourier', '$timestamp', '$adminID')");
      } else {
        $result7 = mysqli_query($conn, "INSERT INTO invoice(customerID, remittanceID, shop, date, sales, totalAmount, amountPaid, amountDue, note, modeofpayment, commission, commissioner, shippingDate, trackingNumber, shippingPrice, shippingCourier, timestamp, adminID) VALUES('$customID', '$remittanceID', '$shop', '$date', '$sales', '$totalAmount', '$amountPaid', '$amountDue', '$note', '$modeofpayment', '$commission', '$salesperson', '$shippingDate', '$trackingNumber', '$shippingPrice', '$shippingCourier', '$timestamp', '$adminID')");

      }

    $_SESSION['success'] = 'Invoice Added';

  } else {
    $_SESSION['error'][] = 'Error';
  }
}

header('location: invoice.php');
?>

