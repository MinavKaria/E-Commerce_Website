
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



$sql_result=mysqli_query($conn,"select * from product ");

while($row=mysqli_fetch_assoc($sql_result))
{
    $pid=$row['ProductID'];
    $name=$row['Name'];
    $price=$row['Price'];
    $details=$row['Details'];
    $impath=$row['impath'];

    echo "<div class='card d-inline-block m-3' style='width: 18rem;'>
    <img class='card-img-top' src='$impath'>
    <div class='card-body'>
      <h5 class='card-title text-capitalize'>$name</h5>
      <h5 class=''>₹ $price </h5>
      <p class='card-text'>$details</p>
      <a href='addtocart.php?pid=$pid' class='d-flex justify-content-center text-decoration-none'>
        <button class='btn-danger btn mt-3 mb-0 text-decoration-none'>Add to cart</button>
      <a>
      
    </div>
  </div>";
}

?>
    
</body>
</html>