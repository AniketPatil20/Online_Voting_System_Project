<?php

$con=mysqli_connect("localhost","root","","votingsystem");
if(!$con){
    die(mysqli_error($con));
}

// if($con){
//     echo "Connection Successfull";
// }else{
//     die(mysqli_error($con));
// }
?>