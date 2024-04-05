<?php
// Get the search query from the form submission
$query = $_GET['query'];

// Connect to the database
include('connection.php');

// Perform the search query
$sql = "SELECT * FROM uploads WHERE p_name LIKE '%$query%' OR p_desc LIKE '%$query%'";
$result=mysqli_query($con,$sql);
?>

<!-- html code starts here-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>search</title>
  <link rel="stylesheet" href="css/c.css">
</head>

<body>
  <header class="header">
    <a href="home.php" class="logo" style="text-decoration: none;">EcoExchange</a>
    <div class="icons">
      <a href="home.php" class="img" style="margin-right: 12px; text-decoration: none ; font-family: montserrat; color: white; font-size:16px;">home</a>
      <a href="profile.php" class="img"><img src="img/white-heart-transparent-background-24.png" class="img" alt="" width="20px" style="margin-right: 12px;"></a>
      <a href="profile.php" class="img"><img src="img/user.png" class="img" alt="" width="20px"></a>
    </div>
  </header>
  <div class="flex-container">
  <?php
  // Display the search results
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) {
      echo "
      <!-- First row -->
		<div class='flex-item'>
			<div class='left'><img  class='prod-img'src='$row[p_img]'></div>
            <div class = 'right'>
            <h5 class='name' style='font-size:17px; font-family:Montserrat; color:black; font-weight:bold; margin:5px;'>$row[p_name]</h5>
            <h5 class='name' style='fontsize:30px; font-family:Montserrat;color:gray; margin:5px;'>$row[p_category]</h5>
			<p class='price-container'>
			<span>$row[p_price]/-</span>
			</p>
			<p>$row[p_desc]</p>
            <div class='btn'>
            <form action=' echo $_SERVER[PHP_SELF];' method='post'>
            <button type='submit' name='submitbtn' class='formbold-btn' style='margin-left: 10px;'><span>Wishlist</span></button></form>
             <a  href='product_detail.php?id=$row[id]' type='submit' class='formbold-btn' style='margin-left: 10px; text-decoration:none' ><span>view product</span></a>
            </div>			
            </div>
		</div>
      ";
    }
  } else {
    echo 'No results found.';
  }

  // Close the database connection
  $con->close();

  ?>
  </div>
</body>

</html>