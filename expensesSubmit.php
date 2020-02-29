<?php include 'includes/session.php'; ?>
<?php

$conn = mysqli_connect("localhost", "root", "", "raregardenblooms");
if(isset($_POST['submit'])){ 
  $number = count($_POST["item"]);
  if($number > 0) {
    $result3 = mysqli_query($conn, "SELECT count(*) as total FROM expenses");
    $row1 = mysqli_fetch_assoc($result3);
    $expenseID = $row1['total'] + 1;

    $adminID=$_POST['adminID'];
    $referenceNumber = mysqli_real_escape_string($conn, strtolower($_POST["referenceNumber"]));
    $date = $_POST['date'];
    $totalAmount = $_POST['subTotal'];
    $nameOfSupplier = strtolower($_POST['nameOfSupplier']);
    $remarks = strtolower($_POST['remarks']);
    $modeOfPayment = $_POST['modeOfPayment'];
    $dateIssued = $_POST['dateIssued'];
    $checkNumber = strtolower($_POST['checkNumber']);
    $identity = $_POST['identity'];
    $timestamp = date('Y-m-d H:i:s');

    $result5 = mysqli_query($conn, "INSERT INTO expenses(identity, referenceNumber, date, totalAmount, nameOfSupplier, remarks, modeOfPayment, dateIssued, checkNumber, timestamp, adminID) VALUES('$identity', '$referenceNumber', '$date', '$totalAmount', '$nameOfSupplier', '$remarks', '$modeOfPayment', '$dateIssued', '$checkNumber', '$timestamp', '$adminID')");
                 
    for($i=0; $i<$number; $i++) {
      if(trim($_POST["item"][$i] != '')) {
        $totalamount = mysqli_real_escape_string($conn, ($_POST["price"][$i] * $_POST["quantity"][$i]));

        $sql = "INSERT INTO expenseitems(expenseID, itemName, purpose, quantity, metric, price, totalamount) VALUES('$expenseID', '".mysqli_real_escape_string($conn, strtolower($_POST["item"][$i]))."', '".mysqli_real_escape_string($conn, strtolower($_POST["purpose"][$i]))."', '".mysqli_real_escape_string($conn, $_POST["quantity"][$i])."', '".mysqli_real_escape_string($conn, strtolower($_POST["metric"][$i]))."', '".mysqli_real_escape_string($conn, $_POST["price"][$i])."', '$totalamount')";
        mysqli_query($conn, $sql);
      }
    }

    echo mysqli_error($conn);
    $_SESSION['success'] = 'Invoice Added';
  } 
}

header('location: expenses.php');
?>

