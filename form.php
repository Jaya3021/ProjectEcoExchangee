<?php session_start();
  
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
  <h2 style="padding-left: 137px;">Upload Product</h2>
   <br>
   <br>
    <form action="form.php" method="POST" enctype="multipart/form-data">

      <div class="formbold-input-wrapp formbold-mb-3">
        <label for="name" class="formbold-form-label"> Name of the product </label>
        <input type="text"name="name"id="name"class="formbold-form-input" required/>
      </div>

      <div class="formbold-mb-3">
        <label for="age" class="formbold-form-label"> price of the product(in rupees) </label>
        <input type="text"name="price"id="currency-field"class="formbold-form-input"  placeholder="₹--,--,---" required/>

      </div>

      <div class="formbold-mb-3">
        <label class="formbold-form-label">Product category</label>
        <select class="formbold-form-input" name="category" id="occupation" required>
          <option value="Electronics">Electronics</option>
          <option value="Furniture">Furniture</option>
          <option value="Books">Books</option>
          <option value="Vehicle">Vehicle</option>
          <option value="Musical Instrument">Musical Instrument</option>
        </select>
      </div>

     

      <div  class="formbold-form-label">
          <label for="message" class="formbold-form-label"> Product description </label>
          <textarea rows="6"name="message"id="message" class="formbold-form-input" required ></textarea>
      </div>

      <div class="formbold-mb-3">
        <label for="" class="formbold-form-label"> Upload picture </label>
        <div class="formbold-input-flex">
        <input for=" choose file"type="file" name="image" id="upload" class="formbold-form-input formbold-form-file" required/>
        
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

      <button class="formbold-btn" type="submit" name="submitbtn">Upload</button>
      <a href="profile.php" style=" text-decoration:none" class="formbold-btn">Back</a>
    </form>
  </div>
</div>
</body>
</html>

<?php 

if(isset($_REQUEST["submitbtn"]))
{
    $name=$_REQUEST["name"];
    $price=$_REQUEST["price"];
    $category=$_REQUEST["category"];
    $email=$_SESSION["email"];
    $sname=$_SESSION["username"];
    $description=$_REQUEST["message"];
    $image= $_FILES["image"]["name"];
    $tempname=$_FILES["image"]["tmp_name"];
    $folder="uploads/".$image;
    move_uploaded_file($tempname,$folder);
   

    include('connection.php');
    $qry="INSERT INTO uploads (`p_name`,`p_price`,`p_category`, `email`, `p_desc`,`p_img`,`s_name`) VALUES ('$name','$price','$category','$email','$description','$folder','$sname');";
    if(mysqli_query($con,$qry))
    {
       // echo"<h1 class=''>uploaded successfully!!</h1>";
    }
    else
    {
        echo"Error Occurred",mysqli_error($con);
    }
    
} 
?>

