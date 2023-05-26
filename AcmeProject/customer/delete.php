<?php

include_once "../shared/connection.php";



session_start();

$userid=$_SESSION['UserID'];
$pid=$_POST['delete'];


$status=mysqli_query($conn,"Delete from cart where ProductID=$pid;");
if($status)
{
    echo"Deleted Successfully from Cart";
    header("location:view_cart.php");
    
}
else
{
    echo"Error in Deleting Record";
    echo mysqli_error($conn);
}




?>