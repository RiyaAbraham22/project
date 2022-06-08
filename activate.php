<?php
 include ('connection.php');
 
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['hid'])){
 
        // Store the value from get to a
        // local variable "course_id"
        $regid=$_GET['hid'];
 
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE register2 SET status = 1 WHERE hid='$regid'";
 
        // Execute the query
        mysqli_query($con,$sql);
       
            }
            header('location: registerview2.php');
?>
