<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<link rel="stylesheet" href="static/css/style.css">
		<link rel="stylesheet" href="static/css/login.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
		<title>LOGIN</title>
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
				<!-- if - else condition for navbar views -->
				<?php
				if(isset($_SESSION['username'])) {
					echo "<a href='admin.php'>ADMINISTRATION</a>";
					echo "<a href='edit-profile.php'>EDIT PROFILE</a>";
					echo "<a href='logout.php'>LOGOUT</a>";
				} else {
					echo "<a href='registration.php'>REGISTRATION</a>";
					echo "<a class='foc' href='login.php'>LOGIN</a>";
				}
				?>
			</div>
		</div>
		<!-- nested if for checking if the account is existing and the informations inputted are correct -->
		<div class="main">
			<div class="wrapper">
				<div class="log">
					<h2>LOGIN</h2>
					<form enctype="multipart/form-data" method="POST" action="">
						<input name="username" id="username" type="text" class="username" placeholder="Username" required/>
						<br/><span id="messageuserName" class="colorMessages"></span>
						<br/>
						<input name="pass" id="password" type="password" class="pass" placeholder="Password" required/>
						<br/><input type="checkbox" class="showpass" onclick="myFunction1()">Show Password
						<br/><span id="messagePass" class="colorMessages mes"></span>
						<br/>
						<input name="login" type="submit" class="login" id="login" value="Login" />
						
						<?php
						include 'connect.php';
						
						if (isset($_POST['login'])) {
							$loginUserName = $_POST['username'];
							$loginUserPassword = $_POST['pass'];
							$sql = "SELECT username, password, isAdmin FROM users WHERE username = ?";
							$stmt = mysqli_stmt_init($elements);
							
							if (mysqli_stmt_prepare($stmt, $sql)) {
								mysqli_stmt_bind_param($stmt, 's', $loginUserName);
								mysqli_stmt_execute($stmt);
								mysqli_stmt_store_result($stmt);
							}
							mysqli_stmt_bind_result($stmt, $Username, $userPassword, $userLevel);
							mysqli_stmt_fetch($stmt);
							
							if (password_verify($_POST['pass'], $userPassword) && mysqli_stmt_num_rows($stmt) > 0) {
								$isUser = true;
								
								if($userLevel == 1) {
									$admin = true;
								} else {
									$admin = false;
								}
								
								$_SESSION['username'] = $Username;
								$_SESSION['isAdmin'] = $userLevel;
								header('Location: admin.php');
							} else {
								$isUser = false;
								echo '<p>Invalid Credentials!</p>';
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>

		<script src="static/js/registration.js"></script>

	</body>
</html>
