<!DOCTYPE html>
<html>
    <head>
       
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FURNITURE</title>
        <!--link to CSS-->
    <link rel="stylesheet" href="style.css">

    <!--Box Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
<?php
// Starting session
session_start();
// Accessing session data
$username= $_SESSION["username"];
echo 'Hi, ' . $username. '   Welcome';
?>
<!--Navbar-->
<header>
    <a href="#" class="logo"> FURNITURE <span>AT HOME.</span></a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#shop">Shop</a></li>
        <li><a href="#new">New Arrival</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="#brands">Our partners</a></li>
        <li><a href=" CONTACT.HTML">Contact</a></li>
        <?php if($username!=""){
            echo "<li><a href='logout.php'>LogOut</a></li>";
        }else{
         echo '<li><a href="loginAndRegister.php">Login/ Register</a></li>';
        } ?>
    </ul>
</header>
<div style="height:100px;"></div>
    <form action="products.php" method="post" enctype="multipart/form-data" style="margin:0 80px;">
    <label>Enter Product Name</label>
        <input type="text" name="name"/>
        <label>Enter Product Price</label>
        <input type="text" name="price"/>
        <label>Enter Product's Quantity</label>
        <input type="text" name="quantity"/>
        
        <input type="file" name="uploadfile" placeholder="Upload Its Image">
        <input type="submit" name="submit" value="UPLOAD"/>
        
       
    </form>
</body>
</html>

         <?php
         error_reporting(0);
         
         $msg = "";
         
         // If upload button is clicked ...
         if (isset($_POST['submit'])) {
             $name=$_POST['name'];
             $price=$_POST['price'];
             $quantity=$_POST['quantity'];
             $image = $_FILES["uploadfile"]["name"];
             $tempname = $_FILES["uploadfile"]["tmp_name"];
             $folder = "./image/". $image;
         
             $db = mysqli_connect("localhost", "root", "", "furnitureathome");
         
             // Get all the submitted data from the form
             $sql = "INSERT INTO products (name, price, quantity, image) VALUES ('$name', '$price', '$quantity','$image')";
             //$sql = "INSERT INTO image (filename) VALUES ('$filename')";
         
             // Execute query
             mysqli_query($db, $sql);
             
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $folder)) {
                 echo "<h3> Image uploaded successfully!</h3>";
             } else {
                 echo "<h3> Failed to upload image!</h3>";
             }
         }
         ?>
   