<?php include 'includes/session.php'; ?>
<?php

$conn = mysqli_connect("localhost", "root", "", "raregardenblooms");
if(isset($_POST['submit'])){ 
  $number = count($_POST["item"]);
  if($number > 0) {

    $adminID=$_POST['adminID'];
      $returningcustomer = $_POST['returningcustomer'];

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

    $result3 = mysqli_query($conn, "SELECT count(*) as total FROM invoice");
    $row1 = mysqli_fetch_assoc($result3);
    $invoiceID = $row1['total'] + 1;
                 
    for($i=0; $i<$number; $i++) {
      if(trim($_POST["item"][$i] != '')) {
        $totalamount = mysqli_real_escape_string($conn, ($_POST["price"][$i] * $_POST["quantity"][$i]));
        $shippingprice = '0';

        $sql = "INSERT INTO invoiceitems(invoiceID, item, description, quantity, price, shippingprice, totalamount) VALUES('$invoiceID', '".mysqli_real_escape_string($conn, $_POST["item"][$i])."', '".mysqli_real_escape_string($conn, $_POST["description"][$i])."', '".mysqli_real_escape_string($conn, $_POST["quantity"][$i])."', '".mysqli_real_escape_string($conn, $_POST["price"][$i])."', '$shippingprice', '$totalamount')";
        mysqli_query($conn, $sql);
      }
    }

    $sales = $_POST['sales'];
    $totalAmount = $_POST['subTotal'];
    $shop = 'In-House';
    $date = $_POST['date'];
    $amountPaid = $_POST['amountPaid'];
    $amountDue = $_POST['amountDue'];
    $modeofpayment = $_POST['modeofpayment'];
    $commission = $_POST['commission'];
    $salesperson = $_POST['salesperson'];
    $timestamp = date('Y-m-d H:i:s');

    $result5 = mysqli_query($conn, "INSERT INTO invoice(customerID, shop, date, sales, totalAmount, amountPaid, amountDue, modeofpayment, commission, commissioner, timestamp, adminID) VALUES('$customID', '$shop', '$date', '$sales', '$totalAmount', '$amountPaid', '$amountDue', '$modeofpayment', '$commission', '$salesperson', '$timestamp', '$adminID')");

    $_SESSION['success'] = 'Invoice Added';

  } 
}

header('location: invoice.php');
?>

