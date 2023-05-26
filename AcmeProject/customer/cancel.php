<?php

session_start();
$userid=$_SESSION['UserID'];
$cartid=$_POST['cancel'];
include_once "../shared/connection.php";

$status=mysqli_query($conn,"update cart set is_cancelled=1 where CartID=$cartid");
if($status)
{
    echo "Cancelled Order successfully!";
}



?>