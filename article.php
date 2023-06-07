<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<link rel="stylesheet" href="static/css/style.css">
		<link rel="stylesheet" href="static/css/article.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
		<title>
			<!-- setting the title of the webpage to the name of the specific news selected -->
			<?php
			$id = $_GET['id'];
			$query = "SELECT title FROM news WHERE id=$id";
			$result = mysqli_query($elements, $query);
			while($row = mysqli_fetch_array($result)) {
				echo $row['title'];
			}
			?>
		</title>
	</head>
	<body>
		<div class="logo">
			<a href="index.php"><img src="static/img/title.png"></a>
		</div>

		<div class="nav">
			<div class="wrapper">
				<a class="foc" href="index.php">HOME</a>
				<a href="category.php?category=World">WORLD</a>
				<a href="category.php?category=Local">LOCAL</a>
				<!-- if - else condition for the navbar that each user can access. 
				if the logged in user is admin, it can access the CRUD functionality of each news.
				else, it can only edit its own profile -->
				<?php
				if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 1) {
					echo "<a href='admin.php'>ADMINISTRATION</a>";
					echo "<a href='add-news.php'>ADD NEWS</a>";
					echo "<a href='logout.php'>LOGOUT</a>";
				} else if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 0){
					echo "<a href='admin.php'>ADMINISTRATION</a>";
					echo "<a href='edit-profile.php'>EDIT PROFILE</a>";
					echo "<a href='logout.php'>LOGOUT</a>";
				} else {
					echo "<a href='registration.php'>REGISTRATION</a>";
					echo "<a href='login.php'>LOGIN</a>";
				}
				?>
			</div>
		</div>
		<!-- looping the array of information of the selected news -->
		<div class="main">
			<div class="wrapper">
				<?php
				include 'connect.php';
				
				$id = $_GET['id'];

				if ($elements) {
					$query = "SELECT * FROM news WHERE id=$id";
					$result = mysqli_query($elements, $query);
					while($row = mysqli_fetch_array($result)) {
						echo "
						<article>
							<p class='category'>".$row['category']."</p>
							<h2>".$row['title']."</h2>
							<p class='datetime'>Published ".$row['date']." u ".$row['time']."</p>
							<img class='article_image' src='static/img/".$row['picture']."'/>
							<p class='abstract'>".$row['abstract']."</p>
							<p class='context'>".$row['context']."</p>
						</article>";
					}
				}
				?>
			</div>
		</div>
	</body>
</html>
