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
<div class="d-flex justify-content-center align-items-start mt-5 vh-100 ">

    
    <form enctype="multipart/form-data" action="upload.php" class="w-50 p-3 bg-success rounded border border-warning border-5" method="POST">
        <h1 class="d-flex justify-content-center text-white ">Upload Product</h1>
        <input class="form-control mt-3" type="text" name="name" placeholder="Product Name">
        <input class="form-control mt-3" type="number" name="price" placeholder="Product Price">
        <textarea placeholder="Product Description.." class="form-control mt-3" name="details" id="" cols="20" rows="3"></textarea>
        <input class="form-control mt-3" type="file" name="pdtimg">

        <div class="text-center mt-2">
        <button class="btn btn-danger">Submit</button>
        </div>
        
    </form>
    

    </div>
</body>
</html>






