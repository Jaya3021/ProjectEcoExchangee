<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>category</title>
    <link rel="stylesheet" href="css/c.css">
</head>
<body>

<!-- header section-->
       <header class="header">
        <a href = "home.php" class="logo" style="text-decoration: none;">Category</a>
            <div class="icons">
            <a href="javascript:history.back()"  class="img" style="margin-right: 12px; text-decoration: none ; font-family: montserrat; color: white; font-size:16px;">Back</a>
                <a href="profile.php" class="img"><img src="img/white-heart-transparent-background-24.png" class="img" alt="" width="20px" style="margin-right: 12px;"></a>
                <a href="profile.php" class="img"><img src="img/user.png" class="img" alt="" width="20px" ></a>
            </div>
        </header>
    
        <div class="flex-container">
        <?php
	     include("connection.php");
	     $query = "SELECT * FROM uploads Where p_category='Furniture' && email != '{$_SESSION['email']}'  ";
	     $data = mysqli_query($con,$query);
         $total = mysqli_num_rows($data) ;
        ?>
        <?php
         if($total>0){
         while( $result = mysqli_fetch_assoc($data)){
         echo"
		<!-- First row -->
		<div class='flex-item'>
			<div class='left'><img  class='prod-img'src='$result[p_img]'></div>
            <div class = 'right'>
            <h5 class='name' style='font-size:17px; font-family:Montserrat; color:black; font-weight:bold; margin:5px;'>$result[p_name]</h5>
            <h5 class='name' style='fontsize:30px; font-family:Montserrat;color:gray; margin:5px;'>$result[p_category]</h5>
			<p class='price-container'>
			<span>$result[p_price]/-</span>
			</p>
			<p>$result[p_desc]</p>
            <div class='btn'>
            <form action='wishlist.php' method='post'>
            <input type='hidden' name='product_id' value=' $result[id];'>
           <button type='submit' name='submitbtn' class='formbold-btn' style='margin-left: 10px;'><span>Wishlist</span></button>
             </form>
             <a  href='product_detail.php?id=$result[id]' type='submit' class='formbold-btn' style='margin-left: 10px; text-decoration:none' ><span>view product</span></a>
            </div>			
            </div>
		</div>

        "; 
        }
        }
        else{
        echo"no records found";
        }
        ?>
	</div>
</html>