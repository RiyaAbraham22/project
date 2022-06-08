<?php
if(isset($_POST['IdItem']))
{
    extract($_POST);
    $sql="SELECT * FROM `book` WHERE bid='$IdItem'";
    $resultSql=mysqli_query($connect,$sql);
    $data='';
    while($row=mysqli_fetch_array($resultSql))
    {
        $data.="<form action='./serviceform.php' class='my-1' method='post'><button type='submit' name='btn_submit' value='".$row['id'].",".$IdItem."' class='btn btn-one btn-lg btn-block'>" . $row["category_name"] . "</button> </form>";
    }
    echo $data;
}
?>