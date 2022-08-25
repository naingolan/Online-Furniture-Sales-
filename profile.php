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
            echo "<li><a href='profile.php'>Profile</a></li>";
            echo "<li><a href='logout.php'>LogOut</a></li>";
        }else{
         echo '<li><a href="loginAndRegister.php">Login/ Register</a></li>';
        } ?>
    </ul>

    
</header>

<!--Home-->
<section class="home" id="home">
    <div class="home-text">
        <?php
    $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $db = "furnitureathome";
            $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
            $x="SELECT username, email FROM users where username='$username'";
            $verify = $conn->query($x) or die ($conn->error);
            $i=1;
           $row = $verify->fetch_assoc();
           $name= $row['username'];
           $email= $row['email'];
               ?>
    
        </div>
        <div class="home-text">
        <h3>Name:   <?php echo $name ?></h3>
        <h3>Email:  <?php echo $email ?></h3>
      
    </div> 
    
	</section>


</body>








</html>