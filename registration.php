<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/registration.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
    <title>REGISTRATION</title>
  </head>

  <body>
    <div class="logo">
      <a href="index.php"><img src="static/img/title.png"></a>
    </div>

    <div class="nav">
      <div class="wrapper">
        <a href="index.php">HOME</a>
        <a href="category.php?category=World">WORLD</a>
        <a href="category.php?category=Local">LOCAL</a>
        <a class="foc" href="registration.php">REGISTRATION</a>
        <a href="login.php">LOGIN</a>
      </div>
    </div>

    <div class="main">
      <div class="wrapper">
        <div class="log">
          <h2>REGISTER</h2>
          <form method="POST" action="">
            <input name="firstname" id="firstname" type="text" class="firstname" placeholder="Name" required/>
            <br/><span id="messagefName" class="colorMessages"></span>
            <br/><br/>

            <input name="lastname" id="lastname" type="text" class="lastname" placeholder="Last Name" required/>
            <br/><span id="messagelName" class="colorMessages"></span>
            <br/><br/>

            <input name="username" id="username" type="text" class="username" placeholder="Username" required/>
            <br/><span id="messageuserName" class="colorMessages"></span>
            <br/><br/>

            <input name="pass" id="password" type="password" class="pass" placeholder="Password" required/>
            <br/><input type="checkbox" class="showpass" onclick="myFunction1()">Show Password
            <br/><span id="messagePass" class="colorMessages mes"></span>
            <br/>

            <input name="pass" id="confirmPass" type="password" class="pass pass_mes" placeholder="Confirm Password" required/>
            <br/><input type="checkbox" class="showpass" onclick="myFunction2()">Show Password
            <br/><span id="messageconfirmPass" class="colorMessages mes"></span>
            <br/>

            <input name="submit" type="submit" class="register" id="register" value="Register" />
          </form>
        </div>
        <!-- if - else condition for user registration process -->
        <?php
        include 'connect.php';
        
        //Register new user function
        if ($elements && isset($_POST['submit'])) {
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $username = $_POST['username'];
          $password = $_POST['pass'];
          $hashed_password = password_hash($password, CRYPT_BLOWFISH);
          $isAdmin = 0;
          $registeredUser = false;
          
          $sql = "SELECT * FROM users WHERE username = ?";
          $stmt = mysqli_stmt_init($elements);
          if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
          }
          
          if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "<p style='color:#EA212D;font-weight:bold'>Username already exists!</p>";
          } else {
            $sql = "INSERT INTO users (firstname, lastname,username, password, isAdmin) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($elements);
            
            if (mysqli_stmt_prepare($stmt, $sql)) {
              mysqli_stmt_bind_param($stmt, 'ssssd', $firstname, $lastname, $username, $hashed_password, $isAdmin);
              mysqli_stmt_execute($stmt);
              $registeredUser = true;
            }
          }
          
          if($registeredUser == true) {
            echo '<script>alert("The user is successfully registered!"); window.location.href="login.php";</script>';
          }
        }
        
        mysqli_close($elements);
        ?>
      </div>
    </div>
    
    <footer>
      <?php include 'footer.php'; ?>
    </footer>

    <script src="static/js/registration.js"></script>
    
  </body>
</html>
