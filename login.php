
<?php
session_start();

if(isset($_POST["logbtn"])) 
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    include('connection.php');

    $qry="SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result=mysqli_query($con,$qry);
    if(mysqli_num_rows($result)>0) 
    {
        $record=mysqli_fetch_array($result);
        $_SESSION["username"]=$record["username"];
        $_SESSION["email"]=$record["email"];
		echo'<script>alert("Login Successful, Welcome ' . $_SESSION['username'] . '"); window.location.href="Home.php";</script>';
        
    } 
    else
    {
        echo '<script>alert("invalid username or password")</script>';
    }
}
?>

<!-- HTML code for login form -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>

<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="post">
			<h1>Create Account</h1>
			<input name="name" type="text" placeholder="Name"/>
			<input name="email" type="email" placeholder="Email"/>
			<input name="password" type="password" placeholder="Password"/>
			<button name="regbtn" type="submit" >Sign Up</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="login.php" method="post">
			<h1>Sign in</h1>
			<input name="email" type="email" placeholder="Email" />
			<input name="password" type="password" placeholder="Password" />
			<a href="forgot.php">Forgot your password?</a>
			<button name="logbtn">Sign In</button>
			<a class="button" href="landing.php">Go Back</a>
		</form>
	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
	
</div>

<script src="js/login.js"></script>

</body>
</html>