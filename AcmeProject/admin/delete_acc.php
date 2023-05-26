

<?php

include_once "../shared/connection.php";

$userid=$_POST['delete'];
$status=mysqli_query($conn,"Delete from userentries where UserID='$userid'");
if($status)
{
    echo"Account has been Deleted Successfully";
    echo"<br>";
    echo"<a href='home.php'>Redirect to Home Page</a>";
}
else
{
    echo"Error in Deleting Record";
    echo mysqli_error($conn);
}




?>