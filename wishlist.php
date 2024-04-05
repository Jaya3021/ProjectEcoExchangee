
<?php session_start();
  $u_id= $_SESSION['email'];
?>

<?php 

 if(isset($_POST["submitbtn"]))
{
    $p_id = $_POST['product_id'];
    include('connection.php');

    $query="SELECT * FROM wishlist WHERE p_id='$p_id' AND u_id='$u_id'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        echo"product already uploaded to wishlist";
    }
    else{
        $sql="SELECT * FROM uploads WHERE id=$p_id";
        $data=mysqli_query($con,$sql);
        $record=mysqli_fetch_array($data);

        $qry = "INSERT INTO wishlist (`p_name`,`p_price`,`p_category`, `p_desc`,`p_img`,`p_id`,`u_id`) VALUES ('{$record['p_name']}','{$record['p_price']}','{$record['p_category']}','{$record['p_desc']}','{$record['p_img']}','$p_id','$u_id')";

        if(mysqli_query($con,$qry))
        {
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
        else
        {
        echo"Error Occurred",mysqli_error($con);
        }
    }
    
} 
?>
