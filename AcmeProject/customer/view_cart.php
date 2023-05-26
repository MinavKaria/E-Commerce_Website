
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
<script>
        function validate()
        {
            res=confirm("Are you sure want to Place Order?");
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

include_once "../shared/connection.php";

$userid=$_SESSION['UserID'];
$sql_result=mysqli_query($conn,"select * from cart join product on product.ProductID=cart.ProductID where UserID=$userid and is_ordered=0");

$total_price=0;
while($row=mysqli_fetch_assoc($sql_result))
{
    $cartid=$row['CartID'];
    $pid=$row['ProductID'];
    $name=$row['Name'];
    $price=$row['Price'];
    $details=$row['Details'];
    $impath=$row['impath'];

    $total_price=$total_price+$row['Price'];

    echo "
    
    <div class='card d-inline-block m-3 overflow-auto' style='width: 18rem;'>
    <img class='card-img-top' src='$impath'>
    <div class='card-body'>
      <h5 class='card-title text-capitalize'>$name</h5>
      <h5 class=''>₹ $price </h5>
      <p class='card-text'>$details</p>
      <form method='post' action='delete.php' onclick=''>
      <button class='btn-danger btn' name='delete' type='submit' value='$pid'>Delete from Cart</Delete>
      </form>
    </div>
  </div>";


}
echo "<hr class='mt-2'>";
if($total_price>0)
{
echo "<div class='mt-5 d-flex bg-dark p-fixed align-items-center justify-content-end  w-100 gap-5 py-3'>
    <div class='text-white h3'>Gross Total =₹ $total_price</div>    
    <div>
    <form method='get' action='placeorder.php' onsubmit='return validate()'>
        <input name='pid' style='display:none'>
        <button class='btn-lg btn-danger mr-5'>Place Order</button>
    </form>
    </div>
</div>";
}
else
{
    echo "<div class='display-2'>No Items in Cart</div>";
}
?>





