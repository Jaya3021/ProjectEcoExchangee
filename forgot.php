<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/forgot.css">
</head>
<body>
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <h2 style="padding-left: 128px;">FORGOT PASSWORD</h2>
   <br>
   <br>
    <form action="" method="POST" enctype="multipart/form-data">

      <div style="background-color: white;" class="formbold-input-wrapp formbold-mb-3">
        <label for="email" class="formbold-form-label"> Enter Your Email Address </label>
        <input type="email"name="email"id="name"class="formbold-form-input" required/>
      </div>
      <button class="formbold-btn" type="submit" name="submitbtn">Submit</button>
      <a href="login.php" style=" text-decoration:none" class="formbold-btn">Back</a>
    </form>
  </div>
</div>
</body>
</html>
<?php
  if(isset($_POST["submitbtn"]))
  {
    include('connection.php');
    $email=$_POST["email"];
    $qry="SELECT * FROM user WHERE email='$email'";
    $result=mysqli_query($con,$qry);
    if(mysqli_num_rows($result)>0)
    {
      $record=mysqli_fetch_array($result);
      $_SESSION["checkemail"]=$record["email"];
      header("location:reset.php");
    }
    else
    {
      echo '<script>alert("This email Address does not exist, please register!!")</script>';
    }
  }?>

