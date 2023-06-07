<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/edit-profile.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
    <title>EDIT PROFILE</title>
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
        <a href="admin.php">ADMINISTRATION</a>
        <a class="foc" href="edit-profile.php">EDIT PROFILE</a>
        <a href="logout.php">LOGOUT</a>
      </div>
    </div>
    
    <div class="main">
      <div class="wrapper">
        <h1>EDIT PROFILE</h1>
        <!-- looping for retrieval of stored profile information and updating profile -->
        <?php
        include 'connect.php';
        
        if (isset($_SESSION['username'])) {
          $currentUser = $_SESSION['username'];
          $query = "SELECT * FROM users WHERE username = '$currentUser'";
          $result = mysqli_query($elements, $query);
          
          if ($result) {
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                if (isset($_POST['update'])) {
                  $firstname = $_POST['firstname'];
                  $lastname = $_POST['lastname'];
                  $username = $_POST['username'];
                                  
                  $queries = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username' WHERE username='$currentUser'";
                  $update = mysqli_query($elements, $queries) or die('Error querying database.');
                                  
                  // Update the session variables with the new form values
                  $_SESSION['firstname'] = $firstname;
                  $_SESSION['lastname'] = $lastname;
                  $_SESSION['username'] = $username;
                                  
                  // Success message after updating the data
                  echo '<script>alert("Profile updated successfully!");</script>';
                }
                
                //Delete user account function
                if (isset($_POST['delete'])) {
                  // Display the confirmation message using Alert 
                  echo '
                  <script>
                    var confirmed = confirm("Are you sure you want to delete your account?");
                    if (confirmed) {
                      // Delete the user account
                      window.location.href = "delete-account.php?id=' . $row['id'] . '";
                    } else {
                    }
                  </script>';
                }
                
                // Retrieve the form values from the session variables or the database
                $firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : $row['firstname'];
                $lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : $row['lastname'];
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : $row['username'];
                ?>
                <form method="POST" action="">
                  <label for="firstname"><b>Firstname</b></label>
                  <br>
                  <input name="firstname" id="firstname" type="text" class="firstname" value="<?php echo $firstname; ?>"/>
                  <br/><br/>
                                  
                  <label for="lastname"><b>Lastname</b></label>
                  <br>
                  <input name="lastname" id="lastname" type="text" class="lastname" value="<?php echo $lastname; ?>"/>
                  <br/><br/>
                                  
                  <label for="username"><b>Username</b></label>
                  <br>
                  <input name="username" id="username" type="text" class="username" value="<?php echo $username; ?>"/>
                  <br/><br/>
                                  
                  <input type="reset" class="button_no" value="Undo" />
                  <input type="button" class="button_no" value="Change Password" onclick="location.href='change-pass.php'" />
                  <input name="delete" type="submit" class="button_no" value="Delete Account" />
                  <input name="update" type="submit" class="button_yes" value="Save" />
                </form>
                <?php
              }
            }
          }
        } else {
          echo "Please log in to access this page.";
        }
        ?>
      </div>
    </div>

    <footer>
      <?php include 'footer.php'; ?>
    </footer>

  </body>
</html>
