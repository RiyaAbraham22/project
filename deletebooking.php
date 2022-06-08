<?php
include('connection.php');

if(isset($_POST["booking"]))
{
  $cid = $_POST['booking'];

  $result=mysqli_query($con,"DELETE FROM `book` WHERE bid='$cid'");
  $row=mysqli_fetch_array($result);
  
  if($result) 
  {
      header("location:bookingdetails.php");
  }
}
?>
