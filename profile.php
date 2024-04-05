<?php session_start();

  ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <header class="header">
           <div style="display: inline-flex;"> 
              <img  style= "width:35px; height:35px;" src="img/eco.png">
              <a href = "home.php" class="logo" style="padding-top:8px;">EcoExchange</a>
           </div>
           <a href="javascript:history.back()"  class="img" style="margin-right: 12px; text-decoration: none ; font-family: montserrat; color: white; font-size:16px;">Back</a>
    </header>
    <section class="py-3 my-2">
        <div class="container">
            <h1 class="mb-3">My Profile</h1>
            <div class="container2">
                <div class="profile">
                    <div class="p-4">
                        <div class="img-circle">
                            <img src="img/user.png" alt="Image" class="shadow">
                        </div>
                        <p class="text-center">
                        <?php
                          echo $_SESSION['username'];
                          ?>
                        </p>
                        <p class="text-center" style="font-size:15px;">
                        <?php
                          echo $_SESSION['email'];
                          ?></p>
                    </div>
                    <div class="wrapper_left">
                        <ul>
                            <li data-li="angular" class="active">
                                <p>My Uploads</p>
                            </li>
                            <li data-li="nodejs">
                                <p >My Wishlist</p>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="content">
                    <div class="wrapper_right">
                        <div class="containerr">
                            <div class="item angular">
                                <div class="item_info">
                                    <h2 style="font-family:Montserrat;font-size: 22px;">My Uploads</h2>
                                </div>
                                <?php
                                include("connection.php");
                                $query = "SELECT * FROM uploads WHERE email = '{$_SESSION['email']}'";
                                $data = mysqli_query($con,$query);
                                $total = mysqli_num_rows($data) ;
                                ?>
                                 
                                 <?php
                                 if($total>0){
                                    while( $result = mysqli_fetch_assoc($data)){
                                    echo"
                                    <div class= 'layer1'>
                                    <div class='row'>
                                        <div class='divleft'>
                                            <div class='prod_img'>
                                                <img  style=' width:150px; height:150px;'src=$result[p_img]>
                                            </div>
                                        </div>
                                        <div class='divright'>
                                            <div class='prod_name'>
                                                <div class='top'>
                                                <p style='fontsize:30px; font-family:Montserrat; margin-top:2px;margin-bottom:5px;'>$result[p_name]</p>
                                                <a href='#' onclick='if(confirm(\"Are you sure you want to delete this item from your uploads?\")) location.href=\"dlt_wishlist.php?id=$result[id]\";'><img src='img/bin.png' width='20px' style='padding-left: 20px;' ></a>
                                                </div>
                                                <p style='fontsize:25px; font-family:Montserrat; color:gray;margin-top:2px;'>$result[p_category]</p>
                                                <p style='fontsize:30px; font-family:Montserrat;margin-bottom:5px; font-weight:bold'>$result[p_price]/-</p>
                                                <p style='fontsize:30px; font-family:Montserrat;'>$result[p_desc]</p>
                                            
                                                <a href='update.php?id=$result[id]'class='formbold-btn'>update</a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>";
                                    }
                                    }
                                    else{
                                    echo"no records found";
                                    }

                                ?>
                                  
                                  <form action="form.php" method="post">
                                    <button class="upload"><b>+</b></button>
                                </form>
                                 </div>
                                 
                            </div>
                            <div class="item nodejs" style="display: none;">
                                <div class="item_info">
                                    <h2 style="font-family:Montserrat;">My Wishlist</h2>
                                </div>
                                <?php
                                include("connection.php");
                                $a = "SELECT * FROM wishlist WHERE u_id = '{$_SESSION['email']}'";
                                $b= mysqli_query($con,$a);
                                $c = mysqli_num_rows($b) ;
                                ?>
                                 
                                 <?php
                                 if($c>0){
                                    while( $d = mysqli_fetch_assoc($b)){
                                    echo"
                                    <div class= 'layer1'>
                                    <div class='row'>
                                        <div class='divleft'>
                                            <div class='prod_img'>
                                                <img  style=' width:150px; height:150px;'src=$d[p_img]>
                                            </div>
                                        </div>
                                        <div class='divright'>
                                            <div class='prod_name'>
                                                <div class='top'>
                                                <p style='fontsize:30px; font-family:Montserrat; margin-top:2px;margin-bottom:5px;'>$d[p_name]</p>
                                                <a href='#' onclick='if(confirm(\"Are you sure you want to delete this item from your wishlist?\")) location.href=\"dlt_wishlist.php?id=$d[id]\";'><img src='img/bin.png' width='20px' style='padding-left: 20px;' ></a>
                                                </div>
                                                <p style='fontsize:25px; font-family:Montserrat; color:gray;margin-top:2px;'>$d[p_category]</p>
                                                <p style='fontsize:30px; font-family:Montserrat;margin-bottom:5px; font-weight:bold'>$d[p_price]/-</p>
                                                <p style='fontsize:30px; font-family:Montserrat;'>$d[p_desc]</p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                 </div>";
                                    }
                                    }
                                    else{
                                    echo"no records found";
                                    }

                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="js/profile.js"></script>
</body>

</html>