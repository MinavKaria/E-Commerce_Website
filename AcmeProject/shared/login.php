<?php

$username=$_POST['username'];
$password=$_POST['pass'];

include_once "../shared/connection.php"; +
session_start();
$_SESSION['login_status']=false;   



$conn=new mysqli("localhost","root","","acme23_project1");

$query=mysqli_query($conn,"SELECT * FROM userentries WHERE Username='$username' and password='$password'");

if(mysqli_num_rows($query)==0)
{
    echo"Invalid Login Credentials";
    die;
}

$row=mysqli_fetch_assoc($query);
$userid=$row['UserID'];
$username=$row['Username'];
$user_type=$row['UserType'];

$_SESSION['login_status']=true;
$_SESSION['UserID']=$userid;
$_SESSION['Username']=$username;
$_SESSION['UserType']=$user_type;


if($user_type=="vendor")
{
    header("location:../vendor/home.php");
}
if($user_type=="customer")
{
    header("location:../customer/home.php");
}
if($user_type=="admin")
{
    header("location:../admin/home.php");
}


?>