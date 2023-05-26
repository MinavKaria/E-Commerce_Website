<?php

session_start();
$userid=$_SESSION['UserID'];
$cartid=$_POST['deliver'];
include_once "../shared/connection.php";

$status=mysqli_query($conn,"update cart set is_delivered=1 where CartID=$cartid");
if($status)
{
    echo "Order Status Uploaded successfully!";
}



?>