<?php

$username=$_POST['username'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];

include_once "../shared/connection.php";    

$query=mysqli_query($conn,"SELECT Username FROM userentries WHERE Username='$username';");

  if (mysqli_num_rows($query) != 0)
  {
      echo "Username already exists";
      die;
  }

if($pass!=$repass)
    {
        echo "Password Mismatch";
        die;
    }
    

    $status=mysqli_query($conn,"insert into userentries(username,password,usertype) values('$username','$pass','vendor')");
    if($status)
    {
        echo "Registration Successfull!";
        echo "<a href='../index.php' >Continue to Login</a>";
    }
    else
    {
        echo "Error in Registartion";
        echo mysqli_error($conn);
    }
    




?>