<?php

// Starting session
session_start();
// Accessing session data
$username= $_SESSION["username"];
     $dbHost     = 'localhost';
     $dbUsername = 'root';
     $dbPassword = '';
     $dbName     = 'furnitureathome';

     //Create connection and select DB
$conn = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName) or die("Connect failed: %s\n". $conn -> error);
$quantity=$_GET["totalQuantity"];
$totalCost=$_GET["totalCost"];
$query = "INSERT INTO orders(name, quantity, totalCost, time) values('$username', $quantity, $totalCost, now())";
mysqli_query($conn, $query);

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

<!--Navbar-->
<header>
    <a href="#" class="logo"> FURNITURE <span>AT HOME.</span></a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="shop.php">New Arrival</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php if($username!=""){
            echo "<li><a href='profile.php'>Profile</a></li>";
            echo "<li><a href='logout.php'>LogOut</a></li>";
        }else{
         echo '<li><a href="loginAndRegister.php">Login/ Register</a></li>';
        } ?>
    </ul>   
</header>

<!--payment-->
<h4 style=" font-size:20px; color:#83b737; margin-top:90px;">Your total Price is <span style="color:red">TSH <?php echo $_GET["totalCost"]; ?>/= </span> Pay it through:</h4>
<div style="display:flex; flex-direction:row">
     <div class="payment" style="text-align:center; background:green; padding:10px; border-radius:5px; " >
    <div style="margin:0 auto; background-image:url(profile.png); width:100px; height:100px; background-size:cover;border-radius:50%;"></div>
    <ul><li>0747767975</li><li>Jackson Nyika</li>
    <li>CHIEF EXECUTIVE OFFICER</li>
    <li ><img style="width:100px; height:40px;"src="mpesa.png"></li>
    </ul>
    </div>
    <div class="payment" style="text-align:center; background:green; padding:10px; border-radius:5px;  " >
    <div style="margin:0 auto; background-image:url(profile.png); width:100px; height:100px; background-size:cover;border-radius:50%;"></div>
    <ul><li>0747767975</li><li>Kelvin Chaula</li>
    <li>ASSISTANT DIRECTOR</li>
    <li ><img style="width:100px; height:40px;"src="airtel.png"></li>
    </ul>
    </div>
    <div class="payment" style="text-align:center; background:green; padding:10px; border-radius:5px; " >
    <div style="margin:0 auto; background-image:url(profile.png); width:100px; height:100px; background-size:cover;border-radius:50%;"></div>
    <ul><li>0747767975</li><li>Jackson </li>
    <li>TECHNICIAN</li>
    <li ><img style="width:100px; height:40px;"src="tigo.png"></li>
    </ul>
    </div>
        </div>
 
<!--About-->
     <section class="about" id="about" >
        <div class="about-img">
            
        </div>
<div class="about-text">
    <h2><span>About Us</span></h2>
    <h2></h2>Furniture makes our<br>envornment  attractive</h2>
    <p>we make your house attractieve </p>
    <p>on line furniture is the system that can help customer 
        or client to search 
     for the required funiture by viewing, furniture like <br>
      tables sofa, chairs, stools, shelves, and beds and be able to 
      make payment and access information related to furniture
      <br></p>
      <br>
      <h2>consulting and ordering for on line furniture</h2>
 <p> we are one of the bigest suppliers and exporters all office furniture in 
   tanzania and we export 
   our product globally.
   </p>
</div>
</section>
 <!--Contact-->
 <section class="contact" id="contact">
    </div>
<div class="about-text">
    <div class="container">
        <div style="text-align:center">
          <h2>CONTACT US</h2>
          <p> WE WOULD LOVE TO HEAR FROM YOU</p>
          <marquee direction="right"
          behavior="alternate"
          style="border:rgb(152, 165, 35) 2px solid">
        WELL COME GET IN TOUCH WITH US </marquee>
        </div>
        <div class="row">
          <div class="column">
            <div class="container"></div>
            <img src="PHON.jpg" style="width:100%">
            <div class="top-left">GET ONLINE FURNITURE</div>
            <div class="bottom-left">
              <h3> call abroad on +07452582phone</h3>
              <h3>line open 24 Hours</h3>
              <a href="">jacksonnyika4@gmail.com</div></a>
      
          </div>
           <!--CONTACT-->
    <section class="CONTACT" id="CONTACT">
          <div class="column">
            <form action="/action_page.php">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Your name..">
              <label for="lname">Last Name</label>
              <input type="text" id="lname" name="lastname" placeholder="Your last name..">
              <label for="country">Country</label>
              <select id="country" name="country">
                <option value="australia">TANZANIA</option>
                <option value="canada">KENYA</option>
                <option value="usa">USA</option>
                <option value="usa">UKRAINE</option>
              </select>
              <label for="subject">Subject</label>
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
              <input type="submit" value="Submit">
            </form>
          </div>
        </div>
        </div>
      </div>
    <footer style="display:flex; flex-direction:row; margin:0 37%;">
          <a  class="footer" href="https:/wwww.twitter.com"><img src="twiter.png"></a>
          <a  class="footer" href="https:/wwww.twitter.com"><img src="facebok.png"></a>
          <a  class="footer" href="https:/wwww.twitter.com"><img src="whatsap.png"></a>
    </footer>
    <p style="margin:5 40%; color:#83b737">All rights reserved &copy 2022</p>

</body>








</html>