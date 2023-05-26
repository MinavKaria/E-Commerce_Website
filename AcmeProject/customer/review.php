<?php


$pid=$_POST['pid'];
$review=$_POST['review'];
include_once "../shared/connection.php";

$status=mysqli_query($conn,"update cart set review=$review where ProductID=$pid");
if($status)
{
    echo "Review Submitted";
    header("../customer/view_order.php");
}



?>