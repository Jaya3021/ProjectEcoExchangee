<?php
include("connection.php");

$id = $_GET['id'];
echo"Are you sure you want to delete this item from your wishlist?
<div>
    
</div>";
$query="DELETE FROM uploads where id='$id'";
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