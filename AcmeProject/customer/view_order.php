
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
<script>
        function validate()
        {
            res=confirm("Are you sure want to Cancel Order?");
            return res;
        }
    </script>
</body>
</html>
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
    
    <h1 class="h1 ">Customer Home Page</h1>

</div>
<?php

include "menu.html"


?>

<?php

$userid=$_SESSION['UserID'];
include_once "../shared/connection.php";

$query=mysqli_query($conn,"select * from cart join product on product.ProductID=cart.ProductID where UserID=$userid and is_ordered=1");

$total_price=0;
echo"
<table class='table'>
<tr>
    <th class='h3'>Product Name</th>
    <th class='h3'>Price</th>
    <th class='h3'>Image</th>
    <th class='h3'>Total Amount</th>
    <th class='h3'>Order Status</th>

</tr>";
while($row=mysqli_fetch_assoc($query))
{
    $cartid=$row['CartID'];
    $pid=$row['ProductID'];
    $name=$row['Name'];
    $price=$row['Price'];
    $details=$row['Details'];
    $impath=$row['impath'];
    $delivered=$row['is_delivered'];
    $cancelled=$row['is_cancelled'];
    $review=$row['review'];


    if($cancelled==0)
    $total_price=$total_price+$row['Price'];
    
    

    echo "<tr>
            <td>$name</td>
            <td>$price</td>
            <td>
            <div>
                <img src='$impath'> 
            </div>
            </td>
            <td>₹ $price</td>
            <td>
            ";
        
        if($delivered==0 and $cancelled==0)
        {
            
      
            echo "<form method='post' action='cancel.php' onsubmit='return validate()'>
                    <button class='btn btn-danger' name='cancel' value='$cartid'>Cancel Order</button>
                  </form>";
            echo "<p>Delivery Pending</p>";
        }
        elseif($cancelled==1)
        {
            echo" <div>Order Cancelled ✘</div>";
        }
        else
        {
            echo "<p>Order Delivered 🗸</p>";
            if($review==0)
            {
            echo "<form method='post' action='review.php'>
                <input class=form-control' name='review' type='number' placeholder='Give Rating from 1 to 5'>

                <button class='btn btn-danger'' name='pid' value='$pid'>Submit</button>
                </form>";
            }
            else
            {
                echo"★ $review";
            }
        }
           
            echo"</td>
          </tr>  
    ";
}
echo"</table>";
if($total_price>0)
{
echo"<h2>Total Order Price= ₹ $total_price</h3>";
}
else
{
    echo "<div class='display-2'>No Orders</div>";
}

echo"<hr>";



?>