 <!-- codes after submiting Login-->
 <?php
    
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "furnitureathome";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
      $failed=0;
  
    if(isset($_POST['submit'])){
       $username=$_POST['username'];
       $password = $_POST['password'];
    
    
          
    
    $x="SELECT username, password FROM users where username='$username'";
    $verify = $conn->query($x) or die ($conn->error);
    $row = $verify->fetch_assoc();
          $cUsername= $row['username'];
          $cPassword= $row['password'];
          if(($password!="")||($username!="")){
      if($cPassword == $password){
          echo "Welcome".$username;
      session_start();
      $_SESSION["username"]=$cUsername;
      header('location:index.php');
      
  }
      else{
          $failed++;
          $username = "";
          $password = "";
          
         header('location:loginAndRegister.php?msg=failed');
          
      }
      }else{
          $username = "";
          $password = "";
          header('location:loginAndRegister.php?msg=failed');
      }
  
  }
 ?>


















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