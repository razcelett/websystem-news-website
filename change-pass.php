<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="static/css/change-pass.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
        <title>CHANGE PASSWORD</title>
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
                <h1>CHANGE PASSWORD</h1>
                <?php
                include 'connect.php';
                // nested if for changing the user password. Checking if the current password stored in the database is matched to the 
                // inputted current password of the user before changing it to the new password set
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $currentPassword = $_POST['current_password'];
                    $newPassword = $_POST['new_password'];
                    
                    // Retrieve the user's current password from the database
                    $currentUser = $_SESSION['username'];
                    $query = "SELECT password FROM users WHERE username = '$currentUser'";
                    $result = mysqli_query($elements, $query);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $storedPassword = $row['password'];
                        
                        // Verify if the current password provided by the user matches the stored password from the database
                        if (password_verify($currentPassword, $storedPassword)) {
                            // Hash the new password before storing it in the database
                            $newPasswordHash = password_hash($newPassword, CRYPT_BLOWFISH);
                            
                            // Update the user's password in the database
                            $update = "UPDATE users SET password = '$newPasswordHash' WHERE username = '$currentUser'";
                            $updateSuccess = mysqli_query($elements, $update);
                            
                            if ($updateSuccess) {
                                // Password updated successfully message
                                echo '<div style="text-align: center;">Password changed successfully!</div>';
                            } else {
                                // Error updating the password message
                                echo '<div style="text-align: center;">Error updating the password.</div>';
                            }
                        } else {
                            // Current password provided by the user is incorrect message
                            echo '<div style="text-align: center;">Current Password is incorrect!</div>';
                        }
                    } 
                }
                ?>
                <form method="POST" action="change-pass.php">
                    <input name="current_password" id="password" type="password" class="pass" placeholder="Current Password" required/>
                    <br/><input type="checkbox" class="showpass" onclick="myFunction1()">Show Password
                    <br/><span id="messagePass" class="colorMessages mes"></span>
                    <br/>

                    <input name="new_password" id="confirmPass" type="password" class="pass pass_mes" placeholder="New Password" required/>
                    <br/><input type="checkbox" class="showpass" onclick="myFunction2()">Show Password
                    <br/><span id="messageconfirmPass" class="colorMessages mes"></span>
                    <br/>
                            
                    <input type="reset" class="button_no" value="Undo" />
                    <input type="button" class="button_no" value="Go Back" onclick="location.href='edit-profile.php'" />
                    <input name="update" type="submit" class="button_yes" value="Change Password" />
                </form>
            </div>
        </div>
        
        <footer>
            <?php include 'footer.php'; ?>
        </footer>
        
        <script src="static/js/registration.js"></script>
    </body>
</html>