<?php
session_start();

if(!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
    header("location:login.php");
    exit();
}

// Display the home page content for authenticated users
//echo "<h3 style='font-family: montserrat;'>Welcome, ".$_SESSION["username"]."!</h3>";
?>

<!-- HTML code for home page -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoExchange</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!--header section-->
    <header class="header">
            <div style="display: inline-flex;"> 
            <img  style= "width:35px; height:35px;" src="img/eco.png">
            <a href = "#" class="logo" style="padding-top:8px;">EcoExchange</a>
           </div>
      
            <form action="search.php" class="search-form" method="GET">
                <input type="search"  name="query" id="search-box" placeholder="search-here" class="search-box" >
                <button type="submit"><img src="img/search.png" width="20px"></button>
            </form>
                <ul>
                  <li><a href="profile.php">My profile</a></li>
                  <li><a href="faq.php">FAQ</a></li>
                  <li data-li="nodejs"><a href="profile.php"><img src="img/white-heart-transparent-background-24.png" width="20px"  ></a></li>
                  <li><a href="logout.php"  class="img" style=" text-decoration: none ; font-family: montserrat; color: white;">logout</a></li>
                  
                </ul>
 
            
    </header>

    <!-- banner section-->
    <div class="banner">
        <button onclick="myFunction()" class="btn" style="font-weight: bold; font-size: 12px;">SHOP NOW</button>
    </div>
    <script>
function myFunction() {
  const element = document.getElementById("category");
  element.scrollIntoView({ behavior: "smooth", block: "center"});
}
</script>

    <!-- category section-->
    <div class="category" id="category">
      <p class="p1"> PRODUCT CATEGORIES </p>
      <div>
        <div class="price">
            <div class="container">
              <div class="coin-price">
                <div class="log">
                  <img src="img/vehi.png" />
                  <div class="text">
                    <h1><a href="category_veh.php" style=" text-decoration: none ; font-family: montserrat; color: black; justify-content: center; padding-left:21px;">vehicles</a></h1>
                  </div>
                </div>
              </div>
              <div class="coin-price">
                <div class="log">
                  <img src="img/fur.png" />
                  <div class="text">
                    <h1><a href="category_fur.php" style=" text-decoration: none ; font-family: montserrat; color: black;padding-left:19px;">Furniture</a></h1>
                  </div>
                </div>
              </div>
              <div class="coin-price">
                <div class="log">
                  <img src="img/bookk.png" />
                  <div class="text">
                    <h1><a href="category_book.php" style=" text-decoration: none ; font-family: montserrat; color: black;padding-left:38px;">Book</a></h1>
                  </div>
                </div>
              </div>
              <div class="coin-price">
                <div class="log">
                  <img src="img/home-appliances-png-28237.png" />
                  <div class="text">
                    <h1><a href="category_ele.php" style=" text-decoration: none ; font-family: montserrat; color: black;padding-left:12px;">Electronics</a></h1>
                  </div>
                </div>
              </div>
              <div class="coin-price">
                <div class="log">
                  <img src="img/mus.jpg" style="width: 200px; padding-left: 6px;" />
                  <div class="text">
                    <h1><a href="category_mus.php" style=" text-decoration: none ; font-family: montserrat; color: black;padding-left:10px;">Musical Instrument</a></h1>
                  </div>
                </div>
              </div>
            </div>  
        </div>
      </div>
    </div>

    
    <!--recent upload section-->
    <div class="recentupload" >
      <P class="p2">RECENT UPLOADS</P>
      <div>
        <div class="p">
            <div class="c">
              <div class="c-p">
                <div class="logo">
                  <img src="img/Daco_4235221.png" />
                  <div class="t">
                  <h1 style="font-size: 13px;"> Mahindra Bolero SUV white</h1>
                  <h1><b>₹5,00,000/-</b></h1>
                  </div>
                </div>
              </div>
              <div class="c-p" style="width:155px">
                <div class="logo">
                  <img src="img/download.jpg" />
                  <div class="text">
                  <h1 style="font-size: 13px;"> Class 9th NCERT books</h1>
                  <h1><b>₹500/-</b></h1>
                    
                  </div>
                </div>
              </div>
              <div class="c-p">
                <div class="logo">
                  <img src="img/Luxury-Couch.png" />
                  <div class="text">
                  
                  <h1 style="font-size: 13px;"> Blisscraft 3 seater red Sofa</h1>
                  <h1><b>₹1099/-</b></h1>
                    <h1></h1>
                  </div>
                </div>
              </div>
              <div class="c-p">
                <div class="logo" style="padding: 10px;">
                  <img src="img/kindpng_1179596.png" />
                  <div class="text">
                  
                  <h1 style="font-size: 13px;"> Bajaj Esteem 400 Table Fan(white)</h1>
                  <h1><b>₹500/-</b></h1>
                  </div>
                </div>
              </div>
              <div class="c-p">
                <div class="logo">
                  <img src="img/kindpng_1404385.png" />
                  <div class="text">
                  <h1 style="font-size: 13px;"> boAt Rockerz 450 Bluetooth Headphone</h1>
                  <h1><b>₹800/-</b></h1>
                  </div>
                </div>
              </div>
              <div class="c-p">
                <div class="logo">
                  <img src="img/kindpng_2085507.png" />
                  <div class="text">
                  <h1 style="font-size: 13px;">LG 7kg Topload semi automatic washing machine</h1>
                  <h1><b>₹19,500/-</b></h1>
                    <h1></h1>
                  </div>
                </div>
              </div>
            </div>  
        </div>
      </div>
    </div>

    
    <!-- environment section-->
    <div class="environment">
      <img src="img/d (3).png" width="100%" >
    </div>


     <!--footer section-->
    <div class="footer1">
    <div class="foot_icon">
    <img class="f1" src="img/instagram.png"  >
    <img class="f1" src="img/facebook (1).png"  >
    <img class="f1"src="img/twitter-sign.png" >
    <img class="f1"src="img/gmail-logo.png"  >
    </div>
    </div>
    <div class="footer2">
      <p class="p3">COPYRIGHT2023@ECOECXCHANGE . ALL RIGHTS RESERVED</p>
    </div>
    
   
    
    <script></script>
</body>
</html> 

