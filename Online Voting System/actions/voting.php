<?php
session_start();
include('connect.php');

$vote=$_POST['groupvotes'];
$totalvotes=$vote+1;

$gid=$_POST['groupid'];
$uid=$_SESSION['id'];


$updatevotes=mysqli_query($con,"update `userdata` set votes='$totalvotes' where id='$gid'");

$updatestatus=mysqli_query($con,"update `userdata` set status=1 where id='$uid'");

if($updatevotes and $updatestatus){
    $getgroups=mysqli_query($con,"Select username,photo,votes,id from `userdata` where standard='group'");
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;
    echo '<script> 
    alert("Voting Successful");
    window.loaction="../partials/dashboard.php";
    </script>';

}else{
    echo '<script> 
    alert("Technical error vote after some time");
    window.loaction="../partials/dashboard.php";
    </script>';
}
?>