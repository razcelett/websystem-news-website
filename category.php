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
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
		<title>
			<!-- setting the title of the webpage to the name of the category (world or local) selected -->
			<?php
			$category = $_GET['category'];
			echo strtoupper($category);
			?>
		</title>
		<style>
			article {
				margin-bottom: 10px;
				padding-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<div class="logo">
			<a href="index.php"><img src="static/img/title.png"></a>
		</div>

		<div class="nav">
			<div class="wrapper">
				<a href="index.php">HOME</a>
				<!-- if - else condition for navbar "active" portion for each categories and the navbar of each logged user (admin and non admin) -->
				<?php
				$category = $_GET['category'];
				if($category == 'World') {
					echo "<a class='foc' href='category.php?category=World'>WORLD</a>";
				} else {
					echo "<a href='category.php?category=World'>WORLD</a>";
				}
				if($category == 'Local') {
					echo "<a class='foc' href='category.php?category=Local'>LOCAL</a>";
				} else {
					echo "<a href='category.php?category=Local'>LOCAL</a>";
				}
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
		<!-- looping to show all the news of each category (world and local news) -->
		<div class="main">
			<div class="wrapper">
				<?php
				define('UPLPATH', 'static/img/');
				$category = $_GET['category'];
				$query = "SELECT * FROM news WHERE category='$category' AND isArchive=0";
				$result = mysqli_query($elements, $query);
				echo "<h1>$category</h1>";
				while($row = mysqli_fetch_array($result)) {
					echo "
					<article>
						<div class='news'>
							<div class='news_image'><img src='" .UPLPATH.$row['picture']. "'></div>
							<h4><a href='article.php?id=".$row['id']."'>".$row['title']."</a></h4>
							<h5>".$row['abstract']."</h5>
						</div>
					</article>";
					}
				?>
			</div>
  		</div>
	</body>
</html>
