<?php

include 'connection.php';

if(isset($_POST['Amount'])){
session_start();
      $name = $_SESSION['names'];
$payment_id=$_POST['razorpay_payment_id'];
    $date=date('Y-m-d');
    $amt=$_POST['Amount'];

echo $insert="INSERT INTO `payment`(`name`, `amt`, `pay_id`, `date_added`) VALUES('$name','$amt','$payment_id','$date')";
if(mysqli_query($con,$insert)){
echo "yes";
}
else{
echo "no";
}

}

?>