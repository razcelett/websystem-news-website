<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
		<link rel="stylesheet" href="static/css/style.css">
		<link rel="stylesheet" href="static/css/admin.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico"/>
		<title>ADMINISTRATION</title>
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
				<a class="foc" href="admin.php">ADMINISTRATION</a>
				<!-- if - else condition for navbar views -->
				<?php
				if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 1) {
					echo "<a href='add-news.php'>ADD NEWS</a>";
				} else {
					echo "<a href='edit-profile.php'>EDIT PROFILE</a>";
				}
				?>
				<a href='logout.php'>LOGOUT</a>
			</div>
		</div>

		<!-- looping for admin or non admin accessibility of the page and CRUD functionality for news -->
		<div class="main">
			<div class="wrapper">
				<h2>ADMINISTRATION</h2>
				<?php
				include 'connect.php';
				$isUser = false;
				if(isset($_SESSION['username'])) {
					$Username = $_SESSION['username'];
					$isUser = true;
					if($_SESSION['isAdmin'] == 1) {
						$admin = true;
					} else {
						$admin = false;
					}
					// if logged user is admin, it will show the CRUD function for each news, and if not, 
					// it will only show a message that they are successfully logged in
					if (($isUser == true && $admin == true)) {
						$queries = "SELECT * FROM news";
						$result = mysqli_query($elements, $queries);
						while($row = mysqli_fetch_array($result)) {
							echo "
							<form enctype='multipart/form-data' method='POST' action=''>
								<br/><br/><hr/><br/><br/><label for='title' required>News title:</label>
								<input name='title' type='text' class='title' value='".$row['title']."' style='width:240px;height:30px;padding-left:5px;font-weight:bold;'/>
								<br/><br/>
								
								<label for='abstract'>Short news content (up to 50 characters):</label>
								<br/>
								<textarea name='abstract' type='text' class='abstract' style='width:400px;height:70px;padding:7px;'>".$row['abstract']."</textarea>
								<br/><br/>
								
								<label for='context'>News content:</label>
								<br/>
								<textarea name='context' style='width:400px;height:180px;padding:7px;'>".$row['context']."</textarea>
								<br/><br/>
									
								<label for='picture'>Picture</label>
								<br/>
								<img src='static/img/".$row['picture']."' style='width:150px;' />
								<br/>
								<input name='picture' type='file' value='".$row['picture']."'>
								<br/><br/>
									
								<label for='category'>News category:</label><br/>
								<select name='category' class='form-field-textual' style='width:240px;height:30px;padding-left:5px;margin-top:5px;'>
								<option value='".$row['category']."'>".$row['category']."</option>
								<option value='World'>World</option>
								<option value='Local'>Local</option>
								</select>
								<br/><br/>";
								// if - else condition if the news is archived 
								if($row['isArchive'] == 0) {
									echo "Save to archive?
									<input type='checkbox' name='isArchive' class='option' value='option'>";
								} else {
									echo "The article is in the archive.
									<input type='checkbox' name='isArchive' class='option' value='option' checked>";
								}
								
								echo "<br/><br/><br/>
								<input type='hidden' name='id' class='form-field-textual' value='".$row['id']."'>
								<input type='reset' style='padding:5px 10px;' value='Undo' />
								<input name='update' type='submit' style='padding:5px 10px;margin-left:10px;' value='Save' />
								<input name='delete' type='submit' style='padding:5px 10px;margin-left:10px;' value='Delete' />
							</form><br/><br/>";
						}
					} else if ($isUser == true && $admin == false) {
						echo '<div class="welcome_nadmin"><p>Welcome, <span>' . $Username . '</span>!<br/><br/>You have successfully logged in, but you are not an administrator and therefore do not have sufficient rights to access this page.<br/><br/><br/></p></div>';
							
					}
				} else if ($isUser == false) {
					header('Location: login.php');
				}

				// Delete news function
				if(isset($_POST['delete'])) {
					$id = $_POST['id'];
					echo '
					<script>
						var confirmed = confirm("Are you sure you want to delete this news?");
						if (confirmed) {
							// Delete the news
							window.location.href = "delete-news.php?id=' . $id . '";
							} else {
							}
						</script>';
				} 

				// Update news function
				if (isset($_POST['update'])) {
					$title = $_POST['title'];
					$abstract = $_POST['abstract'];
					$context = $_POST['context'];
					$category = $_POST['category'];
					$picture = $_FILES['picture']['name'];
					$tempPicture = $_FILES['picture']['tmp_name'];
					$id = $_POST['id'];
					
					if (isset($_POST['isArchive'])) {
						$isArchive = 1;
					} else {
						$isArchive = 0;
					}
					
					// Check if a new image is selected
					if (!empty($picture)) {
						move_uploaded_file($tempPicture, __DIR__.'/static/img/'. $picture);
					} else {
						// Retain the existing picture if no image is selected
						$currentPicture = "SELECT picture FROM news WHERE id=$id";
						$pictureResult = mysqli_query($elements, $currentPicture);
						$pictureRow = mysqli_fetch_assoc($pictureResult);
						$picture = $pictureRow['picture'];
					}
					
					$queries = "UPDATE news SET title='$title', abstract='$abstract', context='$context', picture='$picture', category='$category', isArchive='$isArchive' WHERE id=$id";
					$result = mysqli_query($elements, $queries) or die('Error querying database.');
					echo '<script> alert("Successfully updated the news."); window.location.href = "admin.php"; </script>';
				}
				?>
			</div>
		</div>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>
	</body>
</html>
