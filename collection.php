<?php
          $dbhost = "localhost";
          $dbuser = "root";
          $dbpass = "";
          $db = "furnitureathome";
          $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);          
          $errors = array(); 
          if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
          
            if (empty($username)) {
                array_push($errors, "Username is required");
            }
            if (empty($password)) {
                array_push($errors, "Password is required");
            }
          
            if (count($errors) == 0) {
              
                
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $results = mysqli_query($conn, $query);
                if (mysqli_num_rows($results) == 1) {
                  session_start();
                  $_SESSION['username'] = $username;
                  $_SESSION['success'] = "You are now logged in";
                  header('location: index.php');
                }else {
                    header('location:loginAndRegister.php');
                    array_push($errors, "Wrong username/password combination");
                    ?>
                    <?php  if (count($errors) > 0) : ?>
                        <div class="error">
                            <?php foreach ($errors as $error) : ?>
                              <p><?php echo $error ?></p>
                            <?php endforeach ?>
                        </div>
                      <?php  endif ?>
                      <?php
                }
            }
          }
        
        
       if (isset($_POST['regSubmit'])) {
            // receive all input values from the form
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm = mysqli_real_escape_string($conn, $_POST['confirm']);
          
            // form validation: ensure that the form is correctly filled ...
            // by adding (array_push()) corresponding error unto $errors array
            if (empty($username)) { array_push($errors, "Username is required"); }
           if (empty($password)) { array_push($errors, "Password is required"); }
            if ($password != $confirm) {
              array_push($errors, "The two passwords do not match");
            }
          
            // first check the database to make sure 
            // a user does not already exist with the same username and/or email
            $user_check_query = "SELECT * FROM users WHERE username='$username'  LIMIT 1";
            $result = mysqli_query($conn, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) { // if user exists
              if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
              }
          
            }
          
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                //$password = md5($password);//encrypt the password before saving in the database
          
                $query = "INSERT INTO users (username, email, password) 
                          VALUES('$username', '$email', '$password')";
                mysqli_query($conn, $query);
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location:index.php');
            }else{ ?>
                <?php  if (count($errors) > 0) : ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                          <p><?php echo $error ?></p>
                        <?php endforeach ?>
                    </div>
                  <?php  endif ?>
                  <?php
            }
          }
          ?>