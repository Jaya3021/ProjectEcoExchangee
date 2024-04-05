<?php include("connection.php");

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
    <title>Document</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
  <?php 

if(isset($_POST["submitbtn"]))
{
    $name=$_POST["name"];
    $price=$_POST["price"];
    $category=$_POST["category"];
    $description=$_POST["message"];
    $image= $_FILES["image"]["name"];
    $tempname=$_FILES["image"]["tmp_name"];
    $folder="uploads/".$image;
    move_uploaded_file($tempname,$folder);
   

    include('connection.php');

    $qry="UPDATE uploads,wishlist SET uploads.p_name='$name',uploads.p_price='$price',uploads.p_category='$category',uploads.p_desc='$description',uploads.p_img='$folder',wishlist.p_name='$name',wishlist.p_price='$price',wishlist.p_category='$category',wishlist.p_desc='$description',wishlist.p_img='$folder' WHERE wishlist.p_id= uploads.id AND uploads.id = $id";

    if(mysqli_query($con,$qry))
    {
      echo "<h5 style='padding-left: 150px;'>successfully updated!!</h5>";
    }
    else
    {
        echo"Error Occurred",mysqli_error($con);
    }
    
} 
?>
<br>
  <h2 style="padding-left: 137px;">Update Product</h2>
   <br>
   <br>
    <form action="" method="POST" enctype="multipart/form-data" >

      <div class="formbold-input-wrapp formbold-mb-3">
        <label for="name" class="formbold-form-label"> Name of the product </label>
        <input type="text" value="<?php echo $result['p_name']; ?>" name="name" id="name" class="formbold-form-input" required/>
      </div>

      <div class="formbold-mb-3">
        <label for="age" class="formbold-form-label"> price of the product(in rupees) </label>
        <input type="text" value="<?php echo $result['p_price'];?>" name="price" class="formbold-form-input"  placeholder="₹--,--,---" required/>

      </div>

      <div class="formbold-mb-3">
        <label class="formbold-form-label">Product category</label>
        <select class="formbold-form-input" name="category"  required >
          <option value="Electronics"
          <?php
          if($result['p_category'] == 'Electronics')
           echo "selected" ;
           ?>
          >Electronics</option>

          <option value="Furniture"
          <?php
          if($result['p_category'] == 'Furniture')
           echo "selected" ;
           ?>
          >Furniture</option>


          <option value="Books"
          <?php
          if($result['p_category'] == 'Books')
           echo "selected" ;
           ?>
          >Books</option>

          <option value="Vehicle"
          <?php
          if($result['p_category'] == 'Vehicle')
           echo "selected" ;
           ?>
          >Vehicle</option>

          
          <option value="Musical Instrument"
          <?php
          if($result['p_category'] == 'Musical Instrument')
           echo "selected" ;
           ?>
          >Musical Instrument</option>
        </select>
      </div>


      <div  class="formbold-form-label">
          <label for="message" class="formbold-form-label"> Product description </label>
          <textarea rows="6"name="message"id="message" class="formbold-form-input" required >
          <?php echo $result['p_desc'];?>
          </textarea>
      </div>

      <div class="formbold-mb-3">
        <label for="choose-file" id="file-name-label" class="formbold-form-label"> Upload picture </label>
        <div class="formbold-input-flex">
        <input for=" choose file"type="file" id="choose-file" name="image" class="formbold-form-input formbold-form-file" required/>
        </div>
      </div>

      <div class="formbold-checkbox-wrapper">
        <label for="supportCheckbox" class="formbold-checkbox-label">
          <div class="formbold-relative">
            <input type="checkbox"id="supportCheckbox" class="formbold-input-checkbox" required/>
            <div class="formbold-checkbox-inner">
              <span class="formbold-opacity-0">
                <svg
                  width="11"
                  height="8"
                  viewBox="0 0 11 8"
                  class="formbold-stroke-current"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.81868 0.688604L4.16688 5.4878L2.05598 3.29507C1.70417 2.92271 1.1569 2.96409 0.805082 3.29507C0.453266 3.66742 0.492357 4.24663 0.805082 4.61898L3.30689 7.18407C3.54143 7.43231 3.85416 7.55642 4.16688 7.55642C4.47961 7.55642 4.79233 7.43231 5.02688 7.18407L10.0696 2.05389C10.4214 1.68154 10.4214 1.10233 10.0696 0.729976C9.71776 0.357624 9.17049 0.357625 8.81868 0.688604Z"
                    fill="white"
                  />
                </svg>
              </span>
            </div>
          </div>
          I agree to the defined
          <a href="#"> terms, conditions, and policies</a>
        </label>
      </div>

      <button class="formbold-btn" type="submit" name="submitbtn">Update</button>
      <a href="profile.php" style=" text-decoration:none" class="formbold-btn">Back</a>
    </form>
  </div>
</div>
</body>
</html>



