<?php

$pid=$_GET['pid'];

session_start();

$userid=$_SESSION['UserID'];

include_once "../shared/connection.php";

$query=mysqli_query($conn,"SELECT * FROM cart WHERE ProductID='$pid' and UserID='$userid' and is_cancelled=0 and is_delivered=0;");

  if (mysqli_num_rows($query) != 0)
  {
      echo "Product Already available in Cart";
      die;
  }
  else
{
 $status=mysqli_query($conn,"insert into cart(UserID,ProductID) values($userid,$pid)");
 if($status)
 {
    echo "Product added to cart sucessfully!";
    echo"<br>";
    echo"<a href='home.php'>Redirect to Home Page</a>";
    
 }
}


?>