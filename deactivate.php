<?php
$con=mysqli_connect("localhost","root","","project2");
 
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['hid'])){
 
        // Store the value from get to
        // a local variable "course_id"
        $regid=$_GET['hid'];
 
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE register2 SET status = 0 WHERE hid='$regid'";
 
        // Execute the query
        mysqli_query($con,$sql);
    }
 
    // Go back to course-page.php
    header('location: registerview2.php');
?>