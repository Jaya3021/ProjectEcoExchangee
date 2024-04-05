<?php
if(isset($_REQUEST["regbtn"]))
{
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];

    include('connection.php');
    $qry="INSERT INTO user (`username`, `email`, `password`) VALUES ('$name','$email','$password');";
    if(mysqli_query($con,$qry))
    {
        echo'<script>alert("Registration Successful, please Sign in"); window.location.href="login.php";</script>';
        //header("location:login.php");
    }
    else
    {
        echo"Error Occurred",mysqli_error($con);
    }
    
}