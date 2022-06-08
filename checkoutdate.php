<?php
function checkoutdate($con){    
    $sql = "select * from book where status=1";
    if($result=mysqli_query($con,$sql))
    {
        while($row=mysqli_fetch_array($result))
        {
            
            $d2=$row['checkout'];
            $d1=date("Y-m-d");
            $date1=date_create($d1);
            $date2=date_create($d2);
            $diff=date_diff($date1,$date2);
            if($diff->format("%R%a")<=0)
            {
                $roomId=$row['room_id'];
                $bookingId=$row['bid'];
                $fetchRoom=$row['No_of_rooms'];
                //update room number
                $update="UPDATE tbl_room SET roomqty=roomqty+'$fetchRoom' where room_id='$roomId'";
                $updateRes=mysqli_query($con,$update);
                $setStatus="UPDATE book SET status=0 where bid='$bookingId'";
                $ResStatus=mysqli_query($con,$setStatus);
            }
     }
    }
}
?>