
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
<script>
        function validate()
        {
            res=confirm("Are you sure want to Delete Account?");
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
</head>
<body>
<div class="d-flex justify-content-center bg-dark text-white">
    <h1 class="h1">Admin Page</h1> 
</div>

<?php
  echo"
<table class='table table-striped'>
 <tr>
    <th class='h3'>UserID</th>
    <th class='h3'>UserType</th>
    <th class='h3 '>Username</th>
    <th class='h3'>Date of Creation</th>
    <th class='h3'>Action</th>
  </tr>
    ";
include_once "../shared/connection.php";
$query=mysqli_query($conn,"SELECT * FROM `userentries` WHERE UserType='vendor' or UserType='customer'");

while($row=mysqli_fetch_assoc($query))
{
    $userid=$row['UserID'];
    $usertype=$row['UserType'];
    $username=$row['Username'];
    $CreationDate=$row['Date of Creation'];

    echo"
    <tr>
    <td class='fs-4'>$userid</td>
    <td class='fs-5'>$usertype</td>
    <td class='fs-5'>$username</td>
    <td class='fs-5'>$CreationDate</td>
    <td>
    <form method='post' action='delete_acc.php' onclick='return validate()'>
      <button class='btn-danger btn' name='delete' type='submit' value='$userid'>Delete</Delete>
    </form>
    </td>
    
    </tr>";
    

  
}
echo"</table>";

?>
