
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
  <h2 style="padding-left: 128px;">RESET PASSWORD</h2>
   <br>
   <br>
    <form action="reset.php" method="POST" enctype="multipart/form-data">

      <div style="background-color: white;" class="formbold-input-wrapp formbold-mb-3">
        <label for="password" class="formbold-form-label"> Ente New Password </label>
        <input type="password"name="new_pass"id="new_pass"class="formbold-form-input" required/>
      </div>
      <div style="background-color: white;" class="formbold-input-wrapp formbold-mb-3">
        <label for="password" class="formbold-form-label"> Confirm Password</label>
        <input type="password"name="confirm_pass"id="confirm_pass"class="formbold-form-input" required/>
      </div>
      <button class="formbold-btn" type="submit" name="subbtn">Submit</button>
      <a href="javascript:history.back()" style=" text-decoration:none" class="formbold-btn">Back</a>
    </form>
  </div>
</div>
</body>
</html>

<?php 
session_start();
$checkemail=$_SESSION["checkemail"];
if (isset($_POST["subbtn"]))
 {
    include('connection.php');
    $newPassword = $_POST["new_pass"];
    $confirmPassword = $_POST["confirm_pass"];

    if ($newPassword === $confirmPassword) {
        // Passwords match
        // Proceed with further actions or validations
        $a = "UPDATE user SET password = '$newPassword' WHERE email = '$checkemail';";
    } else {
        // Passwords do not match
        echo '<script>alert("password does not match!!")</script>';
    }
 }
 else
    {
        echo"Error Occurred",mysqli_error($con);
    } 
?>

