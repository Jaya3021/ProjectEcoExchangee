<?php session_start();

include("connection.php");

$id = $_GET['id'];
$query = "SELECT * FROM uploads Where id = '$id'";
$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data) ;
$result = mysqli_fetch_assoc($data)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product detail</title>
    <link rel="stylesheet" href="css/product_detail.css">
</head>
<body>
    <div class="container1">
        <div class="container2">
        <div class="row1" >
            <div class="col1">
                <img src="<?php echo $result['p_img']; ?>">
            </div>
            <div class="col2">
                <h5 class='name' style='font-size:30px; font-family:Montserrat; color:black; font-weight:bold; margin:10px;'> <?php echo $result['p_name']; ?></h5>
			    <p class='name' style="font-size:15px; font-family:Montserrat;color:black;"><?php echo $result['p_desc']; ?></p>
			    <h3 class='price-container'>
			        <span><?php echo $result['p_price']."/-"; ?></span>
                </h3> 
            </div>
         </div>
         <div class="row2">
         <div class="col3">
            <p style="margin-left: 30%; font-size:20px; margin-top:2px;">Product Seller</p>
            <p style="margin-left: 2%; margin-top:2px;"><?php echo "Seller name = $result[s_name]"; ?></p>
            <p style="margin-left: 2%; margin-top:2px;"><?php echo " Seller Email-id = $result[email]"; ?></p>
         </div>
         <div class="col4">
         <form action="wishlist.php" method="post">
            <input type="hidden" name="product_id" value= <?php echo $id ?>;>
           <button type="submit" name="submitbtn" class="formbold-btn"><span>Wishlist</span></button>
             </form>
            <a href="javascript:history.back()" style="padding-left: 40%;">go back</a>
            <a href="home.php" style="padding-left: 42%;">home</a>
         </div>
         </div>
        </div>

    </div>
</body>
</html>