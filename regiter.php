<!DOCTYPE html>
<html>
    <head>
       
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/register</title>
        <!--link to CSS-->
    <link rel="stylesheet" href="style.css">

    <!--Box Icons-->
</head>
 <!-- php codes for capturing inputs -->
 

<body>
   
<!--Navbar-->
<header>
    <a href="#" class="logo"> FURNITURE <span>AT HOME.</span></a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul  class="navbar" >
        <li><a href="index.html">Home</a></li>
        <li><a href="#shop">Shop</a></li>
        <li><a href="#new">New Arrival</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="#brands">Our partners</a></li>
        <li><a href=" CONTACT.HTML">Contact</a></li>
        <li><a href="loginAndRegister.php">Login/ Register</a></li>

    </ul>
</header>

    <!--login page-->
      
    <section>
        <form action="loginAndRegister.php" method="post">
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                
                    <div class="sign-up-htm">
                       <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input"name="regUsername">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="password"name="regPassword">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" data-type="password"name="regConfirm">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="email" class="input" name="regEmail">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up" name="regSubmit">
                        </div>
                        <!-- code for inserting new registry-->
                        <?php
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "furnitureathome";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
         
                        if(isset($_POST['regSubmit'])){
       $username=$_POST['regUsername'];
       $password = $_POST['regPassword'];
       $confirm =$_POST['regConfirm'];
       $email=$_POST['regEmail'];
       
       if($password!==$confirm){
        header('location:loginAndRegister.php?msg=failed');
       }
       $x="SELECT username FROM users where username='$username'";
       $verify = $conn->query($x) or die ($conn->error);
       $row = $verify->fetch_assoc();
          $cUsername= $row['username'];
          if($cUsername!==$regUsername){
              $x="INSERT username, password, email INTO users";
              $verify = $conn->query($x) or die ($conn->error);

          echo "Welcome".$username;
      session_start();
      $_SESSION["username"]=$cUsername;
      header('location:index.php');
      
  }
   
      }else{
          $username = "";
          $password = "";
          header('location:loginAndRegister.php?msg=failed');
          echo "You have Entered incorrect Password. Try again";
      }
  
  
    ?>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>
</form>

           
          </section>
    <!--About-->
    <section class="about" id="about">
        
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
 
</body>

</html>