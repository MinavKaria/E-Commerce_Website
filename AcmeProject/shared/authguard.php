

<?php

session_start();

if(!isset($_SESSION['login_status']))
{
    echo"Unauthorised Access";
    die;
}
if($_SESSION['login_status']==false)
{
    echo "Illegal Attempt, Login First";
    die;
}

$userid=$_SESSION['UserID'];
$username=$_SESSION['Username'];
$usertype=$_SESSION['UserType'];

echo"


<div class='d-flex justify-content-end gap-5 bg-warning font-monospace'>
<div class='d-flex gap-5 align-items-center '>
    <div class=''>UserID: $userid</div>
    <div class=''>Username: $username</div>
</div>
<div class='m-1'>
    <a href='../shared/logout.php'>
    <button class='btn btn-danger'> Logout </button>
    </a>
</div>
</div>"



?>

