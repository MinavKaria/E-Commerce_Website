<?php

    include "../shared/authguard.php";
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex justify-content-center bg-dark text-white">
    <h1 class="h1">Vendor Home Page</h1> 
</div>
<?php

include "menu.html"

?>
</body>
</html>

<?php

$userid=$_SESSION['UserID'];
include_once "../shared/connection.php";

$query=mysqli_query($conn,"select * from cart join product on product.ProductID=cart.ProductID where Uploaded_by=$userid and is_ordered=1 ");

$total_price=0;

echo"
<table class='table'>
<tr>
    <th class='h3'>Customer ID</th>
    <th class='h3'>Product Name</th>
    <th class='h3'>Price</th>
    <th class='h3'>Image</th>
    <th class='h3'>Total Amount</th>
    <th class='h3'>Delivery Status</th>
</tr>";
while($row=mysqli_fetch_assoc($query))
{
    $cartid=$row['CartID'];
    $pid=$row['ProductID'];
    $name=$row['Name'];
    $price=$row['Price'];
    $details=$row['Details'];
    $impath=$row['impath'];
    $userid=$row['UserID'];
    $delivered=$row['is_delivered'];
    $cancelled=$row['is_cancelled'];
    $total_price=$total_price+$row['Price'];
    $review=$row['review'];


    
    echo "<tr>
            <td>$userid</td>
            <td>$name</td>
            <td>$price</td>
            <td>
            <div>
                <img src='$impath'> 
            </div>
            </td>
            <td>₹ $price</td>";
            if($delivered==0 and $cancelled==0)
            {
            echo"<form method='post' action='delivered.php'>
            <td><button class='btn btn-danger' name='deliver' value=$cartid>Order Delivered</button></td>
            </form>";
            }
            elseif($cancelled==1)
            {
                echo" <td><div>Order Cancelled ✘</div></td>";
            }
            else
            {
            
                echo" <td><div>Order Delivered 🗸</div>";
                if($review!=0)
                echo"★ $review</td>";
                else
                echo"★ Not Rated</td>";

            
            }
          echo"</tr>  
    ";
}
echo"</table>";
echo"<h2>Total Order Price= ₹ $total_price</h3>";
echo"<hr>";



?>

