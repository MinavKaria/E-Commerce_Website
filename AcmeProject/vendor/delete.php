<?php

include_once "../shared/connection.php";

$name=$_POST['delete'];
$status=mysqli_query($conn,"Delete from Product where Name='$name'");
if($status)
{
    echo"Deleted Successfully";
    echo"<br>";
    echo"<a href='home.php'>Redirect to Home Page</a>";
}
else
{
    echo"Error in Deleting Record";
    echo mysqli_error($conn);
}




?>