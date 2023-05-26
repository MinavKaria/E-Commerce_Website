<?php


session_start();
$userid=$_SESSION['UserID'];

$tmp_path=$_FILES['pdtimg']['tmp_name'];
date_default_timezone_set("Asia/Kolkata");
$filename="..//shared/images/".$userid.date("dMY_H_i_s").".jpg";

move_uploaded_file($tmp_path,$filename);

include "../shared/connection.php";

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

$query="insert into product(name,price,details,impath,uploaded_by) values('$name',$price,'$details','$filename',$userid)";

$status=mysqli_query($conn,$query);
if($status)
{
    echo "Product Uploaded Successfully!";
    echo"<br>";
    echo"<a href='home.php'>Redirect to Home Page</a>";
}
else
{
    echo "Failed to Upload the Product";
    echo mysqli_error($conn);
}
?>