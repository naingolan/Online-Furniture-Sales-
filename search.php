<?php
// Starting session
session_start();
// Accessing session data
$username= $_SESSION["username"];
require_once("dbcontroller.php");
$db_handle = new DBController();
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
    $input=$_POST["search"];



?>


<!DOCTYPE html>
<html>
    <head>
       
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FURNITURE</title>
        <!--link to CSS-->
    <link rel="stylesheet" href="style.css">

    <style>
    /* search bar */
.btncontainer {
  position: relative;
  border: 3px solid #8fc53d;
  height: 50px;
  overflow: hidden;
  margin-bottom: 10px;
  margin-top:40px;
  border-radius:5px;
  padding:0;
}

.btntext_input {
  height:100%;
  width: 60%;
  line-height: 50px;
  font-size: 20px;
  height:50px;
  border: none;
  border-color:none;
  outline:none;
  border-style:none;
  background-color:transparent;
  position:absolute;
  top:0;
  right:0;
  margin:0;
}
.btntext_input:focus {
  outline: none;
}

.btnbtn {
  position: absolute; 
  
  line-height: 50px;
  right: 0;
  top: 0;
  margin: 0;
  padding: 0;
  background: #8fc53d;
  color: #CCC;
  border: none;
  width: 30%;
  font-weight: bold;
}

.btnbtn:hover {
  color: black;
  cursor: pointer;
}
/*ending serch bar */

</style>


</head>

<body>
<?php

// Accessing session data
echo 'Hi, ' . $username. '   Welcome';
?>
<!--Navbar-->
<header>
    <a href="#" class="logo"> FURNITURE <span>AT HOME.</span></a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="#brands">New Arrival</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php if($username!=""){
            echo "<li><a href='profile.php'>Profile</a></li>";
            echo "<li><a href='logout.php'>LogOut</a></li>";
        }else{
         echo '<li><a href="loginAndRegister.php">Login/ Register</a></li>';
        } ?>
    </ul>   
</header>

<!--Home-->
<section class="shop" id="shop" style="padding: 0 30px;"> 
<div id="product-grid">
<div class="txt-heading">Products</div>
 <!--connectin for fetching database-->
 <?php
     
     
    
	$product_array = $db_handle->runQuery("SELECT * FROM `products` WHERE `name` LIKE '%$input%' OR `category` LIKE '%$input%'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>

    <div class="product-item" >
			<div class="product-image">
            <img style="width:100%; height:250px;" src="./image/<?php echo $product_array[$key]['image']; ?>">
            </div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"] ?></div>
			<div class="product-price"><?php echo $product_array[$key]["price"] ?></div>
			<div class="cart-action">
            <form  action="shop.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>" method="post" style="z-index:1">
            <input type="text" style="margin:0 10px; height:35px; width:40px;"class="product-quantity" name="quantity"  value="1"  />
            <input type="submit" style="background:#035415; height:35px; color:#ffc700"value="Place Order" class="btnAddAction" />
			</form>
            </div>
            </div>
			
		</div>
	<?php
	}
}
}
	?>
</div>
</section>
</body>

</html>