<?php

$conn=new mysqli("localhost","root","","acme23_project1");
if($conn->connect_error)
{
    echo "Error in Connection";
    die;
}


?>