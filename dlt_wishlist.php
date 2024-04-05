<?php
include("connection.php");

$id = $_GET['id'];
$query="DELETE FROM wishlist where id='$id'";
$data= mysqli_query($con,$query);

if($data)
{
    header("location:profile.php");
}
else
{
    echo"failed";
}
?>